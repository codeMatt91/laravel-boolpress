<template>
  <div>
      <div v-if="posts.length">
            <div class="card" v-for="post in posts" :key="post.id">
                <h3>{{post.title}}</h3>
                <p>{{post.content}}</p>
            </div>
      </div>
      <div v-else>
          <h2>Non ci sono post </h2>
      </div>
  </div>
</template>

<script>
export default {
name: "ViewPosts",
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
    }
},
mounted() {
    this.getPosts();
}
}
</script>

<style>

</style>