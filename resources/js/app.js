// require('./bootstrap');
import './bootstrap';
import {createApp} from "vue/dist/vue.esm-bundler";
import router from './routes';
import Notification from './Helpers/Notification'
// import { createApp } from 'vue'
import App from './App.vue'
import Swal from 'sweetalert2';
import User from './Helpers/User'
import AuthService from './Helpers/AuthService'
import ApiUrl from './Helpers/ApiUrl'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
//make it global
window.Toast = Toast;
//make notification global
window.Notification = Notification;


//import user

window.ApiUrl= ApiUrl;
const app = createApp({
    // components:{
    //     AppComponent
    // }
});
//make user global
window.User = User;
window.Auth = AuthService;

app.use(router);
//
// import ExampleComponent from './components/ExampleComponent.vue';
app.component('app-component', App);
app.mount('#app')
// createApp(App).mount("#app")
