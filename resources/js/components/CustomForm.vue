<template>
    <div class="custom-form floating-tile">
        <div class="custom-form-inputs" :key="formInputs">
            <div class="custom-form-input-container" v-for="input, key in formInputs">
                <label>{{ input.label }}</label> <br>
                <input type="text" v-model="newData[key]" v-if="input.type === 'text'">
                <input type="number" v-model="newData[key]" v-if="input.type === 'number'">
            </div>
        </div>
            <div class="custom-form-button-container">
                <button @click="applyform">zapisz</button>
            </div>
    </div>
</template>
<script>
export default {
    name: 'CustomForm',
    props: {
        formData: {type: Object},
        formInputs: {type: Object},
    },
    data() {
        return {
            newData: {}
        }
    },
    methods: {
        populateFormData() {
            for(const [key, value] of Object.entries(this.formData)) {
                this.newData[key] = value;
            }
        },
        applyform() {
            this.$emit('formApplied', this.newData)
        }
    },
    created() {
        this.populateFormData();
    }
}

</script>
<style scoped>
.custom-form {
    display: grid;  
    grid-template-columns: 100%;
    text-align: center;
    grid-row-gap: 20px;
    padding: 10px;
}

.custom-form-inputs {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, max-content));
    grid-row-gap: 10px;
}

.custom-form-input-container {
    position: relative;
}

.custom-form-button-container {
    width: 100%;
}
</style>