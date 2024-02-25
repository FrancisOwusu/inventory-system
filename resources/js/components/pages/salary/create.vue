<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Employee Salary</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="paySalary" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Employee Name</label>
                                        <input
                                            type="text"
                                            v-model="form.name"
                                            class="form-control"
                                            id="exampleInputFirstName"

                                        />
                                        <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input
                                            type="text"
                                            v-model="form.email"
                                            class="form-control"
                                            id="exampleInputFirstName"

                                        />
                                        <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input
                                    type="text"
                                    v-model="form.salary"
                                    class="form-control"
                                    id="exampleInputFirstName"
                                    placeholder="Enter Amount"
                                />
                                <span class="text-danger" v-if="errors.salary">{{ errors.salary[0] }}</span>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Salary Months</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                                v-model="form.salary_month">
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>


                                        <span class="text-danger"
                                              v-if="errors.salary_month">{{ errors.salary_month[0] }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Salary Date</label>
                                        <input type="date" class="form-control"
                                               v-model="form.salary_date"

                                        >
                                        <span class="text-danger"
                                              v-if="errors.salary_date">{{ errors.salary_date[0] }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Salary Year</label>
                                        <input type="date" class="form-control"
                                               v-model="form.salary_year"

                                        >
                                        <span class="text-danger"
                                              v-if="errors.salary_year">{{ errors.salary_year[0] }}</span>
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
    name: "customers",
    created() {
        if (!User.loggedIn()) {
            this.$router.push({name: '/'});
        }
        let id = this.$route.params.id;

        axios
            .get(ApiUrl.EMPLOYEES + "/" + id)
            .then(({data}) => {
                    (this.form = data)
                }
            )
            .catch((error) => {
                this.errors = error.response.data.errors
            })
    },
    data() {
        return {
            form: {
                name: null,
                email: null,
                salary: null,
                salary_date: null,
                salary_month: null,
                salary_year: null,

            },
            errors: {}
        };
    },

    methods: {
        paySalary() {
            let id = this.$route.params.id;
            axios
                .post(ApiUrl.SALARY + '/pay/'+ id, this.form)
                .then((response) => {
                    console.log(response);
                    if(response.data.msg){
                        Toast.fire({
                            icon: 'error',
                            title: response.data.msg
                        })
                    }else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Salary created successfully'
                        })
                         this.$router.push({name: "given-salary"})
                    }
                })
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },

        onFileSelected(event) {
            let file = event.target.files[0];
            if (!file) {
                Toast.fire({
                    icon: 'error',
                    title: 'Please select a file'

                });
                return;
            }
            if (file > 1048770) {
                Toast.fire({
                    icon: 'error',
                    title: 'File Is more than 1MB'
                })
                return false;
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.photo = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

    },
}
</script>

<style scoped>

</style>
