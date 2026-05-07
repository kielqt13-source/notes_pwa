@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 sm:p-8 lg:p-10">
    
    <div class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-4xl font-bold text-gray-900 mb-1">Notes App</h1>
            <p class="text-gray-500 text-sm">Create and manage your notes</p>
        </div>
        <a href="{{ route('home') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700 transition-colors inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Home
        </a>
    </div>
    
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-10 overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-6">
            <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Create a New Note
            </h2>
        </div>
        <div class="p-6">
            <form method="POST" action="/notes" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">Title</label>
                    <input 
                        name="title" 
                        placeholder="Enter a descriptive title" 
                        required
                        class="w-full border-2 border-gray-200 px-4 py-3 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all text-gray-900 placeholder-gray-400 font-medium">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">Content</label>
                    <textarea 
                        name="content" 
                        placeholder="Write your thoughts here..." 
                        required 
                        rows="5"
                        class="w-full border-2 border-gray-200 px-4 py-3 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition-all text-gray-900 placeholder-gray-400 resize-none font-medium"></textarea>
                </div>
                <div class="flex justify-end pt-2">
                    <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-8 py-3 rounded-xl shadow-lg shadow-indigo-200 transition-all transform hover:scale-[1.02] focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 inline-flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add Note
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="space-y-4">
        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Your Notes
        </h3>
        @foreach($notes as $note)
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all group relative hover:border-indigo-200">
                <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $note->title }}</h4>
                <p class="text-gray-600 leading-relaxed whitespace-pre-wrap">{{ $note->content }}</p>

                <form method="POST" action="/notes/{{ $note->id }}" class="absolute top-4 right-4 md:opacity-0 md:group-hover:opacity-100 transition-all">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 px-4 py-2 rounded-lg font-medium transition-all inline-flex items-center gap-2" title="Delete note">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection