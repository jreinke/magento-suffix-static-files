## Overview

This extension allows you to add a query parameter to static files (js and css).
This is especially useful to force browser reloading files and to update your website design.

## Installation

### Magento CE 1.6.x, 1.7.x, 1.8.x

Install with [modgit](https://github.com/jreinke/modgit):

    $ cd /path/to/magento
    $ modgit init
    $ modgit clone queryfier https://github.com/jreinke/magento-suffix-static-files.git

or download package manually:

* Download latest version [here](https://github.com/jreinke/magento-suffix-static-files/archive/master.zip)
* Unzip in Magento root folder
* Clear cache
* Logout from admin then login again to access module configuration

## How to use

Simply enable automatic generation or define a query parameter in "System > Configuration > Bubble Queryfier > Suffix JS/CSS Settings".

Full overview available [here](http://www.bubblecode.net/en/2012/08/28/magento-a-module-to-force-static-files-reloading/).