<template>
    <div class="">
       
        <nav class="navbar navbar-expand-lg navbar-dark align-self-start sticky-top addBg">

            <router-link :to="{name: 'home'}" class="navbar-brand">LaraVue Blog</router-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarLinks">
                <ul class="navbar-nav ml-auto" style="font-weight: bold; color: #ffffff;">

                    <router-link :to="{ name: 'home' }" class="nav-link" >Home</router-link>

                    <router-link :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">Login</router-link>
                
                    <router-link :to="{ name: 'register' }" class="nav-link" v-if="!isLoggedIn">Register</router-link>

                    <router-link :to="{ name: 'about-us' }" class="nav-link" >About Us</router-link>

                    <router-link :to="{ name: 'contact-us' }" class="nav-link" >Contact Us</router-link>

                    <li class="nav-item dropdown" v-if="isLoggedIn">
                        <router-link class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">{{ firstname }} </router-link>
                        <div class="dropdown-menu">
                      
                        <router-link :to="{ name: 'profile' }" class="dropdown-item" >{{ fullname }}</router-link>

                        <li class="dropdown-item" v-if="isLoggedIn" @click="logout"> Logout</li>
                      </div>
                    </li>

                </ul>
            </div>

        </nav>


        <main class="py-4">
            <router-view @loggedIn="change"></router-view>
        </main>

    </div>

</template>

    <script>
    export default {
        data() {
            return {
                firstname: null,
                fullname: null,
                isLoggedIn: localStorage.getItem('LaraVueBlog.jwt') != null
            }
        },
        mounted() {
            this.setDefaults()
        },
        methods : {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('LaraVueBlog.user'))
                    this.fullname = firstname.name
                    this.firstname = this.fullname.split(" ", 1);
                }
            },
            change() {
                this.isLoggedIn = localStorage.getItem('LaraVueBlog.jwt') != null
                this.setDefaults()
            },
            logout(){
                localStorage.removeItem('LaraVueBlog.jwt')
                localStorage.removeItem('LaraVueBlog.user')
                this.change()
                this.$router.push('/')
            }
        }
    }
    </script>

    <style>
        .addBg {
            background-color: purple;
        }
    </style>