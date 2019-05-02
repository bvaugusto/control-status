<template>
  <div>
    <section class="content-header">
      <h1>Máquina</h1>
      <div class="box-header">
        <router-link :to="`/machine/create`">
          <button type="button" class="btn btn-primary pull-right">Novo</button>
        </router-link>
      </div>
    </section>
    <vuetable ref="vuetable" api-url="http://control-status-back.herokuapp.com/public/api/machine" :fields="fields">
      <template slot="actions" slot-scope="props">
        <div class="table-button-container">
          <i class="fa fa-edit" @click="editRow(props.rowData)" style="cursor: pointer;"></i>
          <i class="fa fa-remove" @click="deleteRow(props.rowData)" style="cursor: pointer;"></i>
        </div>
      </template>
    </vuetable>
  </div>
</template>

<script>
  import Vue from "vue";
  import Axios from "axios";
  import Vuetable from "vuetable-2";
  Vue.use(Vuetable);
  Vue.component("vuetable", Vuetable);

  export default {
    data() {
      return {
        components: {
          "vuetable-pagination": Vuetable.VuetablePagination
        },
        fields: [{ name: "name_machine", title: " Máquina" }, "__slot:actions"]
      };
    },
    methods: {
      editRow(rowData)
      {
        this.$router.push('/machine/' + rowData.id + '/edit');
      },
      deleteRow(rowData) {
        Axios.delete("http://control-status-back.herokuapp.com/public/api/machine/" + rowData.id).then(
                function(response) {
                  Vue.toasted.show(response.data.message).goAway(2000);
                  setTimeout(function() {
                    window.history.go();
                  }, 2000);
                }
        );
      }
    }
  };
</script>


