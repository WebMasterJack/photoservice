<template>
    <div class="photo-send ">
       <input type="file" id="file">
        
        
    </div>
</template>
<script>
export default {
    name:"PhotoSend",
    
    data(){
        
        return{
            user_token:this.token,
            id:'',
            url:''
        }
        
    },
    
    
}
</script>