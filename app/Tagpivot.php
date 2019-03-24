<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagpivot extends Model
{
    public $timestamps = false;
    protected $guarded = ['updated_at','created_at'];
    protected $table='questions_tags';
}
