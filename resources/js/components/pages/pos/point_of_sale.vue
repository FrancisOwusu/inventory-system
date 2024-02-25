<template>
    <div>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>

            <div class="row mb-3">

                <!-- Area Chart -->
                <div class="col-xl-6 col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                     aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="cart in carts" :key="cart.id">
                                        <td><a href="#">{{ cart.product_name }}</a></td>
                                        <td><input type="text" readonly :value="cart.quantity">
                                            <button @click.prevent="increment(cart.id)" class="btn-sm btn-success">+
                                            </button>
                                            <button @click.prevent="decrement(cart.id)" v-if="cart.quantity >= 2"
                                                    class="btn-sm btn-danger">-
                                            </button>
                                            <button v-else disabled class="btn-sm btn-danger">-</button>
                                        </td>
                                        <td>{{ cart.price }}</td>
                                        <td>{{ cart.sub_total }}</td>
                                        <td><a href="#" @click="removeToCart(cart.id)"
                                               class="btn btn-sm btn-danger">X</a></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>


                        </div>
                        <div class="card-footer">
                            <ul class="list-group">
                                <li class="list-group-item  d-flex justify-content-between align-items-center">
                                    Total Quantity:<strong>{{ totalQuantity() }}</strong>
                                </li>
                                <li class="list-group-item  d-flex justify-content-between align-items-center">
                                    Sub Total:<strong>{{ subTotal() }}</strong>
                                </li>
                                <li class="list-group-item  d-flex justify-content-between align-items-center">
                                    Vat :<strong>{{ vats.vat }}%</strong>
                                </li>
                                <li class="list-group-item  d-flex justify-content-between align-items-center">
                                    Total :<strong>{{ totalAmount() }}</strong>
                                </li>
                            </ul>
                            <br>
                            <form @submit.prevent="postOrder()">
                                <label>Customer Name</label>
                                <select class="form-control" v-for="customer in customers" v-model="customer_id">
                                    <option :value="customer.id">{{ customer.name }}</option>

                                </select>
                                <label>Pay</label>
                                <input type="text" class="form-control" v-model="pay" required="">
                                <label>Due</label>
                                <input type="text" class="form-control" v-model="due" required="">

                                <label>Paid By</label>
                                <select class="form-control" v-model="pay_by">
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="gift">Gift</option>
                                </select>
                                <br>
                                <button type="submit" class="btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Pie Chart -->
                <div class="col-xl-6 col-lg-5">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home"
                                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Products
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile"
                                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false"
                                    v-for="category in categories" :key="category.id"
                                    @click="getAllProductsByCategory(category.id)">{{ category.name }}
                            </button>
                            <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact"
                                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <!-- -->
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>

                                </div>

                                <div class="card-body">
                                    <input style="width: 550px;" v-model="searchTerm" class="form-control"
                                           placeholder="Search here"/>

                                    <br>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="product in filterSearch"
                                             :key="product.id">

                                            <button class="btn-sm" @click.prevent="addToCart(product.id)">
                                                <div class="card" style="width:8.5rem;margin-bottom: 5px;">
                                                    <img class="card-img-top" id="img_photo" :src="product.image"
                                                         alt="Card image">
                                                    <div class="card-body">

                                                        <h6 class="card-title">{{ product.product_name }}</h6>

                                                        <span v-if="product.product_quantity >= 1"
                                                              class="badge badge-success">Available {{
                                                                product.product_quantity
                                                            }}</span>
                                                        <span v-else="" class="badge badge-danger">Out Of Stock</span>
                                                    </div>

                                                </div>
                                            </button>
                                        </div>

                                    </div>


                                </div>

                            </div>
                            <!-- -->
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>

                                </div>

                                <div class="card-body">
                                    <input style="width: 550px;" v-model="getSearchTerm" class="form-control"
                                           placeholder="Search here"/>

                                    <br>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-6"
                                             v-for="subproduct in getFilterSearch" :key="subproduct.id">

                                            <button class="btn-sm" @click.prevent="addToCart(subproduct.id)">
                                                <div class="card" style="width:8.5rem;margin-bottom: 5px;">
                                                    <img class="card-img-top" id="img_photo" :src="subproduct.image"
                                                         alt="Card image">
                                                    <div class="card-body">
                                                        <h6 class="card-title">{{ subproduct.product_name }}</h6>
                                                        <span v-if="subproduct.product_quantity >= 1"
                                                              class="badge badge-success">Available {{
                                                                subproduct.product_quantity
                                                            }}</span>
                                                        <span v-else="" class="badge badge-danger">Out Of Stock</span>
                                                    </div>

                                                </div>
                                            </button>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            ...
                        </div>
                    </div>

                </div>

            </div>
            <!--Row-->

        </div>
        <!---Container Fluid-->
    </div>

</template>

<script>
import apiUrl from "@/Helpers/ApiUrl";
import Notification from "@/Helpers/Notification";
import Index from "@/components/pages/product/index.vue";

export default {
    name: "Home",
    components: {Index},


    created() {
        if (!User.loggedIn()) {
            this.$router.push({name: '/'});
        }
        this.loadData();
    },
    data() {
        return {
            pay_by: '',
            due: '',
            customer_id: '',
            pay: '',
            products: [],
            categories: [],
            customers: [],
            getProductsByCategory: [],
            searchTerm: '',
            getSearchTerm: '',
            carts: [],
            vats: [],
            errors: ''
        };
    },
    computed: {
        filterSearch() {
            return this.products.filter(product => product.product_name.match(this.searchTerm));
        },
        getFilterSearch() {
            return this.getProductsByCategory.filter(subproduct => subproduct.product_name.match(this.getSearchTerm));
        }
    },
    methods: {
        loadData() {
            this.allProducts();
            this.allCategories();
            this.getAllProductsByCategory();
            this.allCustomers();
            this.cartProducts();
            this.getVat();
        },
        allCategories() {
            axios
                .get("/api/categories")
                .then(({data}) => (
                    this.categories = data))
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },
        addToCart(id) {
            this.updateCart("/api/carts/" + id);
        },
        removeToCart(id) {
            this.updateCart("/api/carts/remove/" + id);
        },
        increment(id) {
            this.updateCart("/api/carts/increment/" + id);
        },
        decrement(id) {
            this.updateCart("/api/carts/decrement/" + id);
        },
        updateCart(url) {
            axios
                .get(url)
                .then(() => {
                    Notification.glob_success("Product");
                    this.reloadPage();
                })
                .catch(error => {
                    // Handle error
                });
        },
        allCustomers() {
            this.fetchData(ApiUrl.CUSTOMERS, data => (this.customers = data));
        },
        cartProducts() {
            this.fetchData('api/cart/products', data => (this.carts = data));
        },
        allProducts() {
            this.fetchData(apiUrl.PRODUCTS, data => (this.products = data));
        },
        getVat() {
            this.fetchData(ApiUrl.BASE_URL + 'vats', data => (this.vats = data));
        },
        fetchData(url, successCallback) {
            axios
                .get(url, this.form)
                .then(({data}) => successCallback(data))
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
        getAllProductsByCategory(id) {
            axios
                .get("/api/sub/products/" + id)
                .then(({data}) => (
                    this.getProductsByCategory = data)
                )
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },

        totalQuantity() {
            return this.carts.reduce((sum, item) => sum + parseFloat(item.quantity), 0);
        },
        totalAmount() {
            return this.subTotal() + this.subTotal() * parseFloat(this.vats.vat) / 100;
        },
        subTotal() {
            return this.carts.reduce((sum, item) => sum + parseFloat(item.quantity) * parseFloat(item.price), 0);
        },
        postOrder() {
            const total = this.totalAmount();
            const data = {
                quantity: this.totalQuantity(),
                subtotal: this.subTotal(),
                customer_id: this.customer_id,
                pay_by: this.pay_by,
                due: this.due,
                vat: this.vats.vat,
                total: total
            };
            axios
                .post(ApiUrl.BASE_URL + 'orders', data)
                .then(() => {
                    // Handle success
                    this.$router.push({name: 'home'});
                })
                .catch(error => {
                    this.errors = error.response.data;
                });

        }
    }
}


</script>

<style scoped>
#img_photo {
    height: 100px;
    width: 135px;
}
</style>
