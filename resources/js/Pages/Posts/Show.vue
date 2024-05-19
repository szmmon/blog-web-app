<template>
    <div class="sm:w-3/4 md: w-3/5 mx-auto">
        <Link :href="route('blog-post.index')" class="btn-normal mb-3" as="button">Go back (All posts)</Link>
        <BlogPost :blog-post="post"></BlogPost>
        <Images v-if="post.images.length" :blog-post="post" class="mt-3"></Images>
        <div class="mt-3" v-if="user.id == post.owner.id || user.is_admin == 'admin'">
           <Link :href="route('blog-post.image.create', {blog_post: post.id})" class="btn-normal mb-3" as="button">Add images</Link> 
        </div>

        <div v-if="hasComments" class="mt-3">
            <div class="mt-2 mb-1 font-bold text-xl">Comments:</div>
            <Comment v-for="comment in post.comments" :key="comment.id" :comment="comment" class="mb-3"/>
        </div>
        <div v-else class="mt-3">
            <div class="mt-2 mb-1 font-bold text-xl">No comments yet</div>
        </div>

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
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue'
import BlogPost from './Components/Index/blogPost.vue';
import Comment from './Components/Index/blogPostComment.vue';
import Images from './Components/Index/blogPostImages.vue';

const page = usePage();
const user = computed(() => page.props.user);

const prop = defineProps({
    post: Object,
})
const form = useForm({
    body: null,
    post_id: prop.post.id 
})

const blogPostCommentStore = () => form.post(route('comment.store'))

const hasComments = computed(
  () => prop.post.comments.length,
)

</script>