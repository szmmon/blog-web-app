<template>
    <div class="border border-gray-400 dark:border-gray-900 rounded-md p-4 shadow-sm  text-gray-500 dark:text-gray-300" >
            <div class="border-b border-gray-200 dark:border-gray-700">
                <div class="text-md p-1 px-3 hover:cursor-pointer text-gray-800">
                    {{ comment.body }}
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start gap-2">
                    <Link  :href="route('comment.edit', { comment : comment })" class="border-gray-300 bg-gray-200 font-extralight rounded-md py-1 px-2 mt-1 hover:cursor-pointer hover:bg-gray-300 text-sm"><i class="fa-regular fa-pen-to-square"></i></Link>
                    <Link as="button" method="delete"  :href="route('comment.delete', { comment : comment })" class="border-gray-300 bg-gray-200 font-extralight rounded-md py-1 px-2 mt-1 hover:cursor-pointer hover:bg-gray-300 text-sm"><i class="fa-regular fa-trash-can"></i></Link>
                </div>
                <div class="flex items-center justify-end gap-2 text-xs" >
                    <div>ID: {{ comment.id }}</div>
                    <div>Created at: {{ date }}  </div>
                    <div >Author: {{ comment.user_id }}  </div>
                </div>
            </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    comment: Object,
});
const date = computed( () => new Date(props.comment.created_at).toDateString())
</script>