import {createRouter, createWebHistory} from 'vue-router';
import ForgotPassword from './components/auth/forgot.vue';
import Home from './components/pages/Home.vue'
import Logout from './components/auth/Logout.vue'
import StoreEmployee from './components/pages/employee/create.vue'
import AllEmployee from './components/pages/employee/index.vue'
import EditEmployee from './components/pages/employee/edit.vue'

import StoreCategory from './components/pages/categories/create.vue'
import AllCategory from './components/pages/categories/index.vue'
import EditCategory from './components/pages/categories/edit.vue'

import StoreSupplier from './components/pages/supplier/create.vue'
import AllSupplier from './components/pages/supplier/index.vue'
import EditSupplier from './components/pages/supplier/edit.vue'

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
        },
        //employee,
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
        {path: '/store-employee', name: 'store-employee', component: StoreEmployee}
        //category
        ,
        {
            path: '/categories',
            name: 'categories',
            component: AllCategory
        },
        {
            path: '/categories/edit/:id',
            name: 'edit-category',
            component: EditCategory
        },
        {
            path: '/store-category',
            name: 'store-category',
            component: StoreCategory
        },
        //employee,
        {
            path: '/suppliers',
            name: 'suppliers',
            component: AllSupplier
        },
        {
            path: '/supplier/edit/:id',
            name: 'edit-supplier',
            component: EditSupplier
        },
        {
            path: '/store-supplier',
            name: 'store-supplier',
            component: StoreSupplier
        }
    ],
});

export default router;