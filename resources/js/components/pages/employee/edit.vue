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
                        <form @submit.prevent="updateEmployee" enctype="multipart/form-data">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" v-model="form.email"
                                               id="exampleInputEmail1" aria-describedby="emailHelp"
                                               placeholder="Enter email">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your-->
                                        <!--email with anyone else.</small>-->
                                        <span class="text-danger" v-if="errors.name">{{errors.name[0]}}</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input
                                                type="text"
                                                v-model="form.salary"
                                                class="form-control"
                                                placeholder="Enter Salary"
                                        />
                                        <span class="text-danger" v-if="errors.salary">{{errors.salary[0]}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" class="form-control" v-model="form.phone"

                                               placeholder="Enter phone">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your-->
                                        <!--email with anyone else.</small>-->
                                        <span class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</span>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIB</label>
                                        <input
                                                type="text"
                                                v-model="form.nid"
                                                class="form-control"
                                                placeholder="Enter NIB"
                                        />
                                        <span class="text-danger" v-if="errors.nid">{{errors.nid[0]}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date Joining</label>
                                        <input type="date" class="form-control" v-model="form.date_joining"

                                        >
                                        <span class="text-danger"
                                              v-if="errors.date_joining">{{errors.date_joining[0]}}</span>
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
                                        <span class="text-danger" v-if="errors.newphoto">{{errors.newphoto[0]}}</span>
                                    </div>

                                    <div class="form-group">
                                        <img :src="form.photo" style="height:40px;width: 40px"/>
                                        <span class="text-danger" v-if="errors.photo">{{errors.photo[0]}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea v-model="form.address"></textarea>
                                <span class="text-danger" v-if="errors.address">{{errors.address[0]}}</span>

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

        data() {
            return {
                form: {
                    name: '',
                    salary: '',
                    email: '',
                    phone: '',
                    nid: '',
                    address: '',
                    photo: '',
                    newphoto: '',
                    date_joining: ''
                },
                errors: {}
            };
        },
        created() {
            if (!User.loggedIn()) {
                this.$router.push({name:'/'});
            }
            let id = this.$route.params.id;

            axios
                .get(ApiUrl.EMPLOYEES+ "/" +id)
                .then(({data}) => {(this.form = data)
                console.log(data)}
                )
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        },
        methods: {
            updateEmployee() {
                let id = this.$route.params.id;
                axios.patch(ApiUrl.EMPLOYEES + "/" + id, this.form)
                    .then((response) => {
                   this.$router.push({name:"employees"})
                        Toast.fire({
                            icon: 'success',
                            title: 'Signed in successfully'
                        })

                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors
                    })
                //     .catch(
                //     Toast.fire({
                //         icon: 'warning',
                //         title: 'Invalid Email or Password'
                //     })
                // );
                // .finally(() => (this.loading = false));
            },

            // reverseMessage() {
            //   this.message = this.message.split('').reverse().join('')
            // },
            // notify() {
            //   alert('navigation was prevented.')
            // }
            onFileSelected(event) {
                let file = event.target.files[0];
                if (file > 1048770) {
                    Toast.fire({
                        icon: 'error',
                        title: 'File Is more than 1MB'
                    })

                } else {
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.newphoto = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        },
    }
</script>

<style scoped>

</style>
