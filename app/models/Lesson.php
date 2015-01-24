<?php
/**
 * Created by PhpStorm.
 * User: Mwaa
 * Date: 1/24/2015
 * Time: 12:54 PM
 */

class Lesson extends \Eloquent{

    protected $fillable = ['title','body','some_bool'];

    public function tags()
    {
        return $this->belongsToMany('Tag');
    }
} 