<?php
/**
 * Init
 */

use Grasp\Grasp;

define('ROOT_DIR', strtr(__DIR__, '\\', '/').'/');

require 'vendor/autoload.php';

$grasp = new Grasp(ROOT_DIR);

return $grasp;