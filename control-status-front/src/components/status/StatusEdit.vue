<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Editar Status</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Input addon -->
          <div class="box box-info">
            <div class="box-body">
              <form ref="form" v-on:submit="onUpdateStatus" method="post">
                <!-- <form ref="form"> -->
                <div class="form-group">
                  <span class="form-group-addon">Status</span>
                  <input
                          type="text"
                          class="form-control"
                          id="name_status"
                          name="name_status"
                          v-model="formDataStEdit.name_status"
                          required
                  >
                </div>

                <button class="btn btn-success">Alterar</button>
              </form>
              <div style="display:none;">{{ JSON.stringify(statusUpdate) }}</div>
              <!-- /form-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
    </section>
  </div>
</template>

<script>
  import Axios from "axios";
  import jsonpAdapter from "axios-jsonp";
  import store from "../../store";

  export default {
    data: () => ({
      options: [],
      formDataStEdit: {
        // id: "",
        name_status: "",
        state: ""
      }
    }),
    computed: {
      statusUpdate() {
        // this.formDataStEdit.id = store.state.statusUpdate.dados.id;
        this.formDataStEdit.name_status = store.state.statusUpdate.dados.name_status;
        return store.state.statusUpdate.dados;
      }
    },
    created() {
      let id = this.$route.params.id;

      Axios.get(`http://control-status-back.herokuapp.com/public/api/status/` + id + `/edit`).then(
              response => {
                this.formDataStEdit.name_status = response.data.name_status;
                this.formDataStEdit.id = response.data.id;
              }
      );
    },
    methods: {
      onUpdateStatus: function(e) {
        store.dispatch("update-status-api", this.formDataStEdit);
        this.$router.push('/status');
        e.preventDefault();
      }
    }
  };
</script>
