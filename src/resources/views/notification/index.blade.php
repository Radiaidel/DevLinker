@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-end items-center pt-6 ">
    <!-- Boucle pour afficher chaque notification -->
    @foreach($notifications as $notification)
    <div class="flex gap-5 justify-between px-6 py-3.5 mt-10 max-w-full bg-white rounded shadow-lg leading-[150%] text-neutral-900 w-[850px] max-md:flex-wrap max-md:pl-5">
        <div class="flex gap-5 items-start self-start mt-4">
            <img src="{{ asset('storage/profile/unknown.png') }}" class="rounded-full shrink-0 self-stretch my-auto aspect-square w-[42px]" />

            <div class="flex flex-col grow shrink-0 basis-0 w-fit">
                <div class="text-sm">
                    @if($notification->user)
                        {{ $notification->user->name }} liked your post
                    @else
                        Unknown user liked your post
                    @endif
                </div>
                <div class="mt-2.5 text-xs italic">{{ $notification->created_at->diffForHumans() }}</div>
            </div>
        </div>
        <img src="{{ asset('storage/images/project_default.jpg') }}" alt="Image" class="aspect-square w-[50px]">
    </div>
@endforeach

</div>
@endsection
