<?php

class Post extends Eloquent 
{
	protected $fillable = ['title', 'content'];
	/**
	 * Returns a formatted post content entry, this ensures that
	 * line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->content);
	}
	/**
	 * get the tags posts relationship
	 *
	 * @param  null $id
	 * @return Response
	 */
	public function tags()

	{
		return $this->belongsToMany('Tag');
	}
	
	/**
	 * Return the post's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('Author');
	}

}