<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return view('notes.index', [
            'notes' => Note::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        // This is the line that was causing the issue and should be removed.
        // Note::create($request->all());

        // This was also returning early, preventing the correct code from running.
        // return back();

        // This is the correct way to create the note and associate it with the authenticated user.
        Auth::user()->notes()->create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return back(); // Now this return belongs to the correct creation method.
    }

    public function update(Request $request, Note $note)
    {
        $note->update($request->all());
        return back();
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return back();
    }

    public function showNote()
    {
        return view('notes.showNote');
    }

    public function dashboard()
{
    $user = Auth::user();

    if ($user->role == 1) {
    
        $notes = Note::with('user')->latest()->get();
        return view('dashboard', compact('notes'));
    }

    $notes = $user->notes;
    return view('dashboard', compact('notes'));
}


}
