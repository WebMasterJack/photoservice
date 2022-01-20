<template>
    <div class="token" :key='CheckRender'>
        Check => {{this.token}}

    </div>
</template>
<script>
export default {
    name:"CheckToken",
    props:["token"],
    data() {
        return {
            CheckRender:0
        }
    },

}
function checkToken(){
    const host = window.location.origin;
    const href = window.location.href;
        if((this.token === undefined) && (href !=host + '/#/') && (href !=host + '/#/register')){
            window.location.href = '/';
            
            
        }
        this.CheckRender++;
        
    }
setTimeout(checkToken, 100);
</script>