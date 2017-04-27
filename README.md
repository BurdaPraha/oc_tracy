# Tracy Debugger Toolbar for Opencart 2.x

"Tracy: the addictive tool to ease debugging PHP code for cool developers. Friendly design, logging, profiler, advanced features like debugging AJAX calls or CLI support. You will love it."
For more information see official [Tracy repository](https://github.com/nette/tracy)

![Preview of Debugger](./doc/screenshot.png)

## Installation

1. Requiring installed [Vqmod](https://github.com/vqmod/vqmod) because VqMod doesn't support installing via composer itself.
2. `composer require burdapraha/oc_tracy dev-master`
3. add constant `define('DEV', true);` to your config.php, /admin/config.php