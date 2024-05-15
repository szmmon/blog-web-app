<template>
    <div class="border border-gray-400 dark:border-gray-900 rounded-md p-4 shadow-sm  text-gray-500 dark:text-gray-200" >
            <div class="border-b border-gray-200 dark:border-gray-700">
                <Link :href="route('blog-post.show', { blog_post : blogPost })" class="text-lg text-bold p-1 px-3 hover:font-bold hover:cursor-pointer">
                    {{ blogPost.title }}
                </Link>
            </div>
            <div class="flex items-center justify-end gap-2 text-sm" >
                <div>ID: {{ blogPost.id }}</div>
                <div>Created at: {{ date }}  </div>
                <div>Comments()</div>
            </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    blogPost: Object,
});
const date = computed( () => new Date(props.blogPost.created_at).toDateString())
</script>