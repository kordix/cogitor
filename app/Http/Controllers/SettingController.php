<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Question;


class SettingController extends Controller
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

  public function set(Request $request){
    Setting::find(1)->update([
        'operator'=>request('operator',Setting::find(1)->operator),
        'counterset'=>request('counterinput',Setting::find(1)->counterinput),
        'answerset'=>request('answerset',Setting::find(1)->answerset),
        'counter'=> request('counter',Setting::find(1)->counterset),
        'language' => request('jezyk',Setting::find(1)->language),
        'sentences' => request('sentences',Setting::find(1)->sentences),
        'category' => request('category',Setting::find(1)->category)
    ]);
  }

  public function setcounter(Request $request)
  {
      Setting::find(1)->update([
          'operator'=>request('operator'),
          'counterset'=>request('counterinput')
      ]);

      session()->flash('message', 'Zmieniono counter filtrowanych pytań');
      return redirect()->route('start');
      //return memriseController::redyrekcja();
  }

  public function setanswerset(Request $request)
  {

      Setting::find(1)->update([
          'answerset'=>request('answerset')

      ]);

      session()->flash('message', 'Zmieniono tryb odpowiedzi');
      return redirect()->route('start');

  }

  public function setcounterquestion($id, Request $request)
  {

      Question::find($id)->update([
          'counter'=> request('counter')
      ]);
      session()->flash('message', 'Ustawiono counter danego pytania');
      $next = $_SESSION['next'];
      // $next = Question::where('counter', '<', $this->ile)->where('id', '>', $id) ->min('id');
      if (isset($next)){
      return redirect()->route('show', $next);
    } else {
      return redirect()->route('create');

    }
  }

  public function setlanguage(Request $request)
  {
      Setting::find(1)->update([
          'language' => request('jezyk')
      ]);

      session()->flash('message', "Ustawiono język");

      return back();
  }

  public function setsentences(Request $request)
  {
      Setting::find(1)->update([
          'sentences' => request('sentences')
      ]);

      session()->flash('message', 'Zedytowano filtrowanie zdań');

      return back();
  }

  public function setcategory(Request $request)
  {
      Setting::find(1)->update([
          'category' => request('category'),
          'counterset'=>request('counterinput',7)
      ]);
      session()->flash('message', 'ustawiono aktualną kategorię');
      return back();
  }



}
