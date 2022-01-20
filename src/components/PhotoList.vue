<template>
    <div class="photo-list d-flex flex-column mb-5">
        <h2>Показать все фотографии</h2>
        
        <div class="all-photos row row-cols-1 row-cols-md-3" >
         <img v-for="photo  in photos.image" :key="photo" :src=photo alt="">
        </div>
       
        <input type="submit" class="btn btn-info btn-md" value="Показать" @click="photolist">
        
    </div>

</template>
<script>
export default {
    name:"PhotoList",
    data(){
       console.log("token ->",this.token);
      
        return{
            photos:{
                image:[]
            }
        }
    },
    methods:{
        photolist(){
           
            fetch('http://photoservice/public/api/photo', {
                
  method: 'GET',
  headers: {
             'Content-Type': 'application/json',
              'Authorization': 'Bearer ' + this.token
            },
  
})
.then(response => response.json())
  .then((commits) =>{
      this.photos.image=Array.from(commits).map((val)=>{return val.image});
    //   console.log(this.image[0]);
    
  } );


        },
  
        
    },
    props:["token"]
}
</script>