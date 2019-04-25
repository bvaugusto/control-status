<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Editar Empresa</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Input addon -->
          <div class="box box-info">
            <div class="box-body">
              <form ref="form" v-on:submit="onUpdate" method="post">
                <!-- <form ref="form"> -->
                <div class="form-group">
                  <span class="form-group-addon">CNPJ</span>
                  <input
                    type="text"
                    class="form-control"
                    id="cnpj"
                    name="cnpj"
                    v-model="formData.cnpj"
                    disabled
                  >
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <span class="form-group-addon">Razão Social</span>
                      <input
                        type="text"
                        class="form-control"
                        id="social_name"
                        name="social_name"
                        v-model="formData.social_name"
                      >
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <span class="form-group-addon">Nome Fantasia</span>
                      <input
                        type="text"
                        class="form-control"
                        id="fantasy_name"
                        name="fantasy_name"
                        v-model="formData.fantasy_name"
                      >
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <span class="form-group-addon">Telefone</span>
                      <input
                        type="text"
                        class="form-control"
                        id="telephone"
                        name="telephone"
                        v-model="formData.telephone"
                      >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <span class="form-group-addon">Inscrição Municipal</span>
                      <input
                        type="text"
                        class="form-control"
                        id="municipal_registration"
                        name="municipal_registration"
                        v-model="formData.municipal_registration"
                      >
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <span class="form-group-addon">Inscrição Estadual</span>
                      <input
                        type="text"
                        class="form-control"
                        id="state_registration"
                        name="state_registration"
                        v-model="formData.state_registration"
                      >
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <span class="form-group-addon">Segmento</span>
                      <select v-model="formData.id_segment" class="form-control">
                        <option
                          v-for="optoin in options"
                          v-bind:value="optoin.id"
                        >{{optoin.dsc_segment}}</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <span class="form-group-addon">E-mail</span>
                      <input
                        type="text"
                        class="form-control"
                        id="mail"
                        name="mail"
                        v-model="formData.mail"
                      >
                    </div>
                  </div>
                </div>

                <h4>Endereço</h4>

                <div class="form-group">
                  <span class="form-group-addon">CEP</span>
                  <input
                    type="text"
                    class="form-control"
                    id="cep"
                    name="cep"
                    v-model="formData.cep"
                  >
                </div>

                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <span class="form-group-addon">Logradouro</span>
                      <input
                        type="text"
                        class="form-control"
                        id="public_place"
                        name="public_place"
                        v-model="formData.public_place"
                      >
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <span class="form-group-addon">Número</span>
                      <input
                        type="text"
                        class="form-control"
                        id="number"
                        name="number"
                        v-model="formData.number"
                      >
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <span class="form-group-addon">Complemento</span>
                      <input
                        type="text"
                        class="form-control"
                        id="complement"
                        name="complement"
                        v-model="formData.complement"
                      >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <span class="form-group-addon">Bairro</span>
                      <input
                        type="text"
                        class="form-control"
                        id="neightborhood"
                        name="neightborhood"
                        v-model="formData.neightborhood"
                      >
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <span class="form-group-addon">Cidade</span>
                      <input
                        type="text"
                        class="form-control"
                        id="city"
                        name="city"
                        v-model="formData.city"
                      >
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <span class="form-group-addon">Estado</span>
                      <input
                        type="text"
                        class="form-control"
                        id="state"
                        name="state"
                        v-model="formData.state"
                      >
                    </div>
                  </div>
                </div>
                <button class="btn btn-success">Alterar</button>
              </form>
              <div style="display:none;">{{ JSON.stringify(organizacao) }}</div>
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
import store from "../store";

export default {
  data: () => ({
    options: [],
    formData: {
      id: "",
      id_address: "",
      cnpj: "",
      id_segment: "",
      social_name: "",
      fantasy_name: "",
      municipal_registration: "",
      state_registration: "",
      cep: "",
      public_place: "",
      number: "",
      telephone: "",
      mail: "",
      complement: "",
      neightborhood: "",
      city: "",
      state: ""
    }
  }),
  computed: {
    organizacao() {
      this.formData.id = store.state.organizacao.dados.id;
      this.formData.id_address = store.state.organizacao.dados.id_address;
      this.formData.cnpj = store.state.organizacao.dados.cnpj;
      this.formData.social_name = store.state.organizacao.dados.nome;
      this.formData.cep = store.state.organizacao.dados.cep;
      this.formData.public_place = store.state.organizacao.dados.logradouro;
      this.formData.number = store.state.organizacao.dados.number;
      this.formData.telephone = store.state.organizacao.dados.telefone;
      this.formData.mail = store.state.organizacao.dados.email;
      this.formData.complement = store.state.organizacao.dados.complemento;
      this.formData.neightborhood = store.state.organizacao.dados.bairro;
      this.formData.city = store.state.organizacao.dados.municipio;
      this.formData.state = store.state.organizacao.dados.uf;
      this.formData.fantasy_name = store.state.organizacao.dados.fantasy_name;
      this.formData.id_segment = store.state.organizacao.dados.id_segment;
      this.formData.municipal_registration =
        store.state.organizacao.dados.municipal_registration;
      this.formData.state_registration =
        store.state.organizacao.dados.state_registration;

      return store.state.organizacao.dados;
    },
    cnpj() {
      return this.formData.cnpj;
    }
  },
  created() {
    let id = this.$route.params.id;

    Axios.get(`http://127.0.0.1:8000/api/segment`)
      .then(response => {
        this.options = response.data;
      })
      .catch(e => {
        this.errors.push(e);
      });

    Axios.get(`http://127.0.0.1:8000/api/company/` + id + `/edit`).then(
      response => {
        this.formData.cnpj = response.data.company.cnpj;
        this.formData.id = response.data.company.id;
        this.formData.id_address = response.data.company.id_address;
        this.formData.social_name = response.data.company.social_name;
        this.formData.fantasy_name = response.data.company.fantasy_name;
        this.formData.id_segment = response.data.company.id_segment;
        this.formData.municipal_registration =
          response.data.company.municipal_registration;
        this.formData.state_registration =
          response.data.company.state_registration;
        this.formData.cep = response.data.address.cep;
        this.formData.public_place = response.data.address.public_place;
        this.formData.number = response.data.address.number;
        this.formData.telephone = response.data.address.telephone;
        this.formData.mail = response.data.company.mail;
        this.formData.complement = response.data.address.complement;
        this.formData.neightborhood = response.data.address.neightborhood;
        this.formData.city = response.data.address.city;
        this.formData.state = response.data.address.state;
      }
    );
  },
  methods: {
    onUpdate: function(e) {
      store.dispatch("update-info-api", this.formData);
      e.preventDefault();
    }
  }
};
</script>
