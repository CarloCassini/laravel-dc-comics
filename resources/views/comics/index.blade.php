@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1>eccolo</h1>

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
        <td style="background-color: blue">
            <a href="{{ route('comics.show' , $comic->id)}}">
                VAI
            </a>
            </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  </section>
@endsection
