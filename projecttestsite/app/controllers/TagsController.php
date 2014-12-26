<?php use Sirtcantalilar\Transformers\TagTransformer;

class TagsController extends ApiController {

	protected $tagTransformer;

	function __construct(TagTransformer $tagTransformer) 
	{
		$this->tagTransformer = $tagTransformer;
	}

	/**
	 * Display a listing of the resource.
	 * GET /tags
	 *
	 * @return Response
	 */
	public function index($postId = null)
	{
		$tags = $this->getTags($postId);
		return $this->respond([
			'data' => $this->tagTransformer->transformCollection($tags->all())
		]);
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tags/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tags
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /tags/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tags/{id}/edit
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
	 * PUT /tags/{id}
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
	 * DELETE /tags/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	/**
	 * [getTags description]
	 * @param  [type] $postId [description]
	 * @return [type]  mixed       [description]
	 */
	private function getTags($postId)

	{
		return $postId ? Post::findOrFail($postId)->tags : Tag::all();

	}

}