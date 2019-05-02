<template>
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Editar Máquina</h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- Input addon -->
                    <div class="box box-info">
                        <div class="box-body">
                            <form method="post" ref="form" v-on:submit="onUpdate">
                                <!-- <form ref="form"> -->
                                <div class="form-group">
                                    <span class="form-group-addon">Máquina</span>
                                    <input
                                            class="form-control"
                                            id="name_machine"
                                            name="name_machine"
                                            type="text"
                                            v-model="formDataMEdit.name_machine"
                                            required
                                    >
                                </div>

                                <button class="btn btn-success">Alterar</button>
                            </form>
                            <div style="display:none;">{{ JSON.stringify(machineEdit) }}</div>
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
            formDataMEdit: {
                // id: "",
                name_machine: "",
                state: ""
            }
        }),
        computed: {
            machineEdit() {
                // this.formDataMEdit.id = store.state.machineEdit.dados.id;
                this.formDataMEdit.name_machine = store.state.machineEdit.dados.name_machine;
                return store.state.machineEdit.dados;
            }
        },
        created() {
            let id = this.$route.params.id;

            Axios.get(`http://control-status-back.herokuapp.com/public/api/machine/` + id + `/edit`).then(
                response => {
                    this.formDataMEdit.name_machine = response.data.name_machine;
                    this.formDataMEdit.id = response.data.id;
                }
            );
        },
        methods: {
            onUpdate: function (e) {
                store.dispatch("update-machine-api", this.formDataMEdit);
                this.$router.push('/machine');
                e.preventDefault();
            }
        }
    };
</script>
