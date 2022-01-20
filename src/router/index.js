import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Profile from '../views/Profile.vue'
import Register from '../views/Register.vue'
import Photo from '../views/Photo.vue'
import Search from '../views/Search.vue'

Vue.use(VueRouter)
const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    props:true
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile,
    props:true
  },
  {
    path: '/register',
    name: 'Register',
    component: Register,
    props:true
  },
  {
    path: '/photo',
    name: 'Photo',
    component: Photo,
    props:true
  },
  {
    path: '/user',
    name: 'Search',
    component: Search,
    props:true
  }
 

  
]

const router = new VueRouter({
  routes
})

export default router
