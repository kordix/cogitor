@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                <button class="btn btn-default" type="submit">Logout</button>
                {{ csrf_field() }}
            </form>
        </div>

<a href="{{route('list','category_id')}}"><button class="btn btn-primary">Ułóż kategoriami</button></a>
<a href="{{route('list','rodzajnik')}}"><button class="btn btn-primary">Ułóż rodzajnikami</button></a>
<a href="{{route('list','id')}}"><button class="btn btn-primary">Id</button></a>
<a href="{{route('list','answer')}}"><button class="btn btn-primary">Alfabetycznie</button></a>




</div>
<table>
@foreach($rows as $row)
<tr>
    <td class="col-md-3"><a href="{{route('edit', $row->id)}}"> {{$row->question}}</a></td>
    <td class="col-md-2">{{$categories->find($row->category_id)['name']}} </td>

    <td class="col-md-1">{{$row->counter}}</td>

    <td class="col-md-5"><b><span class="text-danger">{{$row->rodzajnik}}</span> {{$row->answer}}</b></td>
</tr>



@endforeach
</table>
</div>
@endsection
