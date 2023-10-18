@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1>eccolo create</h1>
    <a href="{{route('comics.index')}}" class="btn btn-primary"> torna alla lista</a>

    <form action="{{route('comics.store')}}" method="POST">
        {{-- questo token va inserito all'inizio del form per permetterne l'utilizzo --}}
        @csrf
    {{-- inserisco i campi da riempire per il caricare il documento --}}
    <div class="input-group input-group-sm my-3">
        <span class="input-group-text" id="title">title</span>
        <input type="text" class="form-control" aria-describedby="title" name="title">
      </div>
  
      <div class="input-group my-3">
        <span class="input-group-text" id="description">description</span>
        <textarea class="form-control" aria-describedby="description" name="description"></textarea>
      </div>
 
      <div class="input-group input-group-sm my-3">
        <span class="input-group-text" id="price">price</span>
        <input type="number" class="form-control" aria-describedby="price" name="price">
      </div>
   
      <div class="input-group input-group-sm my-3">
        <span class="input-group-text" id="series">series</span>
        <input type="text" class="form-control" aria-describedby="series" name="series">
      </div>

      <button class="btn btn-primary"> salva

      </button>
    </form>
  </section>
@endsection
