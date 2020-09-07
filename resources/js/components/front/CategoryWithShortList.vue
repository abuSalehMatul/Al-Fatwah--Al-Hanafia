<template>
    <div>
       <div class="row mt-5">
        <div v-for="category in categories" class="col-md-3">
          <a :href="getCategoryHref(category.id)">
            <div class="first_section mb-3">
              <h4>{{category.name}}</h4>
            </div>
          </a>
        </div>
      </div>
      <category-questions :categories = "categories" :app_local="app_local"></category-questions>
    </div>
</template>

<script>
    import client from '@/client';
    import CategoryQuestions from "./CategoryQuestions.vue";
    export default {
        name: "category-with-short-list",
        components: {
            CategoryQuestions
        },
        props: ['app_local'],
        mounted(){
            this.getCategory();
        },
        data() {
            return {
                categories: '',
                names: [],
                parent_id: []
            }
        },
        methods:{
            getCategory(){
                client.get(window.location.origin + '/api/get-category')
                .then(response =>{
                    this.categories = response.data;
                    console.log(response)
                })
            },
            getCategoryHref(id){
                return window.location.origin + "/"+this.app_local + "/category/" + id;
            }
        }
    }
</script>

