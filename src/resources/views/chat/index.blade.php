@extends('layouts.app')

@section('content')

<div class="px-12 py-4 justify-center flex gap-5 max-md:flex-col max-md:gap-0">
    <div class="flex flex-col w-1/4 max-md:ml-0 max-md:w-full">
        <div class="flex flex-col mt-2.5 max-md:mt-10">
            <div class="flex flex-col justify-center px-8 py-6 text-xs text-center text-white uppercase bg-white rounded max-md:px-5">
                <div class="justify-center items-center px-16 py-3  bg-sky-800 rounded max-md:px-5">
                    Start new chat
                </div>
            </div>
            <div class="flex flex-col py-6 mt-6 w-full bg-white rounded">
                <div class="self-start ml-8 text-xs  uppercase text-neutral-900 max-md:ml-2.5">
                    Chats
                </div>
                <div class="shrink-0 mt-5 h-px border border-solid bg-zinc-100 border-zinc-100"></div>
                @foreach($conversations as $conversation)
                <div class="flex cursor-pointer gap-4 pl-6 mt-5 conversation-item" data-conversation-id="{{ $conversation->id }}">
                    <div class="flex overflow-hidden relative flex-col items-start aspect-square w-[52px] max-md:pl-5">
                        <img src="{{ $conversation->friend_id == auth()->id() ? asset('storage/profile/'.$conversation->user->profile->profile_image) : asset('storage/profile/'.$conversation->friend->profile->profile_image) }}" class="rounded-full object-cover absolute inset-0 size-full" />
                    </div>
                    <div class="flex flex-col my-auto">
                        <div class="text-sm text-neutral-900">
                            @if($conversation->friend_id == auth()->id())
                            {{ $conversation->user->name }}
                            @else
                            {{ $conversation->friend->name }}
                            @endif
                        </div>
                        @if($conversation->messages->last())
                        <div class="flex gap-1 mt-2 justify-center text-xs leading-4 text-neutral-900 text-opacity-50">
                            <span class="shrink-0 self-start bg-sky-600 rounded-full aspect-square w-[9px]"></span>
                            <div class="flex-auto">
                                {{ $conversation->messages->last()->content }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach

                <div class="shrink-0 mt-3.5 h-px border border-solid bg-zinc-100 border-zinc-100"></div>

            </div>
        </div>
    </div>
    <div class="flex flex-col ml-5 w-2/3 max-md:ml-0 max-md:w-full bg-white rounded-3xl" id="message-container">
        aucun message
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var conversationItems = document.querySelectorAll(".conversation-item");

        conversationItems.forEach(function(item) {
            item.addEventListener("click", function() {
                var conversationId = this.getAttribute("data-conversation-id");

                fetch('/messages/' + conversationId)
                    .then(response => response.text())
                    .then(data => {
                        var messageContainer = document.getElementById("message-container");

                        messageContainer.innerHTML = data;
                    })
                    .catch(error => console.error('Erreur lors de la récupération de la vue message:', error));
            });
        });

    });
</script>


@endsection