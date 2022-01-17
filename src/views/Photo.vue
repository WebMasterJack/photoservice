<template>
  <div class="photo">
    <PhotoSend />
    <input type="submit" class="btn btn-info btn-md" value="send" @click="send">
    <br>
    <PhotoUpdate />
    
    <input type="submit" class="btn btn-info btn-md" value="edit" @click="edit">
  </div>
</template>

<script>
// @ is an alias to /src
import PhotoSend from '@/components/PhotoSend.vue'
import PhotoUpdate from '@/components/PhotoUpdate.vue'

export default {
  name: 'Photo',
data(){
    console.log(this.token);
return{

}
},
  components: {
    PhotoSend,PhotoUpdate
  },
  methods:{
        send(){
         
  var input = document.querySelector('input[type="file"]')

var formData = new FormData()
formData.append('image', input.files[0])

fetch('http://photoservice/public/api/photo', {
  method: 'POST',
  headers: {
              'Accept': '*/*',
              'Authorization': 'Bearer ' + this.token
            
            },
  body: formData
})
.then(response => response.json())
  .then(commits => console.log(commits));

        },
        edit(){
var input = document.querySelector('input[name="edit"]')

var formData = new FormData()
formData.append('image', input.files[0]);
let photo_id = document.querySelector("input[type=text]").value;

fetch(`http://photoservice/public/api/photo/${photo_id}`, {
  method: 'POST',
  headers: {
              'Accept': '*/*',
              'Authorization': 'Bearer ' + this.token
            
            },
  body: formData
})
.then(response => response.json())
  .then(commits => console.log(commits.post));
        }
    },
  props:["token"]
}
</script>
