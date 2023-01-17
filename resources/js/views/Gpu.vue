<template>
    <App>
        <CustomFilters :filters="filters" @filtersApplied="getFilteredGpus"></CustomFilters>
        <CustomTable v-bind:keys="tableKeys" v-bind:values="gpus" @changeSorting="sortGpus" :key="refreshKeys.table">
        </CustomTable>
        <CustomForm v-bind:formInputs="formInputs" v-bind:formData="formData" @formApplied="saveGpu"></CustomForm>
    </App>
</template>
<script>
import App from '../components/App.vue';
import CustomFilters from '../components/CustomFilters.vue';
import CustomForm from '../components/CustomForm.vue';
import CustomTable from '../components/CustomTable.vue';

export default {
    name: "Gpu",
    components: { App, CustomTable, CustomFilters, CustomForm },
    data() {
        return {
            filters: {
                priceMin: { type: "number", label: "cena od" },
                priceMax: { type: "number", label: "cena do" },
                name: { type: "text", label: "nazwa" },
                hashrateMin: { type: "number", label: "hashrate od" },
                hashrateMax: { type: "number", label: "hashrate do" }
            },
            formInputs: {
                name: { type: "text", label: "nazwa" },
                price: { type: "number", label: "cena" },
                hashrateMin: { type: "number", label: "hashrate minimalny" },
                hashrateMax: { type: "number", label: "hashrate maksymalny" },
                powerMin: { type: "number", label: "minimalny pobór mocy" },
                powerMax: { type: "number", label: "maksymalny pobór mocy" }
            },
            gpus: [],
            editor: false,
            tableKeys: [
                { name: "nazwa", key: "name", sortable: true },
                { name: "cena", key: "price", sortable: true },
                { name: "minimalny hashrate", key: "hashrateMin", sortable: true },
                { name: "maksymalny hashrate", key: "hashrateMax", sortable: true },
                { name: "minimany pobór mocy", key: "powerMin", sortable: true },
                { name: "maksymalny pobór mocy", key: "powerMax", sortable: true },
            ],
            refreshKeys: {
                table: 1
            },
            formData: {},
        }
    },
    methods: {
        getGpus() {
            fetch('api/gpu')
                .then(response => response.json())
                .then(data => {
                    this.gpus = data;
                })
                .catch(error => console.log(error))
        },
        sortGpus(key, direction) {
            this.gpus.sort((prev, next) => {
                if (direction === "asc") return prev[key] < next[key] ? -1 : 1;
                return prev[key] > next[key] ? -1 : 1;
            })
        },
        getFilteredGpus(filtersData) {
            fetch(`api/gpu/filtered?${this.makeQueryString(filtersData)}`)
                .then(response => response.json())
                .then(data => {
                    this.gpus = data;
                    this.refreshKeys.table++;
                })
                .catch(error => console.log(error))

        },
        makeQueryString(params) {
            return Object.keys(params).filter(key => params[key] !== null).map(key => key + '=' + params[key]).join('&');
        },
        saveGpu(formData) {
            fetch('api/gpu/add', {
                method: 'POST',
                body: this.getFormData(formData),
            })
            .then(() => this.getGpus())
        },
        getFormData(object) {
            const formData = new FormData();
            Object.keys(object).forEach(key => formData.append(key, object[key]));
            return formData;
        }
    },
    created() {
        this.getGpus()
    }
}
</script>
<style scoped>

</style>