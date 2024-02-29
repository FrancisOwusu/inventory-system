<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Search Form</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="searchDate">
                            <div class="form-group">
                                <label>Name</label>
                                <input
                                    type="date"
                                    v-model="date"
                                    class="form-control"
                                    id="exampleInputFirstName"

                                />
                                <span class="text-danger" v-if="errors.date">{{ errors.date[0] }}</span>

                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>

                <!-- Form Sizing -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                        </div>
                        <!--                    <input style="width: 300px;" v-model="searchTerm" class="form-control"-->
                        <!--                           placeholder="Search here"/>-->
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

                                <tr v-for="order in orders" :key="order.id">
                                    <td>{{ order.name }}</td>
                                    <td>{{ order.total}}</td>
                                    <td>{{ order.pay}}</td>
                                    <td>{{ order.due}}</td>
                                    <td>{{ order.order_date }}</td>
                                    <td>{{ order.pay_by }}</td>
<!--                                    <td>-->
<!--                                        <router-link :to="{name:'view-order', params:{id:order.id}}"-->
<!--                                                     class="btn btn-sm btn-primary">View-->
<!--                                        </router-link>-->
<!--                                        &lt;!&ndash;                                        <button @click="deleteCategory(expense.id)" class="btn btn-sm btn-danger">&ndash;&gt;-->
<!--                                        &lt;!&ndash;                                            Delete&ndash;&gt;-->
<!--                                        &lt;!&ndash;                                        </button>&ndash;&gt;-->
<!--                                    </td>-->
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!--Row-->


    </div>
</template>

<script>
export default {
    name: "create",
    created() {
        if (!User.loggedIn()) {
            this.$router.push({name: '/'});
        }
    },
    data() {
        return {
                date: '',

            orders: [],
            errors: {}
        };
    },

    methods: {
        searchDate() {
            let data = {date:this.date}
            axios
                .post("/api/orders/search", data)
                .then(({data}) => {
                    this.orders = data;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },
    },
}
</script>

<style scoped>

</style>
