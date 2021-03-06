/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vuetify from '../plugins/vuetify'

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('wireframe', require('./components/Wireframe.vue').default);
Vue.component('status', require('./components/Status.vue').default);
// Vue.component('object-bar', require('./components/ObjectBar.vue').default);
 
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    vuetify: Vuetify,
    el: '#app',
});

const app2 = new Vue({
    vuetify: Vuetify,
    el: '#app2',
});

// "scripts": {
//     "post-autoload-dump": [
//         "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
//         "@php artisan package:discover --ansi"
//     ],d
//     "post-root-package-install": [
//         "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
//     ],
//     "post-create-project-cmd": [
//         "@php artisan key:generate --ansi",
//         "@php artisan passport:keys"
//     ]
// }
