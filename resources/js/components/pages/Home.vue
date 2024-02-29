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
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Sales Today</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ due }}</div>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ sales }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-cart fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New User Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Income</div>
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ income }}</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <!--                                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>-->
                                        <!--                                        <span>Since last month</span>-->
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Expenses</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ expenses }}</div>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Area Chart -->


            </div>
            <!--Row-->
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Out Of Stock Products</h6>
                        </div>

                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>

                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Buying Price</th>
                                    <th>Status</th>
                                    <th>Quantity</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="product in products" :key="product.id">
                                    <td>{{ product.product_name }}</td>
                                    <td>{{ product.product_code }}</td>
                                    <td>{{ product.category_name }}</td>
                                    <td><img :src="product.image"/></td>
                                    <td>{{ product.buying_price }}</td>

                                    <td v-if="product.product_quantity >= 1"><span
                                        class="badge badge-success">Available</span></td>
                                    <td v-else=""><span class="badge badge-danger">Out Of Stock</span></td>
                                    <td>{{ product.product_quantity }}</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!---Container Fluid-->
    </div>

</template>

<script>
import apiUrl from "@/Helpers/ApiUrl";

export default {
    name: "Home",
    created() {
        // Auth.checkIsAuthenticated();
        if (!User.loggedIn()) {
            this.$router.push({name: '/'});
        }
        this.stockoutProducts();
    },
    data() {
        return {
            due: '',
            income: '',
            sales: '',
            expenses: '',
            products: []
        };
    },
    mounted() {
        this.loadData();
    },
    methods: {
        loadData() {
            this.incomeToday();
            this.salesToday();
            this.dueToday();
            this.expensesToday();

        },
        incomeToday() {
            axios
                .get(ApiUrl.BASE_URL + "today/income")
                .then(({data}) => {
                    this.income = data;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },
        salesToday() {
            axios
                .get(ApiUrl.BASE_URL + "today/sales")
                .then(({data}) => {
                    this.sales = data;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },
        dueToday() {
            axios
                .get(ApiUrl.BASE_URL + "today/due")
                .then(({data}) => {
                    this.due = data;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },
        expensesToday() {
            axios
                .get(ApiUrl.BASE_URL + "today/expenses")
                .then(({data}) => {
                    this.expenses = data;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },
        stockout() {
            axios
                .get(ApiUrl.BASE_URL + "today/stockout")
                .then(({data}) => {
                    this.expenses = data;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },
        stockoutProducts() {
            axios
                .get(apiUrl.BASE_URL + 'stockout', this.form)
                .then(({data}) => (this.products = data))
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        }
    }
}
</script>

<style scoped>

</style>
