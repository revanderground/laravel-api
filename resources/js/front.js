window.Vue = require('vue');

//importiamo il componente app
import App from './views/App';

const app = new Vue({
    el: '#root',
    render : h => h(App) // mostriamo App all'avvio di Vue
});
