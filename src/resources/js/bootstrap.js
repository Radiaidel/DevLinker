/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});



function updateNotifCountVisibility() {
    const notifCountSpan = document.getElementById('notif_count');
    if (notifCountSpan && notifCountSpan.innerText == 0) {
        notifCountSpan.classList.add('hidden');
    } else {
        notifCountSpan.classList.remove('hidden');
    }
}

window.Echo.private('notifications.' + User.id).listen('.notification.deleted', (data) => {
    const notifCountElement = document.getElementById('notif_count');
    if (notifCountElement) {
        let notifCount = parseInt(notifCountElement.innerText);
        if (!isNaN(notifCount) && notifCount >= 1) {
            notifCountElement.innerText = notifCount - 1;
            updateNotifCountVisibility(); 
        }
    }
});

window.Echo.private('App.Models.User.' + User.id).notification((notification) => {
    const notifCountElement = document.getElementById('notif_count');
    if (notifCountElement) {
        notifCountElement.innerText = parseInt(notifCountElement.innerText) + 1;
        updateNotifCountVisibility(); 
    }
});

// Appeler la fonction pour mettre à jour la visibilité initiale
updateNotifCountVisibility();








function updateChatCountVisibility() {
    const chatCountSpan = document.getElementById('chat_count');
    if (chatCountSpan) {
        const chatCount = parseInt(chatCountSpan.innerHTML);
        if (chatCount === 0) {
            chatCountSpan.classList.add('hidden');
        } else {
            chatCountSpan.classList.remove('hidden');
        }
    }
}





let conversations = [];

fetch('/user/conversations')
    .then(response => response.json())
    .then(data => {
        conversations = data;
        conversations.forEach(conversation => {
            const conversationId = conversation.id;
            window.Echo.private('conversation.' + conversationId)
                .listen('.MessageSent', (e) => {
                    const chatCountSpan = document.getElementById('chat_count');
                    if (chatCountSpan && e.message.sender_id != User.id) {
                        chatCountSpan.innerHTML = parseInt(chatCountSpan.innerHTML) + 1;
                        updateChatCountVisibility();
                    }




                    if (window.location.href.includes('chat') && document.getElementById(`message-container-${conversationId}`)) {
                        if (e.message.sender_id != User.id) {
                            const unreadCountElement = document.getElementById(`unread-count-${conversationId}`);
                            const conversationElement = document.getElementById(`conversation-${conversationId}`);
                            const lastmessage = document.getElementById(`last-message-${conversationId}`);

                            lastmessage.innerText = e.message.content;
                            unreadCountElement.innerText = parseInt(unreadCountElement.innerText) + 1;
                            unreadCountElement.classList.remove('hidden');
                            conversationElement.classList.add('border-l-4', 'border-sky-800');

                            // const parentElement = conversationElement.parentElement;

                            // console.log(parentElement);
                            // const thirdChild = parentElement.children[2];
                            // parentElement.insertBefore(conversationElement, thirdChild.nextSibling);
                        }

                        const messageContainer = document.getElementById(`message-container-${conversationId}`);
                        const isCurrentUserSender = (e.message.sender_id == window.User.id);
                        const msgSide = isCurrentUserSender ? 'justify-end' : 'justify-start';
                        const backgroundColorClass = isCurrentUserSender ? 'bg-sky-50' : 'bg-sky-800';
                        const textColorClass = isCurrentUserSender ? '' : 'text-white';
                        const messageTime = new Date(e.message.created_at);
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
                                    ${e.message.content}
                                </div>
                                <div class="${isCurrentUserSender ? 'justify-end' : 'justify-start'} mt-2.5 text-xs text-right">${formattedTime}</div>
                            </div>
                        `;

                        messageContainer.appendChild(messageElement);
                        document.getElementById('new-message').value = '';

                    }





                });
        });
    })
    .catch(error => console.error('Erreur lors de la récupération des conversations:', error));
updateChatCountVisibility();






window.Echo.private(`admin-reports.${User.id}`)
    .listen('.report.created', (data) => {
        console.log('New report received:', data);
        // Vérifiez si l'événement est lié au projet que vous affichez actuellement
        const reportCountElement = document.getElementById('report_count');
        if (reportCountElement) {
            reportCountElement.innerText = parseInt(reportCountElement.innerText) + 1;
            
            setInterval(window.location.reload(true) , 300000); 
        }
    });


