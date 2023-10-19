@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1>eccolo</h1>
    
    {{-- il bottone per la lista appare solo se non siamo in --}}
    @if (Route::currentRouteName() != 'comics.index' )    
        <a href="{{route('comics.index')}}" class="btn btn-primary"> torna alla lista</a>
    @endif

{{-- intestazione della tabella --}} 
<a href="{{route('comics.create')}}" class="btn btn-primary"> creane uno nuovo</a>

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
            <a href="{{ route('comics.show' , $comic->id)}}" style="background-color: blue" class="px-5 py-2 m-1">
                dettaglio
            </a>
            <a href="{{ route('comics.edit' , $comic)}}" style="background-color: green " class="px-5 py-2 m-1">
              modifica
           </a>
             <a href="#" style="background-color: red " class="px-5 py-2 m-1" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$comic->id}}">
            cancella
            </a>

          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

   </section>
@endsection

{{-- qui viene gestito il popup di richiesta della modal di cancellazione --}}
@section('modals')
  @foreach ($comics as $comic)
  <div class="modal fade" id="delete-modal-{{$comic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina elemento</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        Sicuro di voler eliminare la riga dal titolo <span class="fw-bolder"> {{$comic->title}} </span> ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          {{-- deve trattarsi di un form per poter cambiare il metodo in delete --}}
          <form action="{{ route('comics.destroy' , $comic)}}"  method="POST">

            {{-- i seguenti 2 campi servono a fare funzionare il form --}}
            @csrf
            @method('DELETE')
                       
            <button class="btn btn-danger">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
