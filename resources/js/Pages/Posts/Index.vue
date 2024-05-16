<template>
    <div class="w-3/4 mx-auto">
        <BlogPost v-for="post in blogPosts" :key="post.id" :blogPost="post" class="my-3" :href="route('blog-post.show', { blog_post : post })">
        </BlogPost>
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