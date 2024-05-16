<template>
<form @submit.prevent="blogPostStore">
    <div class="mx-auto sm:w-3/4 md:w-1/2 border-gray-500 bg-slate-300 dark:bg-gray-700 pt-4 px-10 pb-6 rounded-md">
        <div>
            <label class="label" for="title">Title</label>
            <input type="text" id="title" class="input" placeholder="Input post title" v-model="form.title"/>
            <div class="input-error" v-if="form.errors.title">{{ form.errors.title }}</div>
        </div>
        <div class="mt-3">
            <label class="label" for="body">Body</label>
            <textarea type="text" id="body" class="input" placeholder="Post body" v-model="form.body"/>
            <div class="input-error" v-if="form.errors.body">{{ form.errors.body }}</div>
        </div>
        <div class="mt-5">
            <button class="button-primary w-full" type="submit">Create post</button>     
        </div>
    </div>
</form>
</template>

<script setup>
import { Link ,useForm } from '@inertiajs/vue3'
const form = useForm({
    title: null,
    body: null,
})
const blogPostStore = () => form.post(route('blog-post.store'))

</script>