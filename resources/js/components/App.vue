<template>
    <div>
        <header>
            <Header />
        </header>
        <div class="container">
            <div class="justify-content-center">
                <main>
                    <router-view></router-view>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
import Header from "./Header.vue";
import ViewPosts from "../components/Posts/ViewPosts.vue";

export default {
    name: "App",
    components: {
        Header,
        ViewPosts,
    },
};
</script>
