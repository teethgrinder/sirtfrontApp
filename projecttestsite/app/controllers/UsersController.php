<?php
use Sirtcantalilar\Transformers\UserTransformer;

class UsersController extends ApiController {
	/**
	 *  @var Sirtcantalilar\Transformers\UserTransformer
	 */

	protected $userTransformer;

	 function  __construct(UserTransformer $userTransformer){
	 	$this->userTransformer = $userTransformer;
	}

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = Sentry::findAllUsers();
		return Response::json(['data' => $this->userTransformer->transformCollection($users)], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = Sentry::findUserById($id);
		if(!$user) {
			return Response::json([ 'message' => 'user does not exits',
									'code' => '104'], 404);
		}

		return Response::json([
				'data' => $this->userTransformer->transform($user)
		], 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



}