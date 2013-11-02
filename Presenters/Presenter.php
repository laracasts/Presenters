<?php namespace Acme\Presenters;

abstract class Presenter {

	protected $resource;

	public function __construct($resource)
	{
		$this->resource = $resource;
	}

	public function __get($name)
	{
		if (method_exists($this, $name))
		{
			return $this->{$name}();
		}

		return $this->resource->{$name};
	}
}
