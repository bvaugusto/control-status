<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Status</h1>
      <div class="box-header">
        <router-link :to="`/status/create`">
          <button type="button" class="btn btn-primary pull-right">Novo</button>
        </router-link>
      </div>
    </section>
    <vuetable ref="vuetable" api-url="http://127.0.0.1:8000/api/status" :fields="fields">
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
      fields: [{ name: "name_status", title: " Status" }, "__slot:actions"]
    };
  }
};
</script>


