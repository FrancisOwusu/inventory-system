<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update Form</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item"><b>Customer Name:</b>{{ orders.name }}</li>
                                    <li class="list-group-item"><b>Phone:</b>{{ orders.phone }}</li>
                                    <li class="list-group-item"><b>Address:</b>{{ orders.address }}</li>
                                    <li class="list-group-item"><b>Date:</b>{{ orders.order_date }}</li>
                                    <li class="list-group-item"><b>Pay Through:</b>{{ orders.pay_by }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item"><b>Sub Total:</b>{{ orders.sub_total }}</li>
                                    <li class="list-group-item"><b>Vat:</b>{{ orders.vat }}</li>
                                    <li class="list-group-item"><b>Total:</b>{{ orders.total }}</li>
                                    <li class="list-group-item"><b>Pay Amount:</b>{{ orders.pay }}</li>
                                    <li class="list-group-item"><b>Due Amount:</b>{{ orders.due }}</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Sizing -->

            </div>


            <!-- Datatables -->
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
                                <th>Product Name</th>
                                <th>Code</th>

                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>

                            </tr>
                            </thead>
                            <tbody>

                            <!--                                                            <tr v-for="detail in filterSearch" :key="product.id">-->
                            <tr v-for="detail in details" :key="detail.id">
                                <td>{{ detail.product_name }}</td>
                                <td>{{ detail.product_code }}</td>
                                <td><img :src="'/'+detail.image" id="img_photo"/></td>
                                <td>{{ detail.quantity }}</td>
                                <td>{{ detail.price }}</td>
                                <td>{{ detail.sub_total }}</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->
    </div>
</template>

<script>
import orders from "./index.vue";

export default {
    name: "view",

    data() {
        return {
            orders: {},
            details: {},
        };
    },
    created() {
        if (!User.loggedIn()) {
            this.$router.push({name: '/'});
        }
        let id = this.$route.params.id;
        axios.get(ApiUrl.BASE_URL + "orders/" + id)
            .then(({data}) => {
                    (this.orders = data)
                }
            )
            .catch((error) => {
                this.errors = error.response.data.errors
            })

        axios.get(ApiUrl.BASE_URL + "orders/order_details/" + id)
            .then(({data}) => {
                    (this.details = data)
                }
            )
            .catch((error) => {
                this.errors = error.response.data.errors
            })


    },
    methods: {
        // allProducts() {
        //     console.log(apiUrl.PRODUCTS)
        //     axios
        //         .get(apiUrl.PRODUCTS, this.form)
        //         .then(({data}) => (this.products = data))
        //         .catch((error) => {
        //             this.errors = error.response.data.errors
        //         })
        // },
    }

}
</script>

<style scoped>
#img_photo {
    height: 100px;
    width: 135px;
}
</style>
