 import Vue from 'vue'
 import Index from './Index'
 import router from './router'
import bootstrap from 'bootstrap'


window.Vue = require('vue').default;
window.Vue = require('bootstrap').default;


 const app = new Vue({
    components: { Index },
    router
}).$mount('#app')
