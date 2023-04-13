import { createRouter, createWebHistory } from 'vue-router';
import ForgotPassword from './components/auth/forgot.vue';
const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: () => import('./components/auth/Login.vue')
        },
        {
            path: '/register',
            component: () => import('./components/auth/Register.vue')
        }
        ,
        {
            path: '/forgot',
            name: 'Forgot Password',
            component: ForgotPassword
        }
    ],
});

export default router;