<?php namespace Acme\Presenters;

use Illuminate\Database\Eloquent\Collection;

class PresenterCollection implements \Countable, \ArrayAccess, \IteratorAggregate {

	protected $collection;

	public function __construct($presenter, Collection $collection)
	{
		foreach($collection as $key => $resource)
		{
			$collection->put($key, new $presenter($resource));
		}

		$this->collection = $collection;
	}

	public function count()
	{
		return count($this->collection);
	}

	public function getIterator()
	{
		return $this->collection;
	}

	public function offsetExists($offset)
	{
		return isset($this->collection[$offset]);
	}

	public function offsetGet($offset)
	{
		return isset($this->collection[$offset]) ? $this->collection[$offset] : null;
	}

	public function offsetSet($offset, $value)
	{
		$this->collection[$offset] = $value;
	}

	public function offsetUnset($offset)
	{
		unset($this->collection[$offset]);
	}
}
