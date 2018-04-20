require('./bootstrap');

window.Vue = require('vue');

// we get this cood to import vue router from 
// https://router.vuejs.org/en/essentials/getting-started.html
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter) 



// the name of file created in components folder which 
// is MyHeader and store it in new variable
let Myheader = require('./components/MyHeader.vue');

// the name of file created in components folder which 
// is MyFooter and store it in new variable
let Myfooter = require('./components/MyFooter.vue');

// because i want to switch between two routers i dont need to use the in app
let Home  = require('./components/Home.vue');
let About = require('./components/About.vue');
 
const routes = [
  { path: '/home', component : Home },
  { path: '/about', component: About },
 ]

const router = new VueRouter({
 // mode : 'history',  // i will ues it to remove # from our url
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    components:{Myheader,Myfooter}

});
