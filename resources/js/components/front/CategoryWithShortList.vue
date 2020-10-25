<template>
  <div>
    <div class="row">
      <div class="row mt-5 col-md-6">
        <div v-for="category in categories" class="col-md-3">
          <a class="col-md-12" :href="getCategoryHref(category.id)">
            <div>
              <h4 class="box">{{category.name}}</h4>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-6" style="margin-top:4%">
        <a class="col-md-12" v-for="( media, index) in medias" v-if="index<10" :href="media.url">
          <div class="row">
            <div class="col-md-5">
              <video width="100%" height="55" poster="placeholder.png" controls>
                <source :src="media.url" type="video/mp4" />
              </video>
            </div>
            <div class="col-md-7">
              <h5 style="text-align:left;color:black">{{media.title}}</h5>
            </div>
          </div>
        </a>
        <a :href="getAllMediaLink()" style="float: right; color: #ed174b; font-weight: 600;">{{see}}</a>
      </div>
    </div>
    <!-- <category-questions :categories="categories" :app_local="app_local"></category-questions> -->
  </div>
</template>

<script>
import client from "@/client";
import CategoryQuestions from "./CategoryQuestions.vue";
export default {
  name: "category-with-short-list",
  components: {
    CategoryQuestions
  },
  props: ["app_local"],
  mounted() {
    if(this.app_local == "ar"){
        this.see = 'اظهار الكل';
    }
    else if(this.app_local == "bn"){
        this.see = 'সবগুলো দেখ'
    }
    this.getCategory();
    this.getMedia();
  },
  data() {
    return {
      categories: "",
      see: "See All",
      names: [],
      medias: "",
      parent_id: []
    };
  },
  methods: {
    getMedia() {
      client
        .get(window.location.origin + "/api/get-media-show/"+this.app_local)
        .then(response => {
          this.medias = response.data.data;
        });
    },
    getCategory() {
      client
        .get(window.location.origin + "/api/get-category")
        .then(response => {
          this.categories = response.data;
          console.log(response);
        });
    },
    getCategoryHref(id) {
      return window.location.origin + "/" + this.app_local + "/category/" + id;
    },
    getAllMediaLink(){
        return window.location.origin + "/"+ this.app_local + "/all-media"
    }
  }
};
</script>

<style scoped>
.box:hover {
  background: #ed174b;
  color: white;
  font-weight: 800;
  padding: 10px;
  font-family: cursive;
}
</style>
