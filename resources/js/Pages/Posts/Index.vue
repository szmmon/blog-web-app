<template>
    <div class="w-3/4 mx-auto">
        <BlogPost v-for="post in blogPosts" :key="post.id" :blogPost="post" />
    </div>
</template>

<script setup>
import BlogPost from './Components/Index/blogPost.vue';
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

defineProps({
    blogPosts: Object,
})

</script>