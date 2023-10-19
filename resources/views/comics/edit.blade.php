@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1>eccolo edit</h1>
    <a href="{{route('comics.index')}}" class="btn btn-primary"> torna alla lista</a>

{{-- fai attenzione che la action porti con se anche il record che va modificato --}}
    <form action="{{route('comics.update', $comic)}}" method="POST">
        {{-- questo token va inserito all'inizio del form per permetterne l'utilizzo --}}
        @csrf
        {{-- bisogna inserire il metodo del form per permettere l'update --}}
        @method('PUT')

    {{-- inserisco i campi da riempire per il caricare il documento --}}
    <div class="input-group input-group-sm my-3">
        <span class="input-group-text" id="title">title</span>
        <input type="text" class="form-control" aria-describedby="title" name="title" value="{{$comic['title']}}">
      </div>

      {{-- attenzione: le textarea non hanno value ma il testo dentro il tag --}}
      <div class="input-group my-3 textarea-form">
        <span class="input-group-text" id="description">description</span>
        <textarea class="form-control" aria-describedby="description" name="description" >{{$comic['description']}}</textarea>
      </div>
 
      <div class="input-group input-group-sm my-3">
        <span class="input-group-text" id="price">price</span>
        <input type="number" class="form-control" aria-describedby="price" name="price" value="{{$comic['price']}}">
      </div>
   
      <div class="input-group input-group-sm my-3">
        <span class="input-group-text" id="series">series</span>
        <input type="text" class="form-control" aria-describedby="series" name="series" value="{{$comic['series']}}">
      </div>

      <button class="btn btn-primary"> salva

      </button>
    </form>
  </section>
@endsection
