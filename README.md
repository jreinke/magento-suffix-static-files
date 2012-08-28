## Overview

This extension allows you to add a query parameter to static files (js and css).  
This is especially useful to force browser reloading files and to update your website design.

## Installation

### Magento CE 1.7+ (should work fine in 1.6 too)

Install with [modgit](https://github.com/jreinke/modgit):

    $ cd /path/to/magento
    $ modgit init
    $ modgit -e README.md clone jr-suffix https://github.com/jreinke/magento-suffix-static-files.git

or download package manually:

* Download latest version [here](https://github.com/jreinke/magento-suffix-static-files/downloads)
* Unzip in Magento root folder
* Clean cache

## How to use

Simply specify a query parameter in "System > Configuration > Developer > Suffix JS/CSS Settings".  
I also wrote an article for more information about the module: [click here](http://www.johannreinke.com/en/2012/08/28/magento-a-module-to-force-static-files-reloading/).