<template>
    <a :href="project.url" class="project-card">
       <div class="project-card__icon" v-html="project.icon" />
        <div class="project-card__name">{{ project.name }}</div>
    </a>
</template>

<script>
export default {
    name: "project-card",
    props: ['project'],
}
</script>
