<template>
    <div class="border border-gray-400 dark:border-gray-700 rounded-md p-4 shadow-sm  text-gray-500 dark:text-gray-300 dark:bg-gray-700 md: h-1/2 lg:h-1/3" >
        <section class="mt-4 grid grid-cols-3 gap-4">
            <div 
                v-for="image in blogPost.images" :key="image.id" 
                class="flex flex-col justify-between"
            >
                <img :src="image.src" class="aspect-[4/3] object-cover" />
                <div class="mx-auto font-semibold text-md">{{ image.title }}</div>
                <Link 
                :href="route('blog-post.image.destroy', {blog_post: props.blogPost.id, image: image.id})"
                as="button"
                method="delete"
                class="mt-1 btn-normal text-xs w-full"
                >
                Delete
                </Link>
                <Link 
                :href="route('blog-post.image.edit', {blog_post: props.blogPost.id, image: image.id})"
                as="button"
                class="mt-1 btn-normal text-xs w-full"
                >
                Edit
                </Link>
            </div>
        </section>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    blogPost: Object,
});
</script>