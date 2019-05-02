<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Cadastro Status</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Input addon -->
          <div class="box box-info">
            <div class="box-body">
              <form ref="form" v-on:submit="onSubmitStatus" method="post">
                <div class="form-group">
                  <span class="form-group-addon">Status</span>
                  <input
                          type="text"
                          class="form-control"
                          id="name_status"
                          name="name_status"
                          v-model="formDataStCreate.name_status"
                          required
                  >
                </div>

                <button class="btn btn-success">Cadastrar</button>
              </form>
              <div style="display:none;">{{ JSON.stringify(statusCreate) }}</div>
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
      formDataStCreate: {
        name_status: "",
        state: ""
      }
    }),
    computed: {
      statusCreate() {
        this.formDataStCreate.cnpj = store.state.statusCreate.dados.name_status;
        return store.state.statusCreate.dados;
      }
    },
    created() {},
    watch: {},
    methods: {
      onSubmitStatus: function(e) {
        store.dispatch("post-status-api", this.formDataStCreate);
        this.$router.push('/status');
        e.preventDefault();
      }
    }
  };
</script>
