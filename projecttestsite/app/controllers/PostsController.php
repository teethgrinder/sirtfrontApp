<?php
use Sirtcantalilar\Transformers\PostTransformer;

class PostsController extends ApiController {
	/**
	 *  @var Sirtcantalilar\Transformers\PostTransformer
	 */

	protected $postTransformer;

	 function  __construct(PostTransformer $postTransformer){
	 	$this->postTransformer = $postTransformer;
	 	$this->beforeFilter('auth', ['only' => array('index')]);
	}

	/**
	 * Display a listing of the resource.
	 * GET /posts
	 *
	 * @return Response
	 */
	public function index()
	{
		$limit = Input::get('take') ?: 10;
		$posts = Post::with('author')->paginate($limit);

		return $this->respond([
			'data' => $this->postTransformer->transformCollection($posts->all())
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /posts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /posts
	 *
	 * @return Response
	 */
	public function store()
	{
		if(! Input::get('title') or ! Input::get('content'))
		{
			return $this->respondParameterErrors('Paramaters failed validation for a post');
		}

		Post::create(Input::all());

		return $this->respondCreated('Post succesfully created.');
	}

	/**
	 * Display the specified resource.
	 * GET /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		if (!$post) {
			return $this->respondNotFound('Post does not exist');
			// return Response::json([ 'message' => 'post does not exits',
			// 						'code' => '104'], 404);
		}

		return $this->respond([
				'data' => $this->postTransformer->transform($post)
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /posts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}