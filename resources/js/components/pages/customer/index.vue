<template>
    <div>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Customers</h1>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="customer in filterSearch" :key="customer.id">
                                    <td>{{ customer.name }}</td>
                                    <td><img :src="customer.photo"/></td>

                                    <td>{{ customer.email }}</td>
                                    <td>{{ customer.phone }}</td>
                                    <td>
                                        <router-link :to="{name:'edit-customer', params:{id:customer.id}}"
                                                     class="btn btn-sm btn-primary">Edit
                                        </router-link>
                                        <button @click="deleteCustomer(customer.id)" class="btn btn-sm btn-danger">
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
        this.allCustomers();
    },
    data() {
        return {
            customers: [],
            searchTerm: ''
        };
    },
    computed: {
        filterSearch() {
            return this.customers.filter(customer => {
                return customer.name.match(this.searchTerm);
            })
        }

    },
    methods: {
        allCustomers() {
            axios
                .get(ApiUrl.CUSTOMERS, this.form)
                .then(({data}) => (this.customers = data))
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },
        deleteCustomer(id) {
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
                        .delete(ApiUrl.CUSTOMERS+'/' + id)
                        .then(() => {
                            this.customers = this.customers.filter(
                                customer => {
                                    return customer.id != id;
                                }
                            )
                        })
                        .catch(() => {
                            this.$router.push('/customers')
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
