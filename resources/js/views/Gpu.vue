<template>
    <App>
        <CustomTable v-bind:keys="tableKeys" v-bind:values="gpus" @changeSorting="sortGpus"></CustomTable>
    </App>
</template>
<script>
import App from '../components/App.vue';
import CustomTable from '../components/CustomTable.vue';

export default {
    name: "Gpu",
    components: { App, CustomTable },
    data() {
        return {
            filters: {
                priceMin: null,
                priceMax: null,
                name: null,
                hashrateMin: null,
                hashrateMax: null
            },
            gpus: [],
            editor: false,
            tableKeys: [
                {name: "nazwa", key: "name", sortable: true},
                {name: "cena", key: "price", sortable: true},
                {name: "minimalny hashrate", key: "hashrateMin", sortable: true},
                {name: "maksymalny hashrate", key: "hashrateMax", sortable: true},
                {name: "minimany pobór mocy", key: "powerMin", sortable: true},
                {name: "maksymalny pobór mocy", key: "powerMax", sortable: true},
            ],
            refreshKeys: {
                table: 1
            }
        }
    },
    methods: {
        getGpus() {
            fetch('api/gpu')
                .then(response => response.json())
                .then(data => {
                    this.gpus = data;
                    this.refreshKeys.table ++;
                })
                .catch(error => console.log(error))
        },
        sortGpus(key, direction) {
            console.log(direction);
                this.gpus.sort((prev, next) => {
                    if(direction === "asc") return prev[key] - next[key];
                    return (prev[key] - next[key]) * -1;
                })
                this.refreshKeys.table ++;
        }
    },
    created() {
        this.getGpus()
    }
}
</script>
<style scoped>
</style>