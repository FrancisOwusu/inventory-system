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
                            <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
                        </div>
                        <input style="width: 300px;" v-model="searchTerm" class="form-control"
                               placeholder="Search here"/>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                <tr>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                    <!--<th>salary</th>-->
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="expense in filterSearch" :key="expense.id">
                                    <td>{{expense.details}}</td>
                                    <td>{{expense.amount}}</td>
                                    <td>{{expense.expense_date}}</td>
                                    <td>
                                        <router-link :to="{name:'view-order', params:{id:order.id}}" class="btn btn-sm btn-primary">View</router-link>

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
        // AuthService.checkIsAuthenticated
        this.allExpenses();
    },
    data() {
        return {
            expenses: [],
            searchTerm: ''
        };
    },
    computed: {
        filterSearch() {
            return this.expenses.filter(expense => {
                return expense.details.match(this.searchTerm);
            })
        }

    },
    methods: {
        allExpenses() {
            axios
                .get("/api/expenses")
                .then(({data}) => (
                    this.expenses = data))
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },

    }

}
</script>

<style scoped>

</style>
