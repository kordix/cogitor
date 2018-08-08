<?php

namespace App\Http\Controllers;

use App\Listen;
use App\Setting;
use Illuminate\Http\Request;

class ListenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $sentencesetting;

    public function __construct()
    {
        $this->ile=Setting::find(1)->counterset;
        $this->operator=Setting::find(1)->operator;
        $this->currentlanguage=Setting::find(1)->language;
        $this->sentencesetting=Setting::find(1)->sentences;
        session_start();
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentlanguage = $this->currentlanguage;

        return view('layouts.listencreate', compact('currentlanguage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Listen::create([
            'content' => request('content'),
            'title' => request('title')
        ]);
        session()->flash('message', 'Dodano do bazy');
        return back();
    }

    public function start()
    {
        $next = Listen::where('counter', '<', $this->ile)->min('id');
        return redirect()->route('listenshow', ['id'=>$next])->with('autofocus', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listen  $listen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentlanguage = $this->currentlanguage;
        $zbigniew = file_get_contents('http://quotesondesign.com/wp-json/posts?filter[orderby]=rand&filter[posts_per_page]');
        $zbigniew2 = json_decode($zbigniew);
        $zbigniew3 = $zbigniew2[0]->content;
        $zbigniew4 = trim(strip_tags($zbigniew3));
        $zbigniew5 = html_entity_decode($zbigniew4);
        // dd($zbigniew5);
        // dd($zbigniew2[0]->content);
        $ile=$this->ile;
        $operator=$this->operator;
        $next = Listen::where('id', '>', $id)->where('counter', '<', $this->ile)->min('id');
        $question = Listen::find($id);
        $content = html_entity_decode($question->content);
        $content = str_replace('\'', '', $question->content);
        $content2 = str_replace('Im', 'aim', $content);

        return view('layouts.listenshowquotes', compact('question', 'currentlanguage', 'next', 'ile', 'operator', 'content2', 'zbigniew', 'zbigniew2', 'zbigniew5'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listen  $listen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Listen::find($id);
        $next = Listen::where('counter', '<', $this->ile)->where('id', '>', $id)->min('id');
        return view('layouts.listenedit', compact('question', 'next'));
        dd($next);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listen  $listen
     * @return \Illuminate\Http\Response
     */

    public function setcounterquestion($id, Request $request)
    {
        Listen::find($id)->update([
             'counter'=> request('counter')
         ]);

        $next = Listen::where('counter', '<', $this->ile)->where('id', '>', $id) ->min('id');
        return redirect()->route('listenshow', ['id'=>$next]);
    }


    public function update($id, Request $request)
    {
        Listen::find($id)->update([
            'content' =>request('content'),
            'title' =>request('title')
        ]);

        session()->flash('message', 'Zedytowano');

        return back();
    }

    public function list()
    {
        $rows = Listen::all();
        return view('layouts.listenlist', compact('rows'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listen  $listen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listen = Listen::find($id);
        $listen->delete();
        $next = Listen::where('counter', '<', $this->ile)->where('id', '>', $id) ->min('id');
        return redirect()->route('listenshow', $next);
    }
}
