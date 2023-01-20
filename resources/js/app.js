import './bootstrap';
import Alpine from 'alpinejs'
import Echo from "laravel-echo"
import Pusher from 'pusher-js';

window.Alpine = Alpine
Alpine.start()

window.Pusher = Pusher;

let echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],
});

echo.private('message-sent-private')
    .listen('UserSendsMessage', (e) => {
        let messageCountElement = document.getElementById('sidebarMessageCount');
        let currentCount = parseInt(messageCountElement.innerHTML);
        messageCountElement.innerHTML = (currentCount += 1).toString();

    })
