<template>
    <div class="content-container">
        <projects-list />
    </div>
</template>

<script>
import ProjectsList from "./projects/projects-list.vue";

export default {
    name: "app",
    components: {ProjectsList}
}
</script>
