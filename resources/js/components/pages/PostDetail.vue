<template>
  <div id="show-post" >
      <Post :post="post"/>
  </div>
</template>

<script>
import Post from '../Posts/Post.vue';

export default {
name: "PostDetail",
components:{Post},
data(){
    return{
        post: {}
    }
},
methods:{
    getPost(){
        axios.get("http://localhost:8000/api/posts/" + this.$route.params.id).then(res => {
            this.post = res.data
        }).catch(err => {
            console.error(err);
        })
    },
},
mounted(){
    this.getPost();
}
}
</script>

<style scoped>
#show-post{
    margin-top: 100px;
}
</style>