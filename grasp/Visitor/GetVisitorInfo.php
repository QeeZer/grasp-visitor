<?php
/**
 * GetVisitorInfo Class
 */

namespace Grasp\Visitor;

use Grasp\Contracts\GetVisitorInfo as GetVisitorInfoContract;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

class GetVisitorInfo implements GetVisitorInfoContract
{
	public $file = ROOT_DIR . 'data/records.txt';

	public function setFile($file)
	{
		$this->file = $file;
	}

	public function saveVisitorInfo($info = [])
	{
		$filesystem = new Filesystem();

		try {
			if(!$filesystem->exists($this->file)) {
				throw new VisitorException($this->file . ' not exists. Please check it.');
			}

			$filesystem->chmod($this->file, 0755);

			$filesystem->appendToFile($this->file, '------s' . $this->getReferer() . "s------\r\n");

			foreach($info as $key => $item)
			{
				if(!method_exists($this, $item)) {
					throw new VisitorException($item . 'method is not exists. Please check it.');
				}

				$filesystem->appendToFile($this->file, $key. ': ' . $this->$item() . "\r\n");
			}

			$filesystem->appendToFile($this->file, '------e' . $this->getReferer() . "e------\r\n\r\n");

			return 'ok';

		} catch (IOExceptionInterface $exception) {
			echo "An error occurred while creating your directory at ".$exception->getPath();
		}
	}

	public function getRemoteAddr()
	{
		return $_SERVER['REMOTE_ADDR'];
	}

	public function getVia()
	{
		return $_SERVER['HTTP_VIA'];
	}

	public function getXForwardedFor()
	{
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	public function getClientIp()
	{
		return $_SERVER['HTTP_CLIENT_IP'];
	}

	public function getReferer()
	{
		return $_SERVER['HTTP_REFERER'];
	}

	public function getUserAgent()
	{
		return $_SERVER['HTTP_USER_AGENT'];
	}

	public function getHeaders()
	{
		return $_SERVER;
	}
}