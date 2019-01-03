<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class apicontroller extends Controller
{
    public function showapi($id)
    {
        return Question::find($id);
    }
}
