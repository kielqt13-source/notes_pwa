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

        $user = Auth::user();

        // Prevent admins from creating personal notes
        if ($user->role == 1) {
            abort(403, 'Admins cannot create personal notes.');
        }

        $user->notes()->create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return back();
    }

    public function update(Request $request, Note $note)
    {
        $user = Auth::user();

        // Authorize update: only admin or the note owner can update
        if ($user->role != 1 && $user->id != $note->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $note->update($validated);
        return back();
    }

    public function destroy(Note $note)
    {
        $user = Auth::user();

        // Authorize deletion: only admin or the note owner can delete
        if ($user->role != 1 && $user->id != $note->user_id) {
            abort(403, 'Unauthorized action.');
        }

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
            // Redirect admins to the admin dashboard instead of showing personal notes
            return redirect()->route('admin.dashboard');
        }

        $notes = $user->notes()->latest()->get();
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