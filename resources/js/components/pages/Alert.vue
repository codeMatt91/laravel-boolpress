<template>
    <div class="alert alert-{{type}}" role="alert" v-text="message"></div>
</template>

<script>
export default {
    name: "Alert",
    props: ["message", "type"],
};
</script>

<style></style>
