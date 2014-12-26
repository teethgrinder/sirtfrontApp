<?php namespace Sirtcantalilar\Transformers;

class PostTransformer extends Transformer {
	
	public function transform($post)
	{
		return [

			'title' => $post['title'],
			'content' => $post['content'],
			'author' => $post['author']['name']

		];
	}


}