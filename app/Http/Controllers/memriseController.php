<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Category;
use App\Setting;

use DB;

class memriseController extends Controller
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

    public static function redyrekcja()
    {
        if (!isset($_SESSION['next'])) {
            return redirect()->route('create');
        } else {
            $next = $_SESSION['next'];
            return redirect()->route('create');

            //return redirect()->route('show', ['id'=>$next]);
        }
    }

    public function show($id)
    {
        global $next;


        $categories=Category::all();
        $currentlanguage = $this->currentlanguage;
        $sentencesetting = $this->sentencesetting;
        $categorysetting = $this->categorysetting;
        $answersetting = $this->answersetting;
        $ile=$this->ile;
        $operator=$this->operator;

        if ('b'<'a') {
            dd('fdasfasdff');
        }
        // for($i=0;$i=1;$i++){
        //   $random[$i]=Question::all()->where('zdanie', '=', 0)->where('category_id', '=', $categorysetting)->random();
        // }

        $question = Question::find($id);
        $random1=Question::where('language', '=', $this->currentlanguage)->where('zdanie', '=', 0)->where('category_id', '<>', 6)->where('answer', '>', $question->answer)->get()->sortBy('answer');
        //$random2=Question::all()->where('language', '=', $this->currentlanguage)->where('zdanie', '=', 0)->where('category_id', '<>', 6)->where('question', '>', $random1->question);
        // dd($random1[1]);
        // $random1->values()->all();
        $randoms = $random1->slice(0, 4);
        $randoms = $randoms->pluck('answer')->toArray();
        array_push($randoms, $question->answer);
        shuffle($randoms);
        // dd($randoms);


        // dd($randoms);
        if ($categorysetting<>0) {
            $next = Question::where('counter', '<', $this->ile)->where('id', '>', $id)->where('language', '=', $this->currentlanguage)->where('zdanie', '=', $sentencesetting)->where('category_id', '=', $categorysetting)->min('id');
        } else {
            $next = Question::where('counter', '<', $this->ile)->where('id', '>', $id)->where('language', '=', $this->currentlanguage)->where('zdanie', '=', $sentencesetting)->min('id');
        }
        if (!isset($next) && $categorysetting<>0) {
            $next = Question::where('counter', '<', $this->ile)->where('id', '<', $id)->where('language', '=', $this->currentlanguage)->where('zdanie', '=', $sentencesetting)->where('category_id', '=', $categorysetting)->min('id');
        }
        if (!isset($next)) {
            $next = Question::where('counter', '<', $this->ile)->where('id', '<', $id)->where('language', '=', $this->currentlanguage)->where('zdanie', '=', $sentencesetting)->min('id');
        }

        if (!isset($next)) {
            if ($categorysetting<>0) {
                session()->flash('message', 'wyczerpały się słówka w danej kategorii, zmień counter,kategorię albo dodaj nowe');
                return redirect()->route('create');
            } else {
                session()->flash('message', 'wyczerpały się słówka, zmień counter albo dodaj nowe');
                return redirect()->route('create');
            }
        }

        $_SESSION['next']=$next;
        if ($categorysetting<>0) {
            $previous = Question::where('counter', '<', $this->ile)->where('id', '<', $id)->where('language', '=', $this->currentlanguage)->where('zdanie', '=', $sentencesetting)->where('category_id', '=', $categorysetting)->max('id');
        } else {
            $previous = Question::where('counter', '<', $this->ile)->where('id', '<', $id)->where('language', '=', $this->currentlanguage)->where('zdanie', '=', $sentencesetting)->max('id');
        }

        if(!isset($previous)){

        }

        return view('layouts.show', compact('randoms', 'answersetting', 'categorysetting', 'categories', 'question', 'ile', 'previous', 'operator', 'next', 'currentlanguage', 'sentencesetting'));
    }

    public function random()
    {
        $question = Question::all()->random();
        return view('layouts.show', compact('question'));
    }

    public function answer(Request $request)
    {
        $answersetting=$this->answersetting;
        $currentlanguage = $this->currentlanguage;
        $sentencesetting = $this->sentencesetting;
        $question = $request->input('question');
        $useranswer = $request->input('useranswer');
        $answer = $request->input('answer');
        $id = $request->input('id');
        $question2 = Question::find($id);
        $answer = ($this->answersetting==1) ? $answer : $question;

        if (mb_strtolower($answer) == mb_strtolower($useranswer)) {
            $check = 1;
            DB::table('questions')->whereId($id)->increment('counter');
        } else {
            $check = 0;
        }

        $ile = $this->ile;
        $next = $_SESSION['next'];
        $previous = Question::where('counter', '<', $this->ile)->where('id', '<', $id) ->min('id');
        $counter = $question2->counter;

        return view('layouts.check', compact('answersetting', 'ile', 'next', 'check', 'question', 'useranswer', 'answer', 'id', 'question2', 'counter', 'previous', 'question2', 'currentlanguage'));
    }

    public function create()
    {
        $currentlanguage = $this->currentlanguage;
        $sentencesetting = $this->sentencesetting;
        $categories = Category::all();

        return view('layouts.create', compact('currentlanguage', 'sentencesetting', 'categories'));
    }

    public function edit($id)
    {
        $this->middleware('auth');
        $categories = Category::all();
        $question = Question::find($id);
        $sentenceset = $question->zdanie;
        $currentlanguage = $this->currentlanguage;
        $next = Question::where('counter', '<', $this->ile)->where('language', '=', $this->currentlanguage)->where('category_id', '=', $this->categorysetting)->where('id', '>', $id)->where('zdanie', '=', $sentenceset)->min('id');
        return view('layouts.edit', compact('question', 'next', 'currentlanguage', 'categories'));
    }

    public function start()
    {
        $next = Question::where('counter', '<', $this->ile)->where('language', '=', $this->currentlanguage)->min('id');

        return redirect()->route('show', ['id'=>$next])->with('autofocus', true);
    }

    public function store(Request $request)
    {
        Question::create([
            'question' => request('question'),
            'answer' => request('answer'),
            'zdanie' => request('zdanie'),
            'language' => request('jezyk'),
            'category_id' => request('category_id'),
            'rodzajnik' =>request('rodzajnik')
        ]);
        session()->flash('message', 'Dodano do bazy');
        return back();
    }

    public function update($id, Request $request)
    {
        Question::find($id)->update([
            'question' =>request('question'),
            'answer' =>request('answer'),
            'zdanie' =>request('zdanie'),
            'language' => request('jezyk'),
            'category_id' => request('category_id'),
            'rodzajnik' => request('rodzajnik')
        ]);

        session()->flash('message', 'Zedytowano');
        $sentenceset = $this->sentencesetting;
        $currentlanguage = $this->currentlanguage;
        $next = Question::where('counter', '<', $this->ile)->where('language', '=', $this->currentlanguage)->where('category_id', '=', $this->categorysetting)->where('id', '>', $id)->where('zdanie', '=', $sentenceset)->min('id');
        return redirect()->route('edit', $_SESSION['next']);
    }


    public function list($param = 'id')
    {
        $currentlanguage = $this->currentlanguage;
        $sentencesetting = $this->sentencesetting;
        $rows = Question::where('language', '=', $currentlanguage)->where('zdanie', '=', $this->sentencesetting)->orderBy($param, 'desc')->orderBy('counter')->get();
        $categories = Category::all();

        return view('layouts.list', compact('rows', 'currentlanguage', 'categories'));
    }

    public function listzdania($param = 'id')
    {
        $currentlanguage = $this->currentlanguage;
        $categories = Category::all();
        $rows = Question::where('language', '=', $currentlanguage)->where('zdanie', '=', 1)->orderBy($param)->get();
        return view('layouts.list', compact('rows', 'currentlanguage', 'categories'));
    }

    public function mamracje($id, Request $request)
    {
        $this->middleware('auth');

        Question::find($id)->update(['counter'=> request('counter')]);

        session()->flash('message', 'Ok masz rację');

        $next = $_SESSION['next'];
        return redirect()->route('show', ['id'=>$next]);
    }

    public function delete(Question $question)
    {
        $this->middleware('auth');
        $next = $_SESSION['next'];
        $question->delete();
        session()->flash('message', 'usunięto fiszke');
        return redirect()->route('show', $next);
    }
}
