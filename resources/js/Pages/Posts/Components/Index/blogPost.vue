<template>
    <div class="border border-gray-400 dark:border-gray-700 rounded-md p-4 shadow-sm  text-gray-500 dark:text-gray-300 dark:bg-gray-00" >
            <div class="border-b border-gray-300 dark:border-gray-700">
                <Link :href="route('blog-post.show', { blog_post : blogPost.id })" class="text-lg text-bold p-1 px-3 font-semibold hover:cursor-pointer text-gray-800 dark:text-gray-300">
                    {{ blogPost.title }}
                </Link>
            <div v-if="blogPost.owner" class="border-t border-gray-300 dark:border-gray-700">
                <div class="text-md p-1 px-5 text-gray-600 dark:text-gray-400">{{ blogPost.body }}
                </div>
            </div>
            </div>
            <div class="flex items-center justify-end gap-2 text-xs" >
                <div>ID: {{ blogPost.id }}</div>
                <div>Created at: {{ date }}  </div>
                <div v-if="blogPost.owner">Author: {{ blogPost.owner.name }}  </div>
                <div v-if="blogPost.comments_count">Comments({{ blogPost.comments_count }})</div>
                <div v-if="blogPost.images_count">Images({{ blogPost.images_count }})</div>
            </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    blogPost: Object,
});
const date = computed( () => new Date(props.blogPost.created_at).toLocaleString())
</script>