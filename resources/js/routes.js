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
import AllSuppliers from './components/pages/supplier/index.vue'
import EditSupplier from './components/pages/supplier/edit.vue'

import StoreProduct from './components/pages/product/create.vue'
import AllProducts from './components/pages/product/index.vue'
import EditProduct from './components/pages/product/edit.vue'


import StoreExpenses from './components/pages/expenses/create.vue'
import AllExpenses from './components/pages/expenses/index.vue'
import EditExpenses from './components/pages/expenses/edit.vue'


import StoreCustomer from './components/pages/customer/create.vue'
import AllCustomers from './components/pages/customer/index.vue'
import EditCustomer from './components/pages/customer/edit.vue'


import NotFound from './components/error/NotFound.vue'

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
        },
        {
            path: '/pro',
            component: () => import('./components/pages/Home.vue')
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
        {
            path: '/store-employee',
            name: 'store-employee',
            component: StoreEmployee
        }
        //category
        ,
        {
            path: '/categories',
            name: 'categories',
            // component:()=>import('./components/pages/product/sample.vue')
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
            component: AllSuppliers
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
        },
        //products,
        {
            path: '/products',
            name: 'products',
            component: AllProducts
        },
        {
            path: '/products/edit/:id',
            name: 'edit-product',
            component: EditProduct
        },
        {
            path: '/store-product',
            name: 'store-product',
            component: StoreProduct
        },

        //expenses
        {
            path: '/expenses',
            name: 'expenses',
            component: AllExpenses
        },
        {
            path: '/expenses/edit/:id',
            name: 'edit-expenses',
            component: EditExpenses
        },
        {
            path: '/store-expenses',
            name: 'store-expenses',
            component: StoreExpenses
        },
        //customers
        {
            path: '/customers',
            name: 'customers',
            component: AllCustomers
        },
        {
            path: '/customers/edit/:id',
            name: 'edit-customer',
            component: EditCustomer
        },
        {
            path: '/store-customer',
            name: 'store-customer',
            component: StoreCustomer
        },
        {
            path: '/:catchAll(.*)',
            name: 'NotFound',
            component: NotFound
        }
    ],
});

export default router;
