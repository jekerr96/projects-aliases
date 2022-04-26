<template>
    <a :href="project.url" target="_blank" class="project-card" @click="pick">
        <div class="project-card__icon" v-html="project.icon" />

        <span class="project-card__bottom">
            <span class="project-card__name">{{ project.name }}</span>
            <span class="project-card__info project-card__link">{{ project.url }}</span>
            <span class="project-card__info project-card__commits">Количество коммитов: {{ commitsCount }}</span>
        </span>
    </a>
</template>

<script>
import {requestPostJson} from "../../helper/fetch";

export default {
    name: "project-card",
    props: ['project'],
    methods: {
        pick: function () {
            requestPostJson('/api/projects/pick', JSON.stringify({
                project: this.project.name,
            }));
        },
    },
    computed: {
        commitsCount: function () {
            return this.project.commitsCount ? this.project.commitsCount : 0;
        }
    }
}
</script>
