@extends('layouts.app')

@section('content')
<div class="flex justify-between gap-6 mx-auto w-[90%]">
    <div class="w-2/3">
        <!-- Projet -->
        @include('feed.projects')

        <div class="flex items-start mt-5 gap-5">
            @if(Auth::user()->profile && Auth::user()->profile->profile_image)
            <img src="{{ asset('storage/profile/' . Auth::user()->profile->profile_image) }}" class="w-[50px] h-[50px] rounded-full" />
            @else
            <img src="{{ asset('storage/profile/unknown.png') }}" class="w-[60px] h-[60px] rounded-full" />
            @endif

            <form id="commentForm" class="w-full flex-grow  border bg-white rounded-xl shadow-md border-gray-200" action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="project_id" id="project_id" value="{{$project->id}}">
                <textarea name="content" id="content" class=" w-full rounded-xl px-4 py-2" rows="3" placeholder="Share something..."></textarea>
                <button type="submit" class="px-4 float-end py-2 mr-2 mb-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Post</button>
            </form>
        </div>
    </div>


    <div class="w-1/3 mt-10 overflow-y-auto h-[590px]">
        <div class="py-4 gap-2 bg-white border-b-2 border-r-2 border-gray-200 px-4 rounded-lg shadow-sm">
            @foreach($comments as $comment)
            <div class="flex  items-start mb-4">
                <img class="w-12 h-12 border-2 border-gray-300 rounded-full" alt="Avatar" src="{{ asset('storage/profile/' . $comment->user->profile->profile_image) }}">
                <div class="ml-4">
                    <div class="flex items-center">
                        <span class="font-bold">{{ $comment->user->name }}</span>
                        <span class="ml-2 text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-sm text-gray-600">{{ $comment->content }}</p>
                </div>
            </div>
            <div class="my-4 w-full border border-solid bg-neutral-200 border-neutral-200 min-h-[1px] max-md:max-w-full"></div>

            @endforeach
        </div>
    </div>

</div>
@endsection