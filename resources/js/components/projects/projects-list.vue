<template>
    <div class="projects-list">
        <project-card v-for="(project, index) in projects" :key="index" :project="project" />
    </div>
</template>

<script>
import {requestJson} from "../../helper/fetch";
import ProjectCard from "./project-card.vue";

export default {
    name: "projects-list",
    components: {ProjectCard},

    data: function () {
        return {
            projects: [],
        }
    },

    async created() {
        this.projects = await requestJson('/api/projects');
    }
}
</script>
