<template>
<div >
    <Link :href="route('blog-post.show', {blog_post:blog_post })" class="btn-normal mb-3" as="button">Go back</Link>
    <form     
        enctype="multipart/form-data"
        @submit.prevent="upload"
        >
        <div class="mx-auto sm:w-3/4 md:w-1/2 border-gray-500 bg-slate-300 dark:bg-gray-700 pt-4 px-10 pb-6 rounded-md">
            <div>
                <label class="label" for="image">Add image</label>
                <input type="file" multiple name="images[]" @input="addFiles" class="input" placeholder="Input post image" />
                </div>
            <div>
                <label class="label" for="title">Image title</label>
                <input type="text" id="title" class="input" placeholder="Input image title" v-model="form.title"/>
                <div class="input-error" v-if="form.errors.title">{{ form.errors.title }}</div>
            </div>

            <div class="mt-5 flex flex-col justify-center items-center">
                <button class="button-primary w-full mb-3 disabled:opacity-25 disabled:cursor-not-allowed" type="submit" :disabled="!canUpload">Add images</button> 
                <button type="reset" class="btn-normal mb-3" @click="reset">Reset</button>    
            </div>
        </div>
    </form>
</div>
</template>

<script setup>
import { Link ,useForm } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
    blog_post: Object
})

const form = useForm({
  images: [],
  title: null
})
const upload = () => {
  form.post(
    route('blog-post.image.store', { blog_post: props.blog_post.id }),
    {
      onSuccess: () => form.reset('images'),
    },
  )
}
const addFiles = (event) => {
  for (const image of event.target.files) {
    form.images.push(image)
  }
}
const canUpload = computed(() => form.images.length)
const reset = () => form.reset('images')


</script>