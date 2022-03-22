<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <router-link to="/">Home</router-link>
                    <router-link to="/about">About</router-link>
                    <router-link to="/login">Login</router-link>
                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <div>
                        {{yyy}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['xxx'],
        computed:{
            yyy(){
                return JSON.parse(this.xxx)
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
