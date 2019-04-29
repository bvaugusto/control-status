<template>
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Cadastro Máquina</h1>
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
                                    <span class="form-group-addon">Máquina</span>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="name_machine"
                                            name="name_machine"
                                            v-model="formData.name_machine"
                                    >
                                </div>

                                <button class="btn btn-success">Cadastrar</button>
                            </form>
                            <div style="display:none;">{{ JSON.stringify(machineCreate) }}</div>
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
            formData: {
                name_machine: "",
                state: ""
            }
        }),
        computed: {
            machineCreate() {
                this.formData.name_machine = store.state.machineCreate.dados.name_machine;
                return store.state.machineCreate.dados;
            }
        },
        created() {},
        watch: {},
        methods: {
            onSubmit: function(e) {
                store.dispatch("post-info-api", this.formData);
                this.$router.push('/machine');
                e.preventDefault();
            }
        }
    };
</script>
