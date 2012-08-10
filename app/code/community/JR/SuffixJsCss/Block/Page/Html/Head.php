<?php

class JR_SuffixJsCss_Block_Page_Html_Head extends Mage_Page_Block_Html_Head
{
    protected function &_prepareStaticAndSkinElements($format, array $staticItems, array $skinItems, $mergeCallback = null)
    {
        $designPackage = Mage::getDesign();
        $baseJsUrl = Mage::getBaseUrl('js');
        $items = array();
        if ($mergeCallback && !is_callable($mergeCallback)) {
            $mergeCallback = null;
        }

        // get static files from the js folder, no need in lookups
        foreach ($staticItems as $params => $rows) {
            foreach ($rows as $name) {
                $items[$params][] = $mergeCallback ? Mage::getBaseDir() . DS . 'js' . DS . $name : $baseJsUrl . $name;
            }
        }

        // lookup each file basing on current theme configuration
        foreach ($skinItems as $params => $rows) {
            foreach ($rows as $name) {
                $items[$params][] = $mergeCallback ? $designPackage->getFilename($name, array('_type' => 'skin'))
                    : $designPackage->getSkinUrl($name, array());
            }
        }

        $html = '';
        foreach ($items as $params => $rows) {
            // attempt to merge
            $mergedUrl = false;
            if ($mergeCallback) {
                $mergedUrl = call_user_func($mergeCallback, $rows);
            }
            // render elements
            $params = trim($params);
            $params = $params ? ' ' . $params : '';
            if ($mergedUrl) {
                if ($this->isUrlSuffixEnabled()) {
                    $mergedUrl .= '?q=' . urlencode($this->getUrlSuffix());
                }
                $html .= sprintf($format, $mergedUrl, $params);
            } else {
                foreach ($rows as $src) {
                    if ($this->isUrlSuffixEnabled()) {
                        $src .= '?q=' . urlencode($this->getUrlSuffix());
                    }
                    $html .= sprintf($format, $src, $params);
                }
            }
        }
        return $html;
    }

    public function isUrlSuffixEnabled()
    {
        return Mage::getStoreConfigFlag('dev/suffix_js_css/enable');
    }

    public function getUrlSuffix()
    {
        return Mage::getStoreConfig('dev/suffix_js_css/suffix');
    }
}