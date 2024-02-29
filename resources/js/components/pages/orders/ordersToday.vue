<template>
    <div>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Orders</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active" aria-current="page">DataTables</li>
                </ol>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Orders Today</h6>
                        </div>
                        <input style="width: 300px;" v-model="searchTerm" class="form-control"
                               placeholder="Search here"/>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Total Amount</th>
                                    <th>Pay</th>
                                    <th>Due</th>
                                    <th>Date</th>
                                    <th>Paid By</th>
                                    <th>Action</th>
                                    <!--<th>salary</th>-->
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="order in filterSearch" :key="order.id">
                                    <td>{{ order.name }}</td>
                                    <td>{{ order.total}}</td>
                                    <td>{{ order.pay}}</td>
                                    <td>{{ order.due}}</td>
                                    <td>{{ order.order_date }}</td>
                                    <td>{{ order.pay_by }}</td>
                                    <td>
                                        <router-link :to="{name:'view-order', params:{id:order.id}}"
                                                     class="btn btn-sm btn-primary">View
                                        </router-link>
<!--                                        <button @click="deleteCategory(expense.id)" class="btn btn-sm btn-danger">-->
<!--                                            Delete-->
<!--                                        </button>-->
                                    </td>
                                    <!--<td>2011/01/25</td>-->
                                    <!--<td>$1</td>-->
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "index",
    created() {
        Auth.checkIsAuthenticated();
        this.allOrders()
    },
    data() {
        return {
            orders: [],
            searchTerm: ''
        };
    },
    computed: {
        filterSearch() {
            return this.orders.filter(order => {
                return order.name.match(this.searchTerm);
            })
        }

    },
    methods: {
        allOrders() {
            axios
                .get("/api/orders/today")
                .then(({data}) => (
                    this.orders = data))
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },

    }

}
</script>

<style scoped>

</style>
