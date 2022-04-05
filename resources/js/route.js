import Vue from 'vue';
import VueRouter from 'vue-router';

// Diciamo a Vue di usare Vuerouter
Vue.use(VueRouter)


// Importo i miei componential
import HomePage from './components/pages/HomePage.vue';
import ContactPage from './components/pages/ContactPage.vue';
import NotFoundPage from './components/pages/NotFoundPage.vue';


// Inizializziamo una nuovo VueRouter
const router = new VueRouter({
    mode: 'history', // Serve a simulare la pagina web e mi permette di navigare come in un browsers

    // Qui elenco tutte le mie rotte, il path è l'url e il component: punta al mio componente
    // occhio all'ordine in cui le metti
    routes: [
        {path: '/', component: HomePage},
        {path: '/contacts', component: ContactPage},
        {path:'*', component: NotFoundPage}
    ],
});


// Esporto l'oggetto 'router' per usarlo dentro il file di configurazione di vue (front.js)
export default router;