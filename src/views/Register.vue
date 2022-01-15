<template>
  <div class="register d-flex justify-content-center align-items-center">
    <Regform />
  </div>
</template>

<script>
// @ is an alias to /src
import Regform from '@/components/Regform.vue'

export default {
  name: 'Register',
  components: {
    Regform
  }
}
</script>