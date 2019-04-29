<template>
    <div>
        <section class="content-header">
            <h1>Simulador</h1>
            <div class="box-header">
                <router-link :to="`/simulator/create`">
                    <button type="button" class="btn btn-primary pull-right">Novo</button>
                </router-link>
            </div>
        </section>
        <vuetable ref="vuetable" api-url="http://127.0.0.1:8000/api/simulator" :fields="fields">
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
                fields: [{ name: "minutes", title: " Tempo" }, "__slot:actions"]
            };
        },
        methods: {
            editRow(rowData)
            {
                this.$router.push('/simulator/' + rowData.id + '/edit');
            },
            deleteRow(rowData) {
                Axios.delete("http://127.0.0.1:8000/api/simulator/" + rowData.id).then(
                    function(response) {
                        Vue.toasted.show(response.data.message).goAway(3000);
                        setTimeout(function() {
                            window.history.go();
                        }, 2000);
                    }
                );
            }
        }
    };
</script>


