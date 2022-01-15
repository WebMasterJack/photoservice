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
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit" @click="submiter()">
                            </div>
                            <div id="register-link" class="text-right">
                                <router-link to="/">Log In</router-link>
                            </div>
    </div>
</template>
<script>
export default {
    name:'Regform',
}
</script>