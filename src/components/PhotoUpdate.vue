<template>
    <div class="photo-update d-flex flex-column">
      <br>
      <h2>Изменить фотографию</h2>
        <input type="file" name="edit">
       <input type="text" placeholder="id" class="form-control" name="photo_id">
  
          <input type="submit" class="btn btn-info btn-md" value="Обновить" @click="edit">
        
    </div>
</template>
<script>
export default {
    name:"PhotoUpdate",
    
    data(){
        
        return{
           
        }
        
    },
     methods:{
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