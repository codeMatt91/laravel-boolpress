<template>
    <div class="container">
        <div class="justify-content-center">
                <div>
                    <Header />
                    <div>
                        Stiamo lavorando per voi
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
import Header from './Header.vue';
export default{
    name: "App",
    components: {
        Header,
    }
}
</script>