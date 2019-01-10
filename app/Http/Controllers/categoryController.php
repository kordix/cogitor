<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Setting;

class categoryController extends Controller
{
  public $ile;
  public $operator;
  public $currentlanguage;
  public $sentencesetting;

  public function __construct()
  {
      $this->middleware('auth');
      $this->ile=Setting::find(1)->counterset;
      $this->operator=Setting::find(1)->operator;
      $this->currentlanguage=Setting::find(1)->language;
      $this->sentencesetting=Setting::find(1)->sentences;
      $this->categorysetting=Setting::find(1)->category;
      $this->answersetting=Setting::find(1)->answerset;

      session_start();
  }



  public function storecategory(Request $request)
  {
      Category::create([
          'name' => request('name')
      ]);
      session()->flash('message', 'Dodano kategorię');
      return back();
  }

  public function listcategories()
  {
      $categories = Category::all();
      return view('layouts.listcategories', compact('categories'));
  }

  public function createcategory()
  {
      return view('layouts.createcategory');
  }

  public function updatec($id, Request $request)
  {
      Category::find($id)->update([
          'name' =>request('name')
      ]);

      session()->flash('message', 'Zedytowano kategorię');
      return back();
  }

}
