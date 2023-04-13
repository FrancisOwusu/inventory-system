// require('./bootstrap');
import './bootstrap';
import { createApp } from "vue/dist/vue.esm-bundler";
import router from './routes';
// import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router';

import App from './App.vue'
const app = createApp({
    // components:{
    //     AppComponent
    // }
});

app.use(router);
//
// import ExampleComponent from './components/ExampleComponent.vue';
app.component('app-component', App);
app.mount('#app')
// createApp(App).mount("#app")