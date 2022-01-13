<template>
<div class="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        
                            <div class="form-group">
                                <label for="phone" class="text-info">Phone:</label><br>
                                <input type="text" name="phone" id="phone" class="form-control" v-model="phone">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control" v-model="password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit" v-on:click="submiter()">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"Login",
    data(){
        
        return{
            phone:'',
            password:''
        }
        

    },
    methods:{
        //   login(){
             
        //       },
        async submiter(){
let response = await fetch('http://cran/public/api/login', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  mode: 'no-cors',
  body:JSON.stringify({
  "phone": this.phone,
  "password": this.password
})
  
});

let data = await response.json();
console.log(data);
//  this.$router.replace({ path: '/profile'});
        }
    }
}
</script>