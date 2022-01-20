<template>
  <div class="profile">
    <Info />

    <p>Ваш API token = {{user_token}}</p>
    <div class="container">
      <div class="inputs d-flex justify-content-center flex-column ">
      <div class="form-group">
        <input type="submit" class="btn btn-info btn-md w-50" value="Фото" @click="photo()">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-info btn-md w-50" value="Пользователи" @click="users()">
      </div>
      <div class="form-group">
        
        <input type="submit" name="submit" class="btn btn-info btn-md w-50" value="Выйти" @click="logout()">
      </div>

    </div>
    </div>
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
    Info,
  },
  methods:{
    photo(){
      let token=this.user_token;
      
    this.$router.replace({name:'Photo',params:{token}});
    },
    users(){
      let token=this.user_token;
      
    this.$router.replace({name:'Search',params:{token}});
    },
    async logout(){
       let data = {
                user_token:this.token // sending the option which was selected from dropdown
                
            };
          const response = await fetch("http://photoservice/public/api/logout", {
            method: "POST",
            body:JSON.stringify(data),
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer ' + this.user_token
            
            },
            
          });
          if (response.ok) { // если HTTP-статус в диапазоне 200-299
            console.log("UnAuth complete");
            this.$router.replace({name:'Home'});
          }
    }
    
  },
  props:["token"]
}
</script>
