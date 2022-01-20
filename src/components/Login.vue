<template>
<div class="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        
                            <div class="form-group">
                                <label for="phone" class="text-info">Login:</label><br>
                                <input type="text" name="login" id="login" class="form-control" v-model="login">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control" v-model="password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md w-100" value="Войти" @click="submiter()">
                            </div>
                            <div id="register-link" class="text-right">
                                <router-link to="/register">Регистрация</router-link>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
       <CheckToken :token=this.token /> 
    </div>
    
</template>
<script>
import CheckToken from '@/components/CheckToken.vue'
export default {
    name:"Login",
    data(){
        
        return{
            login:'',
            password:'',
            token:'',
        }
        

    },
    comments:{
       CheckToken
    },
    methods:{
        //   login(){
             
        //       },
        async submiter(){
            let data = {
                login: this.login,
                password: this.password,
                token:this.token // sending the option which was selected from dropdown
                
            };
          const response = await fetch("http://photoservice/public/api/login", {
            method: "POST",
            body:JSON.stringify(data),
            headers: {'Content-Type': 'application/json'},
            
          });
          if (response.ok) { // если HTTP-статус в диапазоне 200-299
            // получаем тело ответа (см. про этот метод ниже)
            let data = await response.json();
            console.log(data); 

            let {login,password,token}=this;
            token=data.token;
            this.$router.replace({name:'Profile',params:{login,password,token}});
          }
        
        }
    },
    
}

</script>