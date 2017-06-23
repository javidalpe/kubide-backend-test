<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Note::all();
        if ($request->favorite) {
            $query = $query->where('favorite', filter_var($request->favorite, FILTER_VALIDATE_BOOLEAN));
        }
        return $query;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Note::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Note::findOrFail($id);
    }

    /**
     * Favorite a note
     */
    public function favorite($id)
    {
        $note = Note::findOrFail($id);
        $note->favorite = true;
        $note->save();

        return $note;
    }

    /**
     * Unfavorite a note
     */
    public function unfavorite($id)
    {
        $note = Note::findOrFail($id);
        $note->favorite = false;
        $note->save();

        return $note;
    }

}
