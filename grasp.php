<?php
/**
 * grasp
 */

use Grasp\Visitor\GetVisitorInfo;
use Grasp\Visitor\VisitorException;

$grasp = require 'init.php';

try {
	$gvi = $grasp->make(GetVisitorInfo::class);
} catch (VisitorException $exception) {
	$exception->handle();
}

$gvi->saveVisitorInfo([
	'ip' => 'getRemoteAddr',
	'via' => 'getVia',
	'xff' => 'getXForwardedFor',
	'client-ip' => 'getClientIp',
	'referer' => 'getReferer',
	'ua' => 'getUserAgent'
]);

// redirect('http://blog.qz.ink');