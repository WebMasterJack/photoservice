<template>
    <div class="photo-update d-flex flex-column">
      <br>
      <h2>Изменить фотографию</h2>
        <input type="file" name="edit">
       <input type="text" placeholder="id" class="form-control" name="photo_id">
  
          <input type="submit" class="btn btn-info btn-md" value="Обновить" @click="edit">
        <div
      :key="componentKey"
      class="text-left"
      style="white-space: nowrap"
    >
      <template v-if="status">
        <h2 class="text-center text-success">Обновлено</h2>
        <p>ID:{{ this.update_id}}</p>
        <p>URL:{{ this.updates.image}}</p>
      </template>
      <template v-else> </template>
    </div>
    </div>
</template>
<script>
export default {
    name:"PhotoUpdate",
    
    data(){
        
        return{
           componentKey:0,
           update_id:'',
           status:false,
           updates:{
             datetime:'',
             image:''
           }
        }
        
    },
     methods:{
        edit(){
var input = document.querySelector('input[name="edit"]');
this.update_id = document.querySelector('input[name="photo_id"]').value;
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
.then(response => {
 if(response.ok){
   this.status=true;
    return response.json();
  }
})
  .then(commits => {
    let obj = Object.entries(commits); 

          this.updates = new Map(obj);
          this.updates=this.updates.get("post");

this.componentKey += 1;

  });
 
        }
        
    },
    props:["token"]
    
}
</script>