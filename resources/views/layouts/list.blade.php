@extends('layouts.app')


@section('content')
<div class="container" style="margin:5px 0px 5px 0px">
    <div class="row">

  <div class="col-md-5">

<a href="{{route('list','category_id')}}"><button class="btn btn-primary">Ułóż kategoriami</button></a>
<a href="{{route('list','rodzajnik')}}"><button class="btn btn-primary">Ułóż rodzajnikami</button></a>
<a href="{{route('list','id')}}"><button class="btn btn-primary">Id</button></a>
<a href="{{route('list','answer')}}"><button class="btn btn-primary">Alfabetycznie</button></a>
</div>

<div class="col-md-2">

<div class="dropdown" style="">
   <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filtruj kategorię
   <span class="caret"></span></button>
   <ul class="dropdown-menu">
     @foreach($categories as $category)
     <li><a href="{{route('listcat',$category->id)}}">{{$category->name}}</a></li>
   @endforeach
   </ul>
 </div>
</div>

<div class="col-md-2">

<div class="dropdown" style="">
   <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filtruj tag
   <span class="caret"></span></button>
   <ul class="dropdown-menu">
     @foreach($tags as $tag)
     <li><a href="{{route('listtag',$tag->id)}}">{{$tag->name}}</a></li>
   @endforeach
   </ul>
 </div>
</div>

<div class="col-md-2">
    <button type="button" class="btn btn-focus" id="hideanswersbut" name="button">Schowaj odpowiedzi</button>
</div>

</div>



</div>
<table>
@foreach($rows as $row)
<tr>
    <td class="col-md-3"><a href="{{route('show', $row->id)}}"> {{$row->question}}</a></td>
    <td class="col-md-2">{{$categories->find($row->category_id)['name']}} </td>

    <td class="col-md-1">{{$row->counter}}</td>

    <td class="col-md-5 answercolumn"><b><span class="text-danger">{{$row->rodzajnik}}</span> {{$row->answer}}</b></td>
</tr>



@endforeach
</table>


@endsection

@section('scripts')
    <script>

var els = document.getElementsByClassName('answercolumn');
document.getElementById('hideanswersbut').onclick = function(){
    Array.prototype.forEach.call(els, function(el) {
        // Do stuff here
        el.classList.toggle("hide");
    });


};



// .forEach(function(item,index){
//     item.style.display='none';
//     console.log('fsafds');
//     console.log(item.style.display);
// });


</script>

@endsection
