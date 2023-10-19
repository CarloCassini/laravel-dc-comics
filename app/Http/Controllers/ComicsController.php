<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// uso il model dei comics
use App\Models\Comic;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $comics = Comic::all();
        return view('comics.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // metto i dati passati col form dentro una variabile $data
        $data = $request->all();
        // creo un nuovo oggetto $comic che riempirò con i dati passati
        $comic = new Comic();
        // riempio il nuovo oggetto con i dati passati dal form
        $comic->fill($data);
        // salvo l'oggetto nel mio db
        $comic->save();

        // mostro la pagina di index con tutti i record, compreso quello nuovo
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comics = Comic::where('id', '=', $id)->get();
        // questa funzione mi manda sulla 
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        $comic->update($data);

        // qui chiamiamo una redirect, gestisce meglio cronologia e navigazine, ma non l'ho capito alla grandissima
        return redirect()->route('comics.show', $comic->id)
            ->with('success', 'ben fatto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {

        $comic->delete();
        return redirect()->route('comics.index')
            ->with('success', 'distrutto');

        //
    }
}