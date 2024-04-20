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



// Fonction pour mettre à jour la visibilité de l'élément <span>
function updateNotifCountVisibility() {
    const notifCountSpan = document.getElementById('notif_count');
    if (notifCountSpan && notifCountSpan.innerText == 0) {
        notifCountSpan.classList.add('hidden');
    } else {
        notifCountSpan.classList.remove('hidden');
    }
}

// Écouter les événements de notification et mettre à jour le compteur en conséquence
window.Echo.private('notifications.' + User.id).listen('.notification.deleted', (data) => {
    const notifCountElement = document.getElementById('notif_count');
    if (notifCountElement) {
        let notifCount = parseInt(notifCountElement.innerText);
        if (!isNaN(notifCount) && notifCount >= 1) {
            notifCountElement.innerText = notifCount - 1;
            updateNotifCountVisibility(); // Mettre à jour la visibilité après la modification du compteur
        }
    }
});

window.Echo.private('App.Models.User.' + User.id).notification((notification) => {
    const notifCountElement = document.getElementById('notif_count');
    if (notifCountElement) {
        notifCountElement.innerText = parseInt(notifCountElement.innerText) + 1;
        updateNotifCountVisibility(); // Mettre à jour la visibilité après l'ajout d'une nouvelle notification
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
                    if (chatCountSpan && message.sender_id != User.id) {
                        chatCountSpan.innerHTML = parseInt(chatCountSpan.innerHTML) + 1;
                        updateChatCountVisibility(); // Mettre à jour la visibilité après l'ajout d'un nouveau message
                    }
                });
        });
    })
    .catch(error => console.error('Erreur lors de la récupération des conversations:', error));
    updateChatCountVisibility();