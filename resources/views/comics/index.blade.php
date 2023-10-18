@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1>eccolo</h1>
    @foreach ($comics as $comic)
        
    {{$comic->title}}
    <br>
    @endforeach
  </section>
@endsection
