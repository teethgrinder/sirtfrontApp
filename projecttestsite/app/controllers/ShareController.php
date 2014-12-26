<?php

class ShareController extends \BaseController {



	/**
	 * Show the form for creating a new resource.
	 * GET /share/create
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('share');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /share
	 *
	 * @return Response
	 */
	    public  function store($id, $owner)
	    {
	        $user_id = Auth::id();
	        $user_name = Auth::username();
	        //$owner = dont know how to say the owner is the user to wich belongs the shared photo

	        $photoID = Photo::where('id', $id)->get();
	        $message = "$user_name has liked $owner.'s photo image id - $photoID";

	        $feed = new Feed;
	        $feed->user_id = $user_id;
	        $feed->message = $message;
	        $feed->timestamp = time();
	        $feed->save();

	        //redirect
	        if ($feed->save()) {
	            Alert::success('Successfully shared photo.')->flash();
	            return Redirect::route('home')
	                ->with('alerts', Alert::all());
	        }
	    }



}