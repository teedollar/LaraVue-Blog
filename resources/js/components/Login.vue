<template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card card-default">
                        <div class="card-header text-center "><b>Login</b></div>
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-7">
                                        <input id="email" type="email" class="form-control" v-model="email" placeholder="Enter your email address" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-7">
                                        <input id="password" type="password" class="form-control" v-model="password" placeholder="Ente your password" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-5 offset-md-7">
                                        <button type="submit" class="btn addBg btnColor float-none" @click="handleSubmit">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script>
        export default {
            data() {
                return {
                    email: "",
                    password: ""
                }
            },
            methods: {
                handleSubmit(e) {
                    e.preventDefault()
                    if (this.password.length > 0) {
                        let email = this.email
                        let password = this.password

                        axios.post('api/login', {email, password}).then(response => {
                            let user = response.data.user

                            localStorage.setItem('LaraVueBlog.user', JSON.stringify(user))
                            localStorage.setItem('LaraVueBlog.jwt', response.data.token)

                            if (localStorage.getItem('LaraVueBlog.jwt') != null) {
                                this.$emit('loggedIn')
                                if (this.$route.params.nextUrl != null) {
                                    this.$router.push(this.$route.params.nextUrl)
                                } else {
                                    this.$router.push('home')
                                }
                            }
                        });
                    }
                }
            }
        }
    </script>

    <style>
        .btnColor {
            color: #fff;
            font-weight: bold
        }
    </style>