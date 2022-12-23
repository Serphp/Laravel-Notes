<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notes = Note::all();
        return view('notes.index')->with('notes', $notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $isEdit = false;
        // return view('notes.create-edit')->with('isEdit', $isEdit);
        return view('notes.create-edit', compact(['isEdit']));
        // return view('notes.create-edit', ['isEdit' => $isEdit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //validate
        $request->validate([
            "title" => "required|min:8",
            "description" => "required|min:12",
            "test" => "required",
        ]);

        $note = new Note();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->save();
        return redirect()->route('notes.show', $note->id);
        //return view('mi-vista')->with('error', $error);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //$note = Note::find($note->id);
        //return $note;
        //
        return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
        $isEdit = true;
        return view('notes.create-edit', compact(['isEdit', 'note']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //Update Note
        $request->validate([
            "title" => "required",
            "description" => "required",
        ]);

        $note->title = $request->title;
        $note->description = $request->description;
        $note->update();

        return redirect()->route('notes.show', $note->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
        // dd($note);
        $note->delete();
        return redirect()->route('notes.index');
    }
}
