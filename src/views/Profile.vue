<template>
  <div class="profile">
    <Info />
    <p>Ваш API token = {{user_token}}</p>
  </div>
</template>

<script>
// @ is an alias to /src
import Info from '@/components/Info.vue'

export default {
  name: 'Profile',
  data(){
    console.log(this.token);
    return{
      user_token:this.token
    }
  },
  components: {
    Info
  },
  props:["token"]
}
</script>
