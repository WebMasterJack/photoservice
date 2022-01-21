<template>
    <div class="photo-delete d-flex flex-column">
        <br>
        <h2>Удалить фотографию</h2>
       <input type="text" placeholder="id" class="form-control" name="delete_photo_id">
          <input type="submit" class="btn btn-info btn-md" value="Удалить" @click="remove">
        <div
      :key="componentKey"
      class="text-left"
      style="white-space: nowrap"
    >
      <template v-if="status">
        <h2 class="text-center text-success">Удалено</h2>
      </template>
      <template v-else> </template>
    </div>
    </div>
</template>
<script>
export default {
    name:"PhotoDelete",
    data(){
        return{
          status:''
        }
    },
    methods:{
remove(){

var formData = new FormData()
let photo_id = document.querySelector("input[name=delete_photo_id]").value;

fetch(`http://photoservice/public/api/photo/${photo_id}`, {
  method: 'DELETE',
  headers: {
              'Accept': '*/*',
              'Authorization': 'Bearer ' + this.token
            
            },
  body: formData
})
.then(response => {
  if(response.ok){
   this.status=true;
    return response.json();
  }
})
  .then(commits => console.log(commits));
        
}
    },
    props:["token"]
}
</script>