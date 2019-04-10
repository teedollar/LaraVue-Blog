<template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card card-default">
                        <div class="card-header text-center"><b>Register</b></div>
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Fullname</label>
                                    <div class="col-md-7">
                                        <input id="name" type="text" class="form-control" v-model="name" placeholder="Enter your name here" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-7">
                                        <input id="email" type="email" class="form-control" v-model="email" placeholder="Enter your email address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-7">
                                        <input id="password" type="password" class="form-control" v-model="password" placeholder="Enter your password" required>
                                    </div></p>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                    <div class="col-md-7">
                                        <input id="password-confirm" type="password" class="form-control" v-model="password_confirmation" placeholder="Enter your password again" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-5 offset-md-7">
                                        <button type="submit" class="btn addBg btnColor" @click="handleSubmit">
                                            Register
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
        props : ['nextUrl'],
        data(){
            return {
                name : "",
                email : "",
                password : "",
                password_confirmation : ""
            }
        },
        methods : {
            handleSubmit(e) {
                e.preventDefault()
                if (this.password !== this.password_confirmation || this.password.length <= 0) {
                    this.password = ""
                    this.password_confirmation = ""
                }
                let name = this.name
                let email = this.email
                let password = this.password
                let c_password = this.password_confirmation
                axios.post('api/register', {name, email, password}).then(response => {
                    let data = response.data
                    localStorage.setItem('LaraVueBlog.user', JSON.stringify(data.user))
                    localStorage.setItem('LaraVueBlog.jwt', data.token)
                    if (localStorage.getItem('LaraVueBlog.jwt') != null) {
                        this.$emit('loggedIn')
                        let nextUrl = this.$route.params.nextUrl
                        this.$router.push((nextUrl != null ? nextUrl : 'home'))
                    }
                })
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