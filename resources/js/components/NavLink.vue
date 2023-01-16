<template lang="">
    <div class="nav-link">
        <a :href="link">{{text}}</a>
    </div>
</template>
<script>
export default {
    name: "NavLink",
    props: {
        link: {type: String},
        text: {type: String}
    }
}
</script>
<style scoped>
    .nav-link {
        border-bottom: 1px solid #999;
        margin: 10px;
    font-size: 16px;
    line-height: 28px;
    text-align: center;
    }

    a {
        text-decoration: none;
        color: #000;
    }
</style>