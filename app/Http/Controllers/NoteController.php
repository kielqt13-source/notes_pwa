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

        Auth::user()->notes()->create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return back();
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

    // Add this new method for admin dashboard
    public function adminDashboard()
    {
        $user = Auth::user();
        
        // Check if user is admin (role 1)
        if ($user->role != 1) {
            abort(403, 'Unauthorized access');
        }
        
        $notes = Note::with('user')->latest()->get();
        return view('admin.dashboard', compact('notes'));
    }
}