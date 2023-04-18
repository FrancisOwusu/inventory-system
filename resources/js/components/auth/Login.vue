<template>
    <div>
        <!-- Login Content -->

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Login
                                        </h1>
                                    </div>
                                    <form class="user" @submit.prevent="login">
                                        <div class="form-group">
                                            <input
                                                    type="email"
                                                    v-model="form.email"
                                                    class="form-control"
                                                    id="exampleInputEmail"
                                                    aria-describedby="emailHelp"
                                                    placeholder="Enter Email Address"
                                            />
                                            <span class="text-danger" v-if="errors.email">{{errors.email[0]}}</span>
                                        </div>
                                        <div class="form-group">
                                            <input
                                                    type="password"
                                                    v-model="form.password"
                                                    class="form-control"
                                                    id="exampleInputPassword"
                                                    placeholder="Password"
                                            />
                                        </div>
                                        <!-- <div class="form-group">
                                            <div
                                                class="custom-control custom-checkbox small"
                                                style="line-height: 1.5rem"
                                            >
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    id="customCheck"
                                                />
                                                <label
                                                    class="custom-control-label"
                                                    for="customCheck"
                                                    >Remember Me</label
                                                >
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <button
                                                    type="submit"
                                                    class="btn btn-primary btn-block"
                                            >
                                                Login
                                            </button>
                                        </div>
                                        <hr/>
                                    </form>
                                    <hr/>
                                    <div class="text-center">
                                        <router-link
                                                to="/register"
                                                class="font-weight-bold small"
                                        >Create an Account!
                                        </router-link
                                        >
                                        <br/>
                                        <router-link
                                                to="/forgot"
                                                class="font-weight-bold small"
                                        >Forgot Password
                                        </router-link
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
    import User from "../../Helpers/User";

    export default {
        created() {
            if (User.loggedIn()) {
                this.$router.push('/home');
            }
        },
        data() {
            return {
                form: {
                    email: null,
                    password: null,
                },
                errors:{

                }
            };
        },
        methods: {
            login() {
                axios
                    .post("/api/auth/login", this.form)
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
                    }).catch(
                    Toast.fire({
                        icon: 'warning',
                        title: 'Invalid Email or Password'
                    })
                );
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
