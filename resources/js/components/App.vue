<template>
    <div class="container mt-4">
        <div class="justify-content-center">
                <div>
                    <Header />
                    <ViewPosts />
                </div>
        </div>
    </div>
</template>

<script>
import Header from './Header.vue';
import ViewPosts from '../components/Posts/ViewPosts.vue';

export default{
    name: "App",
    components: {
        Header,
        ViewPosts,
    },
   
}
</script>