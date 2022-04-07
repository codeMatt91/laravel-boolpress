<template>
    <div>
        <!-- Alert parte se ci sono errori -->
        <div v-if="errors" class="alert" :class="`alert-${type}`" role="alert">
            <ul>
                <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
            </ul>
        </div>
        <!-- Alert che parte se il messaggio è inviato -->
        <div v-else class="alert" :class="`alert-${type}`" role="alert">
            {{ message }}
        </div>
    </div>
</template>

<script>
export default {
    name: "Alert",
    props: ["message", "type", "errors"],
};
</script>

<style></style>
