<template>
    <div>
        <div class="container">
        <TopBar></TopBar>
        <LeftMenu></LeftMenu>
        <div class="workspace">
            <slot></slot>
        </div>
        </div>
    </div>
</template>

<script>
import LeftMenu from './LeftMenu.vue';
import TopBar from './TopBar.vue';

    export default {
    name: "App",
    components: { TopBar, LeftMenu }
}

</script>

<style scoped>

.container {
    width: 100%;
    height: 100vh;
    display: grid;
    grid-template-columns: 150px auto;
    grid-template-rows: 75px auto;
}

.workspace{
    position: relative;
    overflow-y: scroll;
    border: 1px solid #999;
    padding: 10px 0px 0px 10px;
}

</style>