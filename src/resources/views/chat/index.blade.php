@extends('layouts.app')

@section('content')

<div class="px-12 py-4 justify-center flex gap-5 max-md:flex-col max-md:gap-0 h-[610px]">
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
                <div class="shrink-0 mt-5 h-1 border border-solid bg-zinc-100 border-zinc-100"></div>
                @foreach($conversations as $conversation)
                <div id="conversation-{{$conversation->id}}" class="flex justify-between items-center cursor-pointer py-2 mt-1 gap-2 px-6  conversation-item {{ ($conversation->unread_count > 0) ? 'border-l-4 border-sky-800' : '' }}" data-conversation="{{ $conversation->toJson() }}">
                    <div class="flex items-center gap-2">
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
                                <div class="flex-auto" id="last-message-{{$conversation->id}}"  >
                                    {{ $conversation->messages->last()->content }}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div id="unread-count-{{$conversation->id}}" class="flex items-center justify-center w-6 h-6 rounded-full bg-sky-800 text-white text-xs  {{ ($conversation->unread_count > 0) ? '' : 'hidden' }}  ">
                        {{ $conversation->unread_count }}
                    </div>

                </div>
                <div class="shrink-0 mt-1 h-px border border-solid bg-zinc-100 border-zinc-100"></div>
                @endforeach
            </div>
        </div>
    </div>
    <div class=" flex flex-col ml-5 w-2/3 max-md:ml-0 max-md:w-full bg-white rounded-3xl ">
        <div id="message-container" class=" relative h-[580px] overflow-y-auto">

        <p class="text-gray-400 italic m-auto text-center h-full my-auto">Aucun message</p>
        </div>

        <div id="sendMessage" class=" hidden flex items-center mt-4">
            <div class="shrink-0 mt-7 h-px border border-solid bg-zinc-100 border-zinc-100 max-md:max-w-full"></div>

            <input type="text" name="content" id="new-message" class="rounded-full flex-grow border border-gray-300 py-2 px-4 focus:outline-none focus:border-blue-500" placeholder="Saisissez votre message...">
            <button id="send-message" class="px-4 py-2 bg-sky-800 text-white rounded-lg">send</button>
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

                read_messages(conversationId);

                const unreadCountElement = document.getElementById(`unread-count-${conversationId}`);


                unreadCountElement.classList.add('hidden');
                item.classList.remove('border-l-4', 'border-sky-800');


                const messages = conversationData.messages;

                const messageContainer = document.getElementById('message-container');
                messageContainer.innerHTML = ''; // Effacez le contenu précédent

                const otherUser = conversationData.user_id === window.User.id ? conversationData.friend : conversationData.user;

                const userInfoContainer = document.createElement('div');
                userInfoContainer.classList.add('shadow-md', 'sticky', 'top-0', 'bg-white', 'flex', 'flex-col', 'px-5', 'py-3', 'max-md:px-5', 'max-md:max-w-full');
                userInfoContainer.innerHTML = `
                        <div class="flex gap-3 self-start">
                            <img src="{{ asset('storage/profile/unknown.png') }}" class="shrink-0 aspect-square w-[52px] rounded-full" />
                            <div class="flex flex-col my-auto">
                                <div class="text-sm">${otherUser.name}</div>
                                <div class="mt-2 text-xs uppercase">last online: ${otherUser.last_online}</div>
                            </div>
                        </div>
                    `;
                messageContainer.appendChild(userInfoContainer);

                // Afficher les cinq derniers messages
                let start = Math.max(messages.length - 7, 0); // Index de départ pour afficher les messages
                let end = messages.length; // Index de fin pour afficher les messages
                displayMessages(messages.slice(start, end), messageContainer);

                messageContainer.scrollTop = messageContainer.scrollHeight;

                messageContainer.addEventListener('scroll', function() {

                    if (messageContainer.scrollTop === 0) {
                        // Charger et afficher les cinq messages précédents lorsque l'utilisateur fait défiler vers le haut
                        const nextStart = Math.max(start - 2, 0); // Nouvel index de départ pour afficher les messages
                        const nextEnd = start; // Nouvel index de fin pour afficher les messages
                        const previousMessages = messages.slice(nextStart, nextEnd);
                        displayMessages(previousMessages, messageContainer, true);
                        // Mettre à jour les indices de début et de fin pour la prochaine itération
                        start = nextStart;

                    }

                });


                document.getElementById('sendMessage').classList.remove('hidden');
            });
        });

        function read_messages(conv_id) {
            fetch('/ReadMessages', {
                    method: 'POST',
                    body: JSON.stringify({
                        conversation_id: conv_id
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then()

                .catch(error => {
                    console.error('Error:', error);
                });
        }
        // Fonction pour afficher les messages dans le conteneur spécifié
        function displayMessages(messages, container, prepend = false) {
            messages.forEach(message => {
                const isCurrentUserSender = (message.sender_id == window.User.id);
                const msgSide = isCurrentUserSender ? 'justify-end' : 'justify-start';
                const backgroundColorClass = isCurrentUserSender ? 'bg-sky-50' : 'bg-sky-800';
                const textColorClass = isCurrentUserSender ? '' : 'text-white';
                const messageTime = new Date(message.created_at);
                const formattedTime = messageTime.toLocaleTimeString([], {
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                });

                const messageElement = document.createElement('div');
                messageElement.classList.add('flex', 'px-12', 'gap-4', 'block', 'mt-1', msgSide);

                messageElement.innerHTML = `
            <div class="flex flex-col grow shrink-0 basis-0 max-w-[60%]">
                <div class="justify-center px-5 py-4 text-sm ${backgroundColorClass} ${textColorClass} rounded-3xl">
                    ${message.content}
                </div>
                <div class="${isCurrentUserSender ?'justify-end' : 'justify-start'} mt-2.5 text-xs text-right">${formattedTime}</div>
            </div>
        `;


                prepend ? insertAfter(messageElement, container.firstChild) : container.appendChild(messageElement);

            });


            function insertAfter(newNode, referenceNode) {
                referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
            }
        }






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