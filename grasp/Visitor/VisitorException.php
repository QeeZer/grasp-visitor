<?php
/**
 * Visitor Exception
 */

namespace Grasp\Visitor;

use Exception;

class VisitorException extends Exception
{
	public function handle()
	{
		echo $this->getMessage();
		exit;
	}
}