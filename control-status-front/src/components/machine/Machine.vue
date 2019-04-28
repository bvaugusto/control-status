<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Máquinas</h1>
    </section>
    <div class="box-header">
      <router-link :to="`/machine/create`">
        <button type="button" class="btn btn-primary pull-right">Novo</button>
      </router-link>
    </div>
    <vuetable ref="vuetable" api-url="http://127.0.0.1:8000/api/machine" :fields="fields">
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
        { name: "name_machine", title: "Máquina" },
        { name: "name_status", title: " Status" },
        "__slot:actions"
      ]
    };
  }
};
</script>


