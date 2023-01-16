<template>
    <div class="top-bar">
        <img src="src/images/logo.png" alt="Auremis">
    </div>
</template>

<script>

export default {
    name: "TopBar"
}

</script>

<style scoped>
.top-bar {
    display: grid;
    grid-template-columns: 75px auto;
    box-shadow: 0px 3px 3px rgb(0 0 0 / 50%);
    grid-column: 1/3;
}

img {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    height: auto;
}

</style>