<template>
    <div>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">DataTables</h1>
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
                                    <th>Photo</th>
                                    <th>Salary</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                    <!--<th>Salary</th>-->
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="employee in filterSearch" :key="employee.id">
                                    <td>{{employee.name}}</td>
                                    <td><img :src="employee.photo"/></td>
                                    <td>{{employee.salary}}</td>
                                    <td>{{employee.email}}</td>
                                    <td>{{employee.phone}}</td>
                                    <td>
                                        <router-link :to="{name:'edit-employee', params:{id:employee.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                        <button @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
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
            this.allEmployees();
        },
        data() {
            return {
                employees: [],
                searchTerm: ''
            };
        },
        computed: {
            filterSearch() {
                return this.employees.filter(employee => {
                    return employee.phone.match(this.searchTerm);
                })
            }

        },
        methods: {
            allEmployees() {
                axios
                    .get("/api/employee", this.form)
                    .then(({data}) => (this.employees = data))
                    .catch((error) => {
                        this.errors = error.response.data.errors
                    })
            },
            deleteEmployee(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios
                            .delete("/api/employee/" + id)
                            .then(() => {
                                this.employees = this.employees.filter(
                                    employee => {
                                        return employee.id != id;
                                    }
                                )
                            })
                            .catch(() => {
                                this.$router.push('/employees')
                            })
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            }
        }

    }
</script>

<style scoped>

</style>