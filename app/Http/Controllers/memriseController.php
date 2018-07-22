<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Setting;

use DB;

class memriseController extends Controller
{
    public $ile;
    public $operator;
    public function __construct()
    {
        $this->ile=Setting::find(1)->counterset;
        $this->operator=Setting::find(1)->operator;
        $this->currentlanguage=Setting::find(1)->language;
    }
    public function show($id)
    {
        // dd($this->currentlanguage);
        $currentlanguage = $this->currentlanguage;
        $question = Question::find($id);
        $ile=$this->ile;
        $operator=$this->operator;
        $next = Question::where('counter', '<', $this->ile)->where('language', '=', $this->currentlanguage)->where('id', '>', $id)->min('id');

        // dd($next);
        $previous = Question::where('counter', '<', $this->ile)->where('id', '<', $id) ->max('id');

        return view('layouts.show', compact('question', 'ile', 'previous', 'operator', 'next', 'currentlanguage'));
    }

    public function random()
    {
        $question = Question::all()->random();
        return view('layouts.show', compact('question'));
    }

    public function answer(Request $request)
    {
        $question = $request->input('question');
        $useranswer = $request->input('useranswer');
        $answer = $request->input('answer');
        $id = $request->input('id');
        $currentlanguage = $this->currentlanguage;

        $question2 = Question::find($id);
        // dd($question);
        // dd($answer);

        if (mb_strtolower($answer) == mb_strtolower($useranswer)) {
            //echo "Bardzo dobrze! <br> ";
            $check = 1;
            DB::table('questions')->whereId($id)->increment('counter');
        } else {
            //echo "Bardzo źle <br> ";
            $check = 0;
        }
        // $next = Question::where('id', '>', $id)->min('id');

        $ile = $this->ile;
        $next = Question::where('counter', '<', $this->ile)->where('language', '=', $this->currentlanguage)->where('id', '>', $id) ->min('id');

        if (!isset($next)) {
            $next = Question::where('counter', '<', $this->ile)->where('id', '<', $id) ->min('id');
        };
        //dd($next);
        //$next2 = Question::all()->where('counter', '<', $ile)->random()->id;
        //dd($next2);

        $previous = Question::where('counter', '<', $this->ile)->where('id', '<', $id) ->min('id');
        // $next = Question::where('id', '>', $id) ->min('id');
        // dd($next);
        $question2 = Question::find($id);
        $counter = $question2->counter;

        return view('layouts.check', compact('ile', 'next', 'check', 'question', 'useranswer', 'answer', 'id', 'question2', 'counter', 'previous', 'question2', 'currentlanguage'));

        // echo 'pytanie: '.$question.'<br>';
        // echo 'twoja odpowiedź: '.$useranswer.'<br>';
        // echo 'poprawna odpowiedź: '.$answer.'<br>';
        // echo 'id pytania:'.$id.'<br>';
    }

    public function create()
    {
        $currentlanguage = $this->currentlanguage;
        return view('layouts.create', compact('currentlanguage'));
    }

    public function edit($id)
    {
        $currentlanguage = $this->currentlanguage;
        $question = Question::find($id);
        $next = Question::where('counter', '<', $this->ile)->where('language', '=', $this->currentlanguage)->where('id', '>', $id)->min('id');

        return view('layouts.edit', compact('question', 'next', 'currentlanguage'));
    }

    public function start()
    {
        // $ile = Setting::find(1)->counterset;
        $next = Question::where('counter', '<', $this->ile)->where('language', '=', $this->currentlanguage)->min('id');
        return redirect()->route('show', ['id'=>$next])->with('autofocus', true);
    }

    public function review()
    {
        $id = $request->input('id');
        $next = Question::where('id', '>', $id) ->min('id');
    }

    public function store(Request $request)
    {
        Question::create([
            'question' => request('question'),
            'answer' => request('answer'),
            'zdanie' => request('zdanie'),
            'language' => request('jezyk')
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
            'language' => request('jezyk')
        ]);

        session()->flash('message', 'Zedytowano');

        return back();
    }

    public function list()
    {
        $currentlanguage = $this->currentlanguage;
        if ($currentlanguage == 'DE') {
            $rows = Question::where('language', '=', 'DE')->get();
        } else {
            $rows = Question::where('language', '=', 'SP')->get();
        }
        // $rows = Question::where('completed', 0)->get();


        return view('layouts.list', compact('rows', 'currentlanguage'));
    }

    public function listzdania()
    {
        $currentlanguage = $this->currentlanguage;
        $rows = Question::where('zdanie', 1)->get();
        return view('layouts.list', compact('rows', 'currentlanguage'));
    }


    public function setcounter(Request $request)
    {
        Setting::find(1)->update([
            'operator'=>request('operator'),
            'counterset'=>request('counterinput')
        ]);

        session()->flash('message', 'Zmieniono counter filtrowanych pytań');
        return back();
    }

    public function setcounterquestion($id, Request $request)
    {
        Question::find($id)->update([
            'counter'=> request('counter')
        ]);

        $next = Question::where('counter', '<', $this->ile)->where('id', '>', $id) ->min('id');
        return redirect()->route('show', ['id'=>$next]);
    }

    public function mamracje($id, Request $request)
    {
        Question::find($id)->update(['counter'=> request('counter')]);

        session()->flash('message', 'Ok masz rację');
        $next = Question::where('counter', '<', $this->ile)->where('id', '>', $id) ->min('id');
        return redirect()->route('show', ['id'=>$next]);
        // $this->nextt($id);
    }

    public function nextt($id)
    {
        $next = Question::where('counter', '<', $this->ile)->where('id', '>', $id) ->min('id');
        return redirect()->route('show', ['id'=>$next]);
    }

    public function setlanguage(Request $request)
    {
        Setting::find(1)->update([
            'language' => request('jezyk')
        ]);

        session()->flash('message', 'Zedytowano');

        return back();
    }
}
