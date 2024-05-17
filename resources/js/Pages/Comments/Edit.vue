<template>
<form @submit.prevent="blogPostCommentUpdate" class="border-gray-500 bg-slate-300 dark:bg-gray-700 pt-4 px-10 pb-6 rounded-md mt-3">
         <div>
            <label class="label" for="body">Edit comment</label>
            <input type="text" id="body" class="input" placeholder="Comment message" v-model="form.body"/>
            <div class="input-error" v-if="form.errors.body">{{ form.errors.body }}</div>
        </div>
        <div class="mt-3 flex items-center justify-center font-normal">
            <button type="submit" class="button-primary">Edit comment</button>
        </div>
        </form>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { computed } from 'vue'
const props = defineProps({
    comment: Object,
})
const form = useForm({
    body: props.comment.body,
    post_id: props.comment.post_id  
})

const blogPostCommentUpdate = () => form.post(route('comment.update', {comment: props.comment.id}))
</script>