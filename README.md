# Tracy Debugger Toolbar for Opencart 2.x

"Tracy: the addictive tool to ease debugging PHP code for cool developers. Friendly design, logging, profiler, advanced features like debugging AJAX calls or CLI support. You will love it."
For more information see official [Tracy repository](https://github.com/nette/tracy)

![Preview of Debugger](./doc/screenshot.png)

## Installation

1. Requiring installed [Vqmod](https://github.com/vqmod/vqmod) because VqMod doesn't support installing via composer itself.
2. `composer require burdapraha/oc_tracy dev-master`
3. Add this code to your composer.json project file:

```
    "scripts": {
        "post-package-install": [
            "php -r \"rename('vendor/burdapraha/oc_tracy/vqmod/xml/tracy.xml', 'public/vqmod/xml/tracy.xml');\""
        ],
        "post-package-update": [
            "php -r \"rename('vendor/burdapraha/oc_tracy/vqmod/xml/tracy.xml', 'public/vqmod/xml/tracy.xml');\""
        ]
    } 
```
    
It will move vqmod xml file to correct folder.

4. add constant `define('DEV', true);` to your config.php, /admin/config.php