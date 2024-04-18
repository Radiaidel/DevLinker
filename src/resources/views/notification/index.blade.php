@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-end items-center pt-6">

    @if($unreadNotifications->isNotEmpty())
    <div class="flex gap-5 justify-between px-5 mt-6 max-w-full text-xs text-center uppercase whitespace-nowrap text-neutral-900 w-[850px] max-md:flex-wrap max-md:mt-10">
        <div class="shrink-0 max-w-full border border-solid bg-neutral-200 border-neutral-200 h-[9px] w-[360px]"></div>
        <div class="italic">recent</div>
        <div class="shrink-0 max-w-full border border-solid bg-neutral-200 border-neutral-200 h-[9px] w-[360px]"></div>

    </div>
    @foreach($unreadNotifications as $notification)
    <div class="flex gap-5 justify-between items-center px-6 py-5 mt-4 max-w-full bg-white rounded shadow-lg leading-[150%] text-neutral-900 w-[850px] max-md:flex-wrap max-md:pl-5">
        <div class="flex gap-5 items-start self-start">
            <!-- asset('storage/profile/' . project->user->profile->profile_image)  -->
            <img src="{{ asset('storage/profile/unknown.png') }}" class="rounded-full shrink-0 self-stretch my-auto aspect-square w-[42px]" />

            <div class="flex flex-col grow shrink-0 basis-0 w-fit">
                <div class="text-sm">
                    @if(isset($notification->data['user_id']))
                    @php
                    $user = \App\Models\User::find($notification->data['user_id']);
                    $project = \App\Models\Project::find($notification->data['project_id']);
                    @endphp
                    @endif
                    {{ $user->name }}
                    @if($notification->data['type'] == 'like')
                    Liked your project
                    @elseif($notification->data['type'] == 'comment')
                    Commented on your project
                    @endif
                </div>
                <div class="mt-2.5 text-xs italic">Received {{ $notification->created_at->diffForHumans() }}</div>
            </div>
        </div>
        @if($project->media->isNotEmpty())
        @php
        $firstMedia = $project->media->first();
        @endphp
        @if($firstMedia->type === 'image')
        <img src="{{  asset('storage/images/'.$firstMedia->path )}}" alt="Image" class="aspect-square w-[50px]">
        @else
        <img src="{{ asset('storage/images/project_default.jpg') }}" alt="Image" class="aspect-square w-[50px]">

        @endif
        @else
        <img src="{{ asset('storage/images/project_default.jpg') }}" alt="Image" class="aspect-square w-[50px]">


        @endif
    </div>
    @endforeach
    @endif







    @if($readNotifications->isNotEmpty())
    <div class="flex gap-5 justify-between px-5 mt-7 max-w-full text-xs text-center uppercase whitespace-nowrap text-neutral-900 w-[850px] max-md:flex-wrap max-md:mt-10">
        <div class="shrink-0 max-w-full h-2 border border-solid bg-neutral-200 border-neutral-200 w-[360px]"></div>
        <div>Earlier</div>
        <div class="shrink-0 max-w-full h-2 border border-solid bg-neutral-200 border-neutral-200 w-[360px]"></div>
    </div>
    @foreach($readNotifications as $notification)
    <div class="flex gap-5 justify-between items-center px-6 py-5 mt-4 max-w-full bg-white rounded shadow-lg leading-[150%] text-neutral-900 w-[850px] max-md:flex-wrap max-md:pl-5">
        <div class="flex gap-5 items-start self-start">
            <!-- asset('storage/profile/' . project->user->profile->profile_image)  -->
            <img src="{{ asset('storage/profile/unknown.png') }}" class="rounded-full shrink-0 self-stretch my-auto aspect-square w-[42px]" />

            <div class="flex flex-col grow shrink-0 basis-0 w-fit">
                <div class="text-sm">
                    @if(isset($notification->data['user_id']))
                    @php
                    $user = \App\Models\User::find($notification->data['user_id']);
                    $project = \App\Models\Project::find($notification->data['project_id']);
                    @endphp
                    @endif
                    {{ $user->name }}
                    @if($notification->data['type'] == 'like')
                    Liked your project
                    @elseif($notification->data['type'] == 'comment')
                    Commented on your project
                    @endif
                </div>
                <div class="mt-2.5 text-xs italic">Received {{ $notification->created_at->diffForHumans() }}</div>
            </div>
        </div>
        @if($project->media->isNotEmpty())
        @php
        $firstMedia = $project->media->first();
        @endphp
        @if($firstMedia->type === 'image')
        <img src="{{  asset('storage/images/'.$firstMedia->path )}}" alt="Image" class="aspect-square w-[50px]">
        @else
        <img src="{{ asset('storage/images/project_default.jpg') }}" alt="Image" class="aspect-square w-[50px]">

        @endif
        @else
        <img src="{{ asset('storage/images/project_default.jpg') }}" alt="Image" class="aspect-square w-[50px]">


        @endif
    </div>
    @endforeach
    @endif

</div>
@endsection