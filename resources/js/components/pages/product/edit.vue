<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Product Edit</h6>
                    </div>
                    <div class="card-body">
                        <form  @submit.prevent="updateProduct" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input
                                            type="text"
                                            v-model="form.product_name"
                                            class="form-control"
                                            id="productName"
                                            placeholder="Enter Product Name"
                                        />
                                        <span class="text-danger" v-if="errors.product_name">{{
                                                errors.product_name[0]
                                            }}</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Root</label>
                                        <input
                                            type="text"
                                            id="productRoot"
                                            v-model="form.root"
                                            class="form-control"
                                            placeholder="Product Root"
                                        />
                                        <span class="text-danger" v-if="errors.root">{{ errors.root[0] }}</span>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Code</label>
                                        <input type="text" class="form-control" v-model="form.product_code"
                                               id="productCode"
                                               placeholder="">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your-->
                                        <!--email with anyone else.</small>-->
                                        <span class="text-danger" v-if="errors.product_code">{{
                                                errors.product_code[0]
                                            }}</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Quantity</label>
                                        <input
                                            type="text"
                                            id="salary"
                                            v-model="form.product_quantity"
                                            class="form-control"
                                            placeholder="Enter Quantity"
                                        />
                                        <span class="text-danger"
                                              v-if="errors.product_quantity">{{ errors.product_quantity[0] }}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Buying Price</label>
                                        <input type="number" id="buyingPrice" class="form-control"
                                               v-model="form.buying_price"

                                               placeholder="">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your-->
                                        <!--email with anyone else.</small>-->
                                        <span class="text-danger" v-if="errors.buying_price">{{
                                                errors.buying_price[0]
                                            }}</span>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Selling Price</label>
                                        <input
                                            type="text"
                                            id="sellingPrice"
                                            v-model="form.selling_price"
                                            class="form-control"
                                            placeholder=""
                                        />
                                        <span class="text-danger" v-if="errors.selling_price">{{
                                                errors.selling_price[0]
                                            }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Category</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                                v-model="form.category_id">
                                            <option :value="category.id" v-for="category in categories">
                                                {{ category.name }}
                                            </option>
                                        </select>

                                        <span class="text-danger"
                                              v-if="errors.category_id">{{ errors.category_id[0] }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Supplier</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                                v-model="form.supplier_id">
                                            <option :value="supplier.id" v-for="supplier in suppliers">
                                                {{ supplier.name }}
                                            </option>

                                        </select>

                                        <span class="text-danger"
                                              v-if="errors.supplier_id">{{ errors.supplier_id[0] }}</span>

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Buying Date</label>
                                        <input type="date"  class="form-control"
                                               v-model="form.buying_date"

                                        >
                                        <span class="text-danger"
                                              v-if="errors.buying_date">{{ errors.buying_date[0] }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                   accept="image/*"
                                                   ref="file"
                                                   class="custom-file-input"
                                                   @change="onFileSelected" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <span class="text-danger" v-if="errors.image">{{ errors.image[0] }}</span>
                                    </div>

                                    <div class="form-group">
                                        <img :src="form.image" style="height:40px;width: 40px"/>
                                        <span class="text-danger" v-if="errors.image">{{ errors.image[0] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea id="address" v-model="form.address"></textarea>
                                <span class="text-danger" v-if="errors.address">{{ errors.address[0] }}</span>

                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>


            </div>


        </div>
    </div>
</template>

<script>
    import ApiUrl from "@/Helpers/ApiUrl";

    export default {
        name: "edit",
        data() {
            return {
                form: {
                    category_id: '',
                    product_name: '',
                    product_code: '',
                    root: '',
                    buying_price: '',
                    selling_price: '',
                    supplier_id: '',
                    buying_date: '',
                    image: '',
                    newImage:'',
                    product_quantity: ''
                },
                errors: {},
                categories: {},
                suppliers: {},
            }
        },
        created() {
            if (!User.loggedIn()) {
                this.$router.push({name: '/'});
            }
            let id = this.$route.params.id;

            axios.get(ApiUrl.PRODUCTS + "/" + id)
                .then(({data}) => {
                        (this.form = data)
                        console.log(data)
                    }
                )
                .catch((error) => {
                    this.errors = error.response.data.errors
                })

            axios
                .get(ApiUrl.CATEGORIES)
                .then(({data}) => (this.categories = data)
                )
                .catch((error) => {
                    this.errors = error.response.data.errors
                });

            axios
                .get(ApiUrl.SUPPLIERS)
                .then(({data}) => (this.suppliers = data))
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },

        methods: {
            updateProduct() {
                let id = this.$route.params.id;
                axios.patch(ApiUrl.PRODUCTS + '/' + id, this.form)
                    .then((response) => {
                        this.$router.push({name: "employee"})
                        Toast.fire({
                            icon: 'success',
                            title: 'Updated successfully'
                        })

                    })
                    .catch((error) => {
                        console.log(error);
                        this.errors = error.response.data
                    })
                //     .catch(
                //     Toast.fire({
                //         icon: 'warning',
                //         title: 'Invalid Email or Password'
                //     })
                // );
                // .finally(() => (this.loading = false));
            },

            onFileSelected(event) {
                let file = event.target.files[0];
                if (file.size > 1048770) {
                    Toast.fire({
                        icon: 'error',
                        title: 'File Is more than 1MB'
                    })

                } else {
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.newImage = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        },
    }
</script>

<style scoped>

</style>
