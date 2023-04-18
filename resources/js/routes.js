import {createRouter, createWebHistory} from 'vue-router';
import ForgotPassword from './components/auth/forgot.vue';
import Home from './components/pages/Home.vue'
import Logout from './components/auth/Logout.vue'
import StoreEmployee from './components/pages/employee/create.vue'
import AllEmployee from './components/pages/employee/index.vue'
import EditEmployee from './components/pages/employee/edit.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: '/',
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
        },
        {
            path: '/home',
            name: 'Home',
            component: Home
        },
        {
            path: '/logout',
            name: 'Logout',
            component: Logout
        }
        //employee
        ,
        {
            path: '/employees',
            name: 'employees',
            component: AllEmployee
        },
        {
            path: '/employees/edit/:id',
            name: 'edit-employee',
            component: EditEmployee
        },
        {
            path: '/store-employee',
            name: 'store-employee',
            component: StoreEmployee
        }
    ],
});

export default router;