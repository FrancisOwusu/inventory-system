<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Register
                                        </h1>
                                    </div>
                                    <form class="user" @submit.prevent="signup">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input
                                                type="text"
                                                v-model="form.firstname"
                                                class="form-control"
                                                id="exampleInputFirstName"
                                                placeholder="Enter First Name"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input
                                                type="text"
                                                v-model="form.lastname"
                                                class="form-control"
                                                id="exampleInputLastName"
                                                placeholder="Enter Last Name"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input
                                                type="email"
                                                v-model="form.email"
                                                class="form-control"
                                                id="exampleInputEmail"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Email Address"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input
                                                type="password"
                                                v-model="form.password"
                                                class="form-control"
                                                id="exampleInputPassword"
                                                placeholder="Password"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Repeat Password</label>
                                            <input
                                                type="password"
                                                v-model="form.password_confirmation"
                                                class="form-control"
                                                id="exampleInputPasswordRepeat"
                                                placeholder="Repeat Password"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <button
                                                type="submit"
                                                class="btn btn-primary btn-block"
                                            >
                                                Register
                                            </button>
                                        </div>
                                        <hr />
                                    </form>
                                    <hr />
                                    <div class="text-center">
                                        <router-link
                                            to="/"
                                            class="font-weight-bold small"
                                            >Already have an
                                            account?</router-link
                                        >
                                    </div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",
    created() {
        if (!User.loggedIn()) {
            this.$router.push({name:'/'});
        }
    },
    data(){
        return {
            form: {
                email: null,
                password: null,
                firstname:null,
                lastname:null,
                password_confirmation:null
            },
            errors:{

            }
        };
    },

    methods: {
        store_employee() {
            axios
                .post("/api/auth/signup", this.form)
                .then((response) => {
                    User.responseAfterLogin(response);
                    Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                    })

                    // if(authenticated){
                    this.$router.push('/home');
                    // this.$router.push({name:'Home'});
                    // }else{
                    //     this.$router.push('/');
                    // }
                    // console.log(response.data);
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
    },
};
</script>

<style scoped></style>
