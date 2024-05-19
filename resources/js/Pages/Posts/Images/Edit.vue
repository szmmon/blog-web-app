<template>
<form @submit.prevent="blogPostImageTitleUpdate" class="border-gray-500 bg-slate-300 dark:bg-gray-700 pt-4 px-10 pb-6 rounded-md mt-3">
         <div>
            <label class="label" for="title">Edit Image title</label>
            <input type="text" id="title" class="input" placeholder="Comment message" v-model="form.title"/>
            <div class="input-error" v-if="form.errors.title">{{ form.errors.title }}</div>
        </div>
        <div class="mt-3 flex items-center justify-center font-normal">
            <button type="submit" class="button-primary">Edit</button>
        </div>
        </form>

</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { computed } from 'vue'
const props = defineProps({
    image: Object,
})
const form = useForm({
  title: props.image.title
})

const blogPostImageTitleUpdate = () => form.post(route('blog-post.image.update', {image: props.image.id}))
</script>