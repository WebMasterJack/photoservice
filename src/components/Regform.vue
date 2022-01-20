<template>
    <div class="regform  w-25">
        <div class="form-group ">
                                <label for="phone" class="text-info">Login:</label><br>
                                <input type="text" name="login" id="login" class="form-control" v-model="login">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control" v-model="password">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">First Name:</label><br>
                                <input type="text" name="password" id="password" class="form-control" v-model="first_name">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Surname:</label><br>
                                <input type="text" name="password" id="password" class="form-control" v-model="surname">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md w-100" value="Зарегистрироваться" @click="register()">
                            </div>
                            <div id="register-link" class="text-right">
                                <router-link to="/">Войти</router-link>
                            </div>
    </div>
</template>
<script>
export default {
    name:'Regform',
    data(){
        return{
            login:'',
            password:'',
            first_name:'',
            surname:'',
            token:''
        }
    },
    methods:{
        async register(){
            let data = {
                login: this.login,
                password: this.password,
                first_name: this.first_name,
                surname: this.surname,
                token:this.token // sending the option which was selected from dropdown
                
            };
          const response = await fetch("http://photoservice/public/api/signup", {
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
            this.$router.replace({name:'Home',params:{login,password,token}});
          }
        
        }
    }

}
</script>