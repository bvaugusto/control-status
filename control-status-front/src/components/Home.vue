<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Empresas</h1>
    </section>
    <vuetable ref="vuetable" api-url="http://127.0.0.1:8000/api/company" :fields="fields">
      <template slot="actions" slot-scope="props">
        <div class="table-button-container">
          <button class="ui button" @click="editRow(props.rowData)">
            <i class="fa fa-edit"></i> Edit
          </button>&nbsp;&nbsp;
          <button class="ui basic red button" @click="deleteRow(props.rowData)">
            <i class="fa fa-remove"></i> Delete
          </button>&nbsp;&nbsp;
        </div>
      </template>
    </vuetable>
  </div>
</template>

<script>
import Vue from "vue";
import Axios from "axios";
// import jsonpAdapter from "axios-jsonp";
import Vuetable from "vuetable-2";
Vue.use(Vuetable);
Vue.component("vuetable", Vuetable);

export default {
  data() {
    return {
      company: [],
      errors: [],
      components: {
        "vuetable-pagination": Vuetable.VuetablePagination
      },
      fields: [
        { name: "social_name", title: "Nome Social" },
        { name: "cnpj", title: " CNPJ" },
        { name: "mail", title: " E-mail" },
        "__slot:actions"
      ]
    };
  },
  methods: {
    editRow(rowData) {
      window.location.href = "/organizacao/" + rowData.id + "/edit";
    },
    deleteRow(rowData) {
      Axios.delete("http://127.0.0.1:8000/api/company/" + rowData.id).then(
        function(response) {
          Vue.toasted.show(response.data.message).goAway(3000);
          setTimeout(function() {
            window.location.href = "/";
            this.splice(rowData.id, 1);
          }, 2000);
        }
      );
    }
  }
};
</script>


