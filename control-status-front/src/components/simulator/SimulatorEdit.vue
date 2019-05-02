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
                            <form ref="form" v-on:submit="onUpdateSimulator" method="post">
                                <!-- <form ref="form"> -->
                                <div class="form-group">
                                    <span class="form-group-addon">Minutos</span>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="minutes"
                                            name="minutes"
                                            v-model="formDataSEdit.minutes"
                                            required
                                    >
                                </div>

                                <button class="btn btn-success">Alterar</button>
                            </form>
                            <div style="display:none;">{{ JSON.stringify(simulatorEdit) }}</div>
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
            formDataSEdit: {
                // id: "",
                minutes: "",
                state: ""
            }
        }),
        computed: {
            simulatorEdit() {
                // this.formDataSEdit.id = store.state.simulatorEdit.dados.id;
                this.formDataSEdit.minutes = store.state.simulatorEdit.dados.minutes;
                return store.state.simulatorEdit.dados;
            }
        },
        created() {
            let id = this.$route.params.id;

            Axios.get(`https://control-status-back.herokuapp.com/public/api/simulator/` + id + `/edit`).then(
                response => {
                    this.formDataSEdit.minutes = response.data.minutes;
                    this.formDataSEdit.id = response.data.id;
                }
            );
        },
        methods: {
            onUpdateSimulator: function(e) {
                store.dispatch("update-simulator-api", this.formDataSEdit);
                this.$router.push('/simulator');
                e.preventDefault();
            }
        }
    };
</script>
