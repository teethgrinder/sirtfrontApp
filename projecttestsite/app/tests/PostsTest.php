<?php

class PostsTest extends ApiTester {

	
	public function testItFetchesPosts()

	{
		$this->times(5)->makePost();

		$this->getJson('api/v1/posts');

		$this->assertResponseOk();

	}

	private function makePost($postFields=[])
	{
		$post = array_merge([
			'title' => $this->fake->sentence,
			'content' => $this->fake->paragragraph
		], $postFields);

		while($this->times --)Post::create($post);
	}

	
	// /**
	//  * A basic functional test example.
	//  *
	//  * @return void
	//  */
	// public function testBasicExample()
	// {
	// 	$crawler = $this->client->request('GET', '/');

	// 	$this->assertTrue($this->client->getResponse()->isOk());
	// }

}
