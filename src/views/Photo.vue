<template>
  <div class="photo d-flex flex-column w-50">
    <div class="container">
    <PhotoList :token=this.token />

    <PhotoSend :token=this.token />
   
    <PhotoUpdate :token=this.token />

    <PhotoDelete :token=this.token />
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import PhotoSend from '@/components/PhotoSend.vue'
import PhotoUpdate from '@/components/PhotoUpdate.vue'
import PhotoList from '@/components/PhotoList.vue'
import PhotoDelete from '@/components/PhotoDelete.vue'


export default {
  name: 'Photo',
data(){
    console.log(this.token);
return{

}
},
  components: {
    PhotoSend,PhotoUpdate,PhotoList,PhotoDelete
  },
  
  props:["token"]
}

</script>

