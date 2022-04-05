<template>
  <div class="mt-5">
      <div v-if="posts.length">
            <div class="row">
                <div class="col-6" v-for="post in posts" :key="post.id">
                <Post  :post="post" />
                </div>
            </div>
      </div>
  </div>
</template>

<script>
import Post from "./Post.vue"
export default {
name: "ViewPosts",
components: {Post},
data() {
    return {
        posts: [],
    }
},
methods: {
    getPosts(){
        axios.get('http://localhost:8000/api/posts').then(res => {
               
            this.posts = res.data;
        })
    },
},
mounted() {
    this.getPosts();
    },
}
</script>

<style>

</style>