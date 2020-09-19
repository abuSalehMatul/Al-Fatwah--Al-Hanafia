<template>
    <div class="col-md-10 ad-search-div">
       <div class="col-md-4">
            <select class="form-control" @change="search()" v-model="selectType"> 
                <option value="id">By Id </option>
                <option value="title"> By Title </option>
                <option value="status"> By Status </option>
            </select>
       </div>
       <div class="col-md-8"> 
           <input type="text" v-model="key" @keyup="search()" class="form-control">
       </div>
    </div>
</template>

<script>
    import client from '@/client'
    export default {
        name: "admin-search",
        components: {

        },
        data() {
            return {
                selectType: 'id',
                key: ""
            }
        },
        methods:{
            search(){
                
            }
        }
    }
</script>
<style scoped>
.ad-search-div{
    position: relative;
    right: 100%;
}
</style>

