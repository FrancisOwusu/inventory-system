<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Expenses Form</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="expenseInsert" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Details</label>
                                <textarea
                                    type="text"
                                    v-model="form.details"
                                    class="form-control"
                                ></textarea>
                                <span class="text-danger" v-if="errors.details">{{ errors.details[0] }}</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Expenses Date</label>
                                        <input type="date" class="form-control" v-model="form.expense_date"

                                        >
                                        <span class="text-danger"
                                              v-if="errors.expense_date">{{ errors.expense_date[0] }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Amount</label>
                                        <input type="number" class="form-control" v-model="form.amount"
                                             >
                                        <span class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</span>

                                    </div>
                                </div>
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
    name: "create-expense",
    created() {
        if (!User.loggedIn()) {
            this.$router.push({name: '/'});
        }
    },
    data() {
        return {
            form: {
                details: null,
                amount: null,
                expense_date: null,
            },
            errors: {}
        };
    },

    methods: {
        expenseInsert() {
            axios
                .post('api/expenses', this.form)
                .then((response) => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Expense created successfully'
                    })
                    this.$router.push({name: "expenses"})
                })
                .catch((error) => {
                    this.errors = error.response
                })
        },

    },
}
</script>

<style scoped>

</style>
