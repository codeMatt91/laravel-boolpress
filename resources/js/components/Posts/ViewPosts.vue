<template>
  <div class="mt-5">
      <div v-if="posts.length">
            <div class="row">
                <div class="col-6" v-for="post in posts" :key="post.id">
                    <div class="card m-2">
                        <h3>{{post.title}}</h3>
                        <p>{{post.content}}</p>
                        <div class="card-footer d-flex justify-content-between">
                            <div><strong> Modificato il:</strong> {{ post.updated_at }}</div>
                            <div><span :class="`badge badge-pill badge-${post.category.color}`">{{ post.category.label }}</span></div>
                        </div>
                    </div>
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
},
computed:{
    /* getDate(){
        const date = new Date(this.posts.updated_at);
        let day = date.getDate();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();
        return `${day}/${month}/${year}`;
    } */
},
mounted() {
    this.getPosts();
    
}
}
</script>

<style>

</style>