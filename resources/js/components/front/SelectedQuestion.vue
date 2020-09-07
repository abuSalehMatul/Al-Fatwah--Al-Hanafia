<template>
  <div>
    <a :href="getQuestionLink(question)" v-for="question in selectedQuestion">
      <div class="card active">
        <div class="card-body">
          <div class="left-text">
            <i class="far fa-bookmark"></i>
            <span>
              {{question.description.substring(0, 100)}}...
            </span>
          </div>
        </div>
      </div>
    </a>
  </div>
</template>

<script>
import client from "@/client";
export default {
  name: "selected-question",
  components: {},
  mounted(){
      this.getList();
  },
  data() {
    return {
        selectedQuestion: ""
    };
  },
  methods: {
      getList(){
          client.get(window.location.origin + "/api/selected-question")
          .then(response => {
              this.selectedQuestion = response.data;
          })
      },
      getQuestionLink(question){
          return window.location.origin +"/"+ question.language+ "/get-question-answer/"+question.id;
      },
      
  }
};
</script>

