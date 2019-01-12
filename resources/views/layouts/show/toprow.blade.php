<div class="col-md-3">
    <h3>Counterset: {{$operator}} {{$ile}}</h3>
    <form action="{{route('setsentences')}}" method="POST">{{csrf_field()}}{{method_field('PATCH')}}
        <input type="hidden" name="sentences" value="@if($sentencesetting==0){{1}}@else{{0}}@endif">
            <button type="submit" class="btn btn-info btn-sm glow @if($sentencesetting==1) glow2 @endif">Same zdania</button>
    </form>
</div>
<div class="col-md-3">
    <div class="row">
    <div class="col-md-12">
    <h3>Kategoria: </h3>
    </div>
    </div>
    <div class="row">
    <div class="col-md-9">
    <form action="{{route('setcategory')}}" method="POST">{{csrf_field()}}{{method_field('PATCH')}}
    <select class="form-control"  name="category" id="">
        <option value="0") >Nie patrz na kategorie</option>
        <option value="1" @if($categorysetting==1) selected @endif) >Bez kategorii</option>
        @foreach($categories as $category) <option value="{{$category->id}}" @if($categorysetting==$category->id) selected @endif)>{{$category->name}}</option> @endforeach
    </select>

    </div>
    <div class="col-md-3">
    <button class="btn btn-sm btn-info">Ustaw</button>
    </form>
    </div>
    </div>
</div>
