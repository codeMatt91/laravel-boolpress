<template>
    <div class="card m-2">
        <div class="card-header d-flex justify-content-around">
            <router-link
                class="btn btn-success rounded"
                :to="{ name: 'post-detail', params: { id: post.id } }"
            >
                Vedi
            </router-link>
            <div><strong> Modificato il:</strong> {{ getDate }}</div>
        </div>
        <h3>{{ post.title }}</h3>
        <p>{{ post.content }}</p>
        <div class="card-footer d-flex justify-content-between">
            <div>
                Categoria:<span
                    :class="`badge badge-pill badge-${post.category.color}`"
                    >{{ post.category.label }}</span
                >
            </div>
            <div>
                Tags:
                <span
                    v-for="tag in post.tags"
                    :key="tag.id"
                    class="badge badge-pill"
                    :style="`background-color:${tag.color}`"
                >
                    <span v-if="tag" style="color: white">{{ tag.label }}</span>
                    <span v-else>Nessun tag</span>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Post",
    props: ["post"],
    computed: {
        getDate() {
            const d = new Date(this.post.updated_at);
            let day = d.getDate();
            let month = d.getMonth() + 1;
            let year = d.getFullYear();
            /*  const hours = d.getHours();
        const minutes = d.getMinutes(); */

            return `${day}/${month}/${year} `; // se voglio aggiungere anche l'ora ${hours}:${minutes}
        },
    },
};
</script>

<style scoped>
.card,
.card-header,
.card-footer {
    background-color: rgb(155, 155, 155);
    color: white;
}
</style>
