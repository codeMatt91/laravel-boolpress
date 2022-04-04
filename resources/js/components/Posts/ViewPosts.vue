<template>
  <div class="mt-5">
      <div v-if="posts.length">
            <div class="card mb-3" v-for="post in posts" :key="post.id">
                <h3>{{post.title}}</h3>
                <p>{{post.content}}</p>
                <div class="d-flex justify-content-between">
                    <div><strong> Modificato il:</strong> {{ getDate() }}</div>
                    <div></div>
                </div>
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
    },
    getDate(){
        const date = new Date(this.posts.updated_at);
        let day = date.getDate();
        let month = date.getMonth() + 1;
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    }
},
mounted() {
    this.getPosts();
}
}
</script>

<style>

</style>