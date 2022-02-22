import { createApp } from 'vue'
import HelloWorld from './components/App.vue';

const app = createApp({});
app.component('hello-world', HelloWorld)
    .mount('#app');


require('./bootstrap');
// window.Vue = require('vue');

