<template>
  <div class="container">
      <h1 class="mt-4">I miei Post</h1>
      <ViewPosts />
  </div>
</template>

<script>
import ViewPosts from "../Posts/ViewPosts.vue";
export default {
name: "HomePage",
components: {
    ViewPosts,
}
}
</script>

<style>

</style>