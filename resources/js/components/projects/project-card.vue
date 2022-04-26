<template>
    <a :href="project.url" target="_blank" class="project-card">
        <div class="project-card__icon" v-html="project.icon" />

        <span class="project-card__bottom">
             <span class="project-card__name">{{ project.name }}</span>
            <span class="project-card__link">{{ project.url }}</span>
        </span>
    </a>
</template>

<script>
export default {
    name: "project-card",
    props: ['project'],
}
</script>
