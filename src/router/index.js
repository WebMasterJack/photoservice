import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Profile from '../views/Profile.vue'
import Register from '../views/Register.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    props:true
  },
  {
    path: '/',
    name: 'Profile',
    component: Profile,
    props:true
  },
  {
    path: '/register',
    name: 'Register',
    component: Register,
    props:true
  }
  
]

const router = new VueRouter({
  routes
})

export default router
