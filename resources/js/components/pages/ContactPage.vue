<template>
    <div class="mt-5">
        <h2>Contattaci</h2>

        <!-- Messaggio -->
        <div v-if="hasErrors || alertMessage">
            <Alert v-if="hasErrors" type="danger" :message="errors" />
            <Alert v-else type="success" :message="alertMessage" />
        </div>

        <section v-else class="contact-form">
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
/* import _ from "lodash"; */
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
            errors: {},
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
                .catch((err) => {
                    console.log(err.response.statusCode);
                    this.errors = "Si è verificato un errore";
                })
                .then(() => {});
        },
    },
    computed: {
        hasErrors() {
            /*  Restituisce un array con le chiavi di un oggetto */
            return Object.keys(this.errors).length;

            /* Usando la libreria lodash controllo se nell'oggetto errors ci sono chiavi */
            /* return _isEmpty(this.erros); */
        },
    },
};
</script>

<style scoped>
.contact-form {
    text-align: left;
}
</style>
