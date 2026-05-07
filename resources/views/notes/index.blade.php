@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 sm:p-8">
    
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900">Notes App</h1>
        <a href="{{ route('home') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors">
            &larr; Back to Home
        </a>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-10">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Create a New Note</h2>
            <form method="POST" action="/notes" class="space-y-4">
                @csrf
                <div>
                    <input name="title" placeholder="Note Title" required
                        class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-shadow text-gray-900 placeholder-gray-400">
                </div>
                <div>
                    <textarea name="content" placeholder="Write your thoughts here..." required rows="4"
                        class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-shadow text-gray-900 placeholder-gray-400 resize-none"></textarea>
                </div>
                <div class="flex justify-end pt-2">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2.5 rounded-lg shadow-sm transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Add Note
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="space-y-4">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Your Notes</h3>
        @foreach($notes as $note)
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all group relative">
                <h4 class="text-xl font-semibold text-gray-800 mb-2">{{ $note->title }}</h4>
                <p class="text-gray-600 leading-relaxed whitespace-pre-wrap">{{ $note->content }}</p>

                <form method="POST" action="/notes/{{ $note->id }}" class="absolute top-4 right-4 md:opacity-0 md:group-hover:opacity-100 transition-opacity">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md font-medium transition-colors" title="Delete note">
                        Delete
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
