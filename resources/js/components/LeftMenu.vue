<template>
    <div class="left-menu">
        <NavLink link="/gpu" text="Karty Graficzne"></NavLink>
        <NavLink link="#" text="Koparki"></NavLink>
        <NavLink link="#" text="Klienci"></NavLink>
        <NavLink link="#" text="Oferty"></NavLink>
    </div>
</template>

<script>
import NavLink from './NavLink.vue';


export default {
    name: "LeftMenu",
    data() {
        return {
            links: []
        };
    },
    components: { NavLink }
}

</script>

<style scoped>

.left-menu {
    width: 100%;
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: min-content;
    box-shadow: 1px 3px 3px rgb(0 0 0 / 50%);
}
</style>