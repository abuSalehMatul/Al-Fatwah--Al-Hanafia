<template>
  <div>
      <div class="col-md-6" style="margin:10px; "> 
          <a href="/admin/add-book" class="btn btn-primary"> Add A book on the list </a>
      </div>
    <table class="table">
      <thead>
        <th>Title</th>
        <th>Writer</th>
        <th>Language</th>
        <th>Link</th>
        <th>Status</th>
      </thead>
      <tbody>
        <tr v-for="book in all_books">
          <td>{{book.title}}</td>
          <td><b>{{book.writer}}</b></td>
          <td>{{book.language}}</td>
          <td><a target="blank" :href="book.link">{{book.link}}</a></td>
          <td>
              <select v-model="book.status" @change="statusChange(book.status, book.id)"> 
                  <option value="active"> Active </option>
                  <option value="pending"> Pending </option>
                  <option value="deactive"> Deactive </option>
              </select>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import client from "@/client";
export default {
  name: "books",
  props: ["all_books"],
  components: {},
  mounted(){

  },
  data() {
    return {};
  },
  methods:{
      statusChange(status, id){
          client.get(window.location.origin + '/admin/api/change-book-status/'+id + "/"+status)
          .then(response => {
              if(response.data == 1){
                  alert('status Changed')
              }
          })
      }
  }
};
</script>

