<template>
  <div>
    <section class="content-header">
      <h1>Listagem Maquina/Status </h1>
    </section>
    <vuetable ref="vuetable" api-url="http://127.0.0.1:8000/api/eventmachine" :fields="fields"></vuetable>
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
        fields: [{ name: "name_machine", title: " Máquina" }, { name: "name_status", title: " Status" }, "__slot:actions"]
      };
    }
  };
</script>


