<template>
  <div class="container d-flex flex-column align-items-center justify-content-center">
      <h3 class="text-muted">404 | Pagina non trovata</h3>
      <div class="btn btn-secondary" @click="$router.back()">Indietro</div>
  </div>
</template>

<script>
export default {
name: "NotFoundPage",
}
</script>
<style scoped >
.container{
  height: 100vh;
}
</style>