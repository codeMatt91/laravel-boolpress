<template>
    <div class="card m-2">
        <div class="card-header"><strong> Modificato il:</strong> {{ getDate }}</div>
        <h3>{{post.title}}</h3>
        <p>{{post.content}}</p>
        <div class="card-footer d-flex justify-content-between">
            <div>Categoria:<span :class="`badge badge-pill badge-${post.category.color}`">{{ post.category.label }}</span></div>
            <div>Tags: 
                <span v-for="tag in post.tags" :key="tag.id" class="badge badge-pill" :style="`background-color:${tag.color}`">
                    <span style="color:white">{{ tag.label }}</span>
                </span>
            </div>
         </div>
    </div>
</template>

<script>
export default {
name: "Post",
props: ["post"],
computed:{
    getDate(){
        const d = new Date(this.post.updated_at);
        let day = d.getDate();
        let month = d.getMonth() + 1;
        let year = d.getFullYear();
        const hours = d.getHours();
        const minutes = d.getMinutes();

        return `${day}/${month}/${year} ${hours}:${minutes}`;
    }
},
}
</script>

<style scoped>
.card-header,
.card-footer {
    background-color: rgb(193, 191, 191);
}
</style>