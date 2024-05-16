<template>
    <div class="sm:w-3/4 md: w-3/5 mx-auto">
        <Link :href="route('blog-post.index')" class="btn-normal mb-3" as="button">Go back (All posts)</Link>
        <BlogPost :blog-post="post"></BlogPost>

        <form @submit.prevent="blogPostCommentStore" class="border-gray-500 bg-slate-300 dark:bg-gray-700 pt-4 px-10 pb-6 rounded-md mt-3">
         <div>
            <label class="label" for="body">Add new comment</label>
            <input type="text" id="body" class="input" placeholder="Comment message" v-model="form.body"/>
            <div class="input-error" v-if="form.errors.body">{{ form.errors.body }}</div>
        </div>
        <div class="mt-3 flex items-center justify-center font-normal">
            <button type="submit" class="button-primary">Add comment</button>
        </div>
        </form>
    </div>

</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import BlogPost from './Components/Index/blogPost.vue';
const props = defineProps({
    post: Object,
})
const form = useForm({
    body: null,
    post_id: props.post.id 
})

const blogPostCommentStore = () => form.post(route('comment.store'))

</script>