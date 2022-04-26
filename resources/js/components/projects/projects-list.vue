<template>
    <div>
        <div class="project-search">
            <input type="search" class="project-search__input" placeholder="Поиск" v-model="searchValue" />
        </div>
        <div class="projects-list">
            <project-card v-for="(project, index) in filteredProjects" :key="index" :project="project" />
        </div>
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
            searchValue: '',
        }
    },

    computed: {
        filteredProjects: function() {
            if (!this.searchValue) {
                return this.projects;
            }

            return this.projects.filter(item => item.name.toLowerCase().includes(this.searchValue.toLowerCase()));
        },
    },

    async created() {
        this.projects = await requestJson('/api/projects');
    }
}
</script>
