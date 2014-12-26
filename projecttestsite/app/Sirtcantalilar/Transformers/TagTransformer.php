<?php namespace Sirtcantalilar\Transformers;

class TagTransformer extends Transformer {

	public function transform($tag)
	{
		return [

			'name' => $tag['name'],
			'slug' => $tag['slug']

		];
	}
}