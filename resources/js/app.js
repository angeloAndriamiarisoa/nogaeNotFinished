require('./bootstrap');
import { createApp } from 'vue';
import router from './router';
import store from './store';
import 'flowbite';

import App  from './components/App.vue'

 window.axios.defaults.headers.common['Authorization'] = `Bearer ${store.getters.token}`



const app = createApp({});
app.component('app', App)

.use(router)
.use(store).mount('#app');

// createApp({Login}).use(router).mount('#app')

// createApp({Login}).use(router).mount('#app2')
// new Vue({
//     router,
//     store,
//     render: h => h(Login),
//   }).$mount('#app')
