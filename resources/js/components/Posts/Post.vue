<template>
    <div class="card m-2">
        <h3>{{post.title}}</h3>
        <p>{{post.content}}</p>
        <div class="card-footer d-flex justify-content-between">
            <div><strong> Modificato il:</strong> {{ getDate }}</div>
            <div><span :class="`badge badge-pill badge-${post.category.color}`">{{ post.category.label }}</span></div>
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
        const seconds = d.getSeconds();

        return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
    }
},
}
</script>

<style>

</style>