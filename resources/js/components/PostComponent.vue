<template>
    <div class="container">
        <div v-for="post in posts" class="card">
            <img width="100" class="card-img-top" :src="post.image" alt="">
            <div class="card-body">
                <h4 class="card-title">{{post.title}}</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
</template>

<script>
const { default: Axios } = require('axios');
    export default {
        data() {
            return {
                posts: null
            }
        },  
        mounted(){
            console.log('ComponentCard ok');

            Axios.get('/api/posts').then(resp => {
                // console.log(resp);
                this.posts = resp.data.data;
            }).catch( e => {
                console.error('Sorry!!! ' + e);
            })
        }
        
    }
</script>
