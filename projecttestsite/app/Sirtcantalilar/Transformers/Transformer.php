<?php namespace Sirtcantalilar\Transformers;

abstract class Transformer  {
	/**
	 * [transformCollection of class
	 * @param  $items
	 * @return  array
	 */
	public function transformCollection(array $items)
	{
		return array_map([$this, 'transform'], $items);
	}

	public abstract function transform($item);
}