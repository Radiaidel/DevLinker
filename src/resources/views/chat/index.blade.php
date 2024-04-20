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
                <div class="flex cursor-pointer gap-4 pl-6 mt-5 conversation-item" data-conversation="{{ $conversation->toJson() }}">
                    <div class="flex overflow-hidden relative flex-col items-start aspect-square w-[52px] max-md:pl-5">
                        <img src="{{ $conversation->friend_id == auth()->id() ? asset('storage/profile/'.$conversation->user->profile->profile_image) : asset('storage/profile/'.$conversation->friend->profile->profile_image) }}" class="rounded-full object-cover absolute inset-0 size-full" />
                    </div>
                    <div class="flex flex-col my-auto">
                        <div class="text-sm text-neutral-900">
                            @if($conversation->user_id == auth()->user()->id)
                            {{ $conversation->friend->name }}
                            @else
                            {{ $conversation->user->name }}
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
    <div class="flex flex-col ml-5 w-2/3 max-md:ml-0 max-md:w-full bg-white rounded-3xl">
        <div id="message-container">

            Aucun message
        </div>
        <div class="flex items-center mt-4">
            <input type="text" name="content" id="new-message" class="rounded-full flex-grow border border-gray-300 py-2 px-4 focus:outline-none focus:border-blue-500" placeholder="Saisissez votre message...">
            <button id="send-message" class="rounded-3xl ml-2 px-4 py-2 bg-blue-500 text-white focus:outline-none">Envoyer</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const conversationItems = document.querySelectorAll('.conversation-item');
        const sendMessageButton = document.getElementById('send-message');
        const newMessageInput = document.getElementById('new-message');



        conversationItems.forEach(item => {
            item.addEventListener('click', function() {
                conversationItems.forEach(element => {
                    element.classList.remove('active');
                });

                this.classList.add('active');
                const conversationData = JSON.parse(this.getAttribute('data-conversation'));
                conversationId = conversationData.id;
                const messages = conversationData.messages;

                const messageContainer = document.getElementById('message-container');
                messageContainer.innerHTML = ''; // Effacez le contenu précédent
                messages.forEach(message => {
                    messageContainer.innerHTML += `<div>${message.content}</div>`;
                });
            });
        });

        sendMessageButton.addEventListener('click', function() {
            const messageContent = newMessageInput.value.trim();
            if (messageContent !== '') {
                const activeConversation = document.querySelector('.conversation-item.active');
              

                const formData = new FormData();
                formData.append('conversation_id', conversationId);
                formData.append('content', messageContent);

                fetch("{{ route('messages.store') }}", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log("message envoyée");
                        } else {
                            // Échec
                            console.error('Échec de l\'envoi du message');
                        }
                    })
                    .catch(error => {
                        console.error('Erreur lors de l\'envoi du message :', error);
                    });
            }
        });
    });







    

</script>

@endsection