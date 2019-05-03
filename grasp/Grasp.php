<?php
/**
 * Grasp
 */

namespace Grasp;

use Closure;
use Illuminate\Container\Container;
use Grasp\Contracts\Grasp as GraspContract;

class Grasp extends Container implements GraspContract
{
	/** @var string grasp 运行目录 */
	protected $bathPath;

	/**
	 * Grasp constructor.
	 * @param string $bathPath grasp 目录
	 */
	public function __construct($bathPath = ROOT_DIR)
	{
		$this->bathPath = $bathPath;

		$this->registerSystem();
	}

	/**
	 * 注册
	 */
	protected function registerSystem()
	{
		/** 单例化 */
		static::setInstance($this);

		/** 将 grasp 绑定至 Grasp::grasp */
		$this->instance('grasp', $this);

		/** 绑定自身 */
		$this->instance(Container::class, $this);
	}

	/**
	 * 返回 grasp 目录
	 * @return mixed
	 */
	public function basePath()
	{
		return $this->bathPath;
	}
}