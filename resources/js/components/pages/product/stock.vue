<template>
    <div>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Products</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                        </div>
                        <input style="width: 300px;" v-model="searchTerm" class="form-control"
                               placeholder="Search here"/>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>

                                    <th>Category</th>
                                    <th>Supplier</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="product in filterSearch" :key="product.id">
                                    <td>{{ product.product_name }}</td>
                                    <td>{{ product.product_code }}</td>
                                    <td>{{ product.category_name }}</td>
                                    <td>{{ product.supplier_name }}</td>
                                    <td><img :src="product.image" id="img_photo"/></td>
                                    <td v-if="product.product_quantity >= 1"><span
                                        class="badge badge-success">Available</span></td>
                                    <td v-else=""><span class="badge badge-danger">Out Of Stock</span></td>
                                    <td>{{ product.product_quantity }}</td>
                                    <td>
                                        <router-link :to="{name:'edit-stock', params:{id:product.id}}"
                                                     class="btn btn-sm btn-primary">Edit
                                        </router-link>

                                    </td>
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
import apiUrl from "@/Helpers/ApiUrl";

export default {
    name: "index",
    created() {
        if (!User.loggedIn()) {
            this.$router.push({name: '/'});
        }
        this.allProducts();
    },
    data() {
        return {
            products: [],
            searchTerm: ''
        };
    },
    computed: {
        filterSearch() {
            return this.products.filter(product => {

                return product.product_name.match(this.searchTerm);
            })
        }

    },
    methods: {
        allProducts() {
            console.log(apiUrl.PRODUCTS)
            axios
                .get(apiUrl.PRODUCTS, this.form)
                .then(({data}) => (this.products = data))
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
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
