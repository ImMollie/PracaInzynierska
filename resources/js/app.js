import $ from 'jquery';
window.$ = window.jQuery = $;
require('./bootstrap');
global.bootstrap = require('bootstrap');

import { createApp } from 'vue'
import chatForm from './components/Chats/ChatForm'

const app = createApp({});

// Echo.private('chat')
//     .listen('MessageSent', (e) => {
//         this.messages.push({
//             message: e.message.message,
//             user: e.user
//         });
//     });

app.component('chat-form', chatForm);
app.mount('#app')