<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = ['created_at','updated_at'];


    public function tags()
    {
        return $this->belongsToMany('App\Question', 'questions_tags', 'question_id', 'tag_id');
    }
}
