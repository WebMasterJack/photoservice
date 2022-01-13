<template>
  <div class="profile">
    <Info />
  </div>
</template>

<script>
// @ is an alias to /src
import Info from '@/components/Info.vue'

export default {
  name: 'Profile',
  components: {
    Info
  }
}
</script>
