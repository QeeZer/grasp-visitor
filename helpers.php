<?php
/**
 * helpers
 */

if(!function_exists('redirect')) {
	function redirect($url)
	{
		header('Location: ' . $url);
	}
}