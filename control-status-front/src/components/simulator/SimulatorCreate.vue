<template>
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Cadastro Simulador</h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- Input addon -->
                    <div class="box box-info">
                        <div class="box-body">
                            <form ref="form" v-on:submit="onSubmit" method="post">
                                <div class="form-group">
                                    <span class="form-group-addon">Minutos</span>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="minutes"
                                            name="minutes"
                                            v-model="formDataSCreate.minutes"
                                    >
                                </div>

                                <button class="btn btn-success">Cadastrar</button>
                            </form>
                            <div style="display:none;">{{ JSON.stringify(simulatorCreate) }}</div>
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
            formDataSCreate: {
                minutes: "",
                state: ""
            }
        }),
        computed: {
            simulatorCreate() {
                this.formDataSCreate.cnpj = store.state.simulatorCreate.dados.minutes;
                return store.state.simulatorCreate.dados;
            }
        },
        created() {},
        watch: {},
        methods: {
            onSubmit: function(e) {
                store.dispatch("post-info-api", this.formDataSCreate);
                this.$router.push('/simulator');
                e.preventDefault();
            }
        }
    };
</script>
