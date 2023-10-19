@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1>eccolo</h1>
    
    {{-- il bottone per la lista appare solo se non siamo in --}}
    @if (Route::currentRouteName() != 'comics.index' )    
        <a href="{{route('comics.index')}}" class="btn btn-primary"> torna alla lista</a>
    @endif

{{-- intestazione della tabella --}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            {{-- <th scope="col">thumb</th> --}}
            <th scope="col">price</th>
            <th scope="col">series</th>
            <th scope="col">sale_date</th>
            <th scope="col">type</th>
          </tr>
        </thead>
        <tbody>

{{-- caricare i dati nella tabella --}}
    @foreach ($comics as $comic)
    <tr>
        <th scope="row">{{$comic->id}}</th>
        <td>{{$comic->title}}</td>
        <td>{{$comic->description}}</td>
        {{-- <td>{{$comic->thumb}}</td> --}}
        <td class="text-end">{{ $comic->price . '€'}}</td>
        <td>{{$comic->series}}</td>
        <td>{{$comic->sale_date}}</td>
        <td>{{$comic->type}}</td>
        <td >
          <div class="d-flex flex-column button-change-db">
            <a href="{{ route('comics.show' , $comic->id)}}" style="background-color: blue" class="px-5 py-2">
                dettaglio
            </a>
            <a href="{{ route('comics.edit' , $comic)}}" style="background-color: green " class="px-5 py-2">
               modifica
            </a>
            <form action="{{ route('comics.destroy' , $comic)}}" 
            style="background-color: red" class="px-5 py-2" method="POST">
              {{-- i seguenti 2 campi servono a fare funzionare il form --}}
              @csrf
              @method('DELETE')
             
              <button class="btn"> cancella </button>
            </form>

          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <a href="{{route('comics.create')}}" class="btn btn-primary"> creane uno nuovo</a>
  </section>
@endsection
