<template>
    <div class="mt-5">
        <h2>Contattaci</h2>

        <!-- Messaggio -->
        <div>
            <Alert v-if="hasErrors" type="danger" :errors="errors" />
            <Alert
                v-else-if="alertMessage"
                type="success"
                :message="alertMessage"
            />
        </div>

        <section class="contact-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    :class="{ 'is-invalid': errors.email }"
                    id="email"
                    aria-describedby="emailHelp"
                    v-model="form.email"
                />
                <small
                    v-if="!errors.email"
                    id="emailHelp"
                    class="form-text text-muted"
                    >Ti contatteremo a questo indirizzo.</small
                >
                <small v-else class="invalid-feedback">{{
                    errors.email
                }}</small>
            </div>
            <div class="form-group">
                <label for="message">Messaggio</label>
                <textarea
                    class="form-control"
                    :class="{ 'is-invalid': errors.message }"
                    id="message"
                    rows="10"
                    v-model="form.message"
                ></textarea>
                <small v-if="errors.message" class="invalid-feedback">{{
                    errors.message
                }}</small>
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
            // Controllo se il form non ha i valori email o messagge, creo due errori distinti.
            //E importante perchè devo svuotare gli errori ogni volta che avvia la pagina sennò l'array degli errori rimarrebbe pieno e la chiamata non partirebbe mai
            const errors = {};
            if (!this.form.email.trim())
                errors.email = "La mail è obbligatoria";
            if (!this.form.message.trim())
                errors.message = "Devi inserire un messaggio";
            // Controllo che sia una mail valida
            if (
                this.form.email &&
                this.form.email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)
            )
                errors.email = "La mail non è valida";

            this.errors = errors;

            // Questo controllo fa partire la chiamata solo se l'array degli errori è vuoto
            if (!this.hasErrors) {
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
            }
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
