<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update Stock</h6>
                    </div>
                    <div class="card-body">
                        <form  @submit.prevent="updateStock">


                            <div class="row">

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
                product_quantity: ''
            },
            errors: {},
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
                }
            )
            .catch((error) => {
                this.errors = error.response.data.errors
            })

    },

    methods: {
        updateStock() {
            let id = this.$route.params.id;
            axios.post(ApiUrl.BASE_URL + 'stock/update/' + id, this.form)
                .then((response) => {
                    this.$router.push({name: "stock"})
                    Toast.fire({
                        icon: 'success',
                        title: 'Updated successfully'
                    })

                })
                .catch((error) => {
                    console.log(error);
                    this.errors = error.response.data.errors
                })
            //     .catch(
            //     Toast.fire({
            //         icon: 'warning',
            //         title: 'Invalid Email or Password'
            //     })
            // );
            // .finally(() => (this.loading = false));
        }
    },
}
</script>

<style scoped>

</style>
