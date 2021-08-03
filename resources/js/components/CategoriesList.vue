<template>
    <div class="container">
        <h1>categories</h1>
        <ul>
            <li v-for="category in categories">
                {{category.name}}
            </li>
        </ul>
    </div>
</template>

<script>
import Axios from 'axios'
export default {
data() {
    return {
        categories: null
    }
},
mounted() {
    Axios.get('api/categories').then(resp => {
        // console.log(resp);
        this.categories = resp.data;
    }).catch(e => {
        console.error('Sorry!!!! error' + e);
    })
}
}
</script>

<style>

</style>