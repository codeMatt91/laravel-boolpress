<template>
  <div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <!-- Qui il router-link simula un link-->
    <router-link class="navbar-brand" to="/">Boolpress</router-link>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link class="nav-link active" aria-current="page" to="/">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/contacts">Contacts</router-link>
        </li>
      </ul>
    </div>
  </div>
</nav>
  </div>
</template>

<script>
export default {
name: "Header",
}
</script>
