<template>
    <div>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Employee Salary Details</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary">Employee Salary Details</h6>
                        </div>
                        <input style="width: 300px;" v-model="searchTerm" class="form-control"
                               placeholder="Search here"/>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Month</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="salary in filterSearch" :key="salary.id">
                                    <td>{{salary.name}}</td>
                                    <td>{{salary.salary_month}}</td>
                                    <td>{{salary.amount}}</td>
                                    <td>{{salary.salary_date}}</td>
                                    <td>
                                        <router-link :to="{name:'edit-salary', params:{id:salary.id}}" class="btn btn-sm btn-primary">Edit</router-link>
<!--                                        <button @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger">-->
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
        if (!User.loggedIn()) {
            this.$router.push({name: '/'});
        }
        this.viewSalary();
    },
    data() {
        return {
            salaries: [],
            searchTerm: ''
        };
    },
    computed: {
        filterSearch() {
            return this.salaries.filter(salary => {
                return salary.name.match(this.searchTerm);
            })
        }

    },
    methods: {
        viewSalary() {
            let id = this.$route.params.id;
            axios
                .get(ApiUrl.SALARY + '/view/'+ id)
                .then(({data}) => (this.salaries = data))
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        }
    }

}
</script>

<style scoped>

</style>
