<template>
<div class="search">
    <SearchForm :token=this.token />
</div>
</template>
<script>
import SearchForm from '@/components/SearchForm.vue'
//import Check from '@/components/Check.vue'
export default {
    name:"Search",
    data(){
        console.log("search ->",this.token);
        return{
            
        }
    },
    components: {
    SearchForm,//Check
  },
  props:["token"]

}
</script>