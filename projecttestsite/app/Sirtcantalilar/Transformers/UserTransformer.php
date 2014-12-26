<?php namespace Sirtcantalilar\Transformers;

class UserTransformer extends Transformer {
	
	public function transform($user)
	{
		return [

			'email' => $user['email']

		];
	}


}