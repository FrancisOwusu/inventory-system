<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="categoryInsert">
                            <div class="form-group">
                                <label>Name</label>
                                <input
                                        type="text"
                                        v-model="form.name"
                                        class="form-control"
                                        id="exampleInputFirstName"
                                        placeholder="Enter Name"
                                />
                                <span class="text-danger" v-if="errors.name">{{errors.name[0]}}</span>

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Form Sizing -->

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
                this.$router.push({name:'/'});
            }
        },
        data() {
            return {
                form: {
                    name: null,
                },
                errors: {}
            };
        },

        methods: {
            categoryInsert() {
                axios
                    .post("/api/categories", this.form)
                    .then((response) => {
                   this.$router.push({name:"categories"})
                        Toast.fire({
                            icon: 'success',
                            title: 'Category created successfully'
                        })

                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors
                    })
                // .finally(() => (this.loading = false));
            },
        },
    }
</script>

<style scoped>

</style>