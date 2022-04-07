<template>
    <div class="mt-5">
        <h2>Contattaci</h2>
        <Alert v-if="alertMessage" type="success" />
        <section class="contact-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    aria-describedby="emailHelp"
                    v-model="form.email"
                />
                <small id="emailHelp" class="form-text text-muted"
                    >Ti contatteremo a questo indirizzo.</small
                >
            </div>
            <div class="form-group">
                <label for="message">Messaggio</label>
                <textarea
                    class="form-control"
                    id="message"
                    rows="10"
                    v-model="form.message"
                ></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn-secondary" @click="sendForm">Invia</button>
            </div>
        </section>
    </div>
</template>

<script>
import Alert from "./Alert.vue";
export default {
    name: "ContactPage",
    components: {
        Alert,
    },
    data() {
        return {
            form: {
                email: "",
                message: "",
            },
            alertMessage: "",
        };
    },
    methods: {
        sendForm() {
            console.log("ciao");
            axios
                .post("http://localhost:8000/api/message", this.form)
                .then((res) => {
                    this.form.email = "";
                    this.form.messege = "";
                    this.alertMessage = "Messaggio inviato con successo";
                })
                .catch((err) => {})
                .then(() => {});
        },
    },
};
</script>

<style scoped>
.contact-form {
    text-align: left;
}
</style>
