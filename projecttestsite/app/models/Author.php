<?php

class Author extends Eloquent {

    /**
     * Return the authors's posts.
     *
     * @return Post
     */
    public function posts()
    {
        return $this->hasMany('Post');
    }


    public function image()
    {
        return $this->hasOne('Image') ;
    }

    /**
     * Return the URL to the post.
     *
     * @return string
     */
    public function url()
    {
        return URL::route('view-author', $this->slug);
    }

    /**
     * Returns the user Gravatar image url.
     *
     * @return string
     */
    public function gravatar()
    {
        // Generate the Gravatar hash
        $gravatar = md5(strtolower(trim($this->gravatar)));

        // Return the Gravatar url
        return "//gravatar.org/avatar/{$gravatar}";
    }


}