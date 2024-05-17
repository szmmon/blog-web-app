<template>
    <form @submit.prevent="update">
        <div class="w-1/2 mx-auto border border-gray-300 dark:border-gray-700 dark:text-gray-300 dark:bg-gray-600 overflow-x-auto shadow-md rounded-md p-5">
            <div>
                <label class="label" for="name">Edit name</label>
                <input type="text" id="name" class="input" v-model="form.name"/>
                <div class="input-error" v-if="form.errors.name">{{ form.errors.name }}</div>
            </div>
            <div class="mt-3">
                <label class="label" for="email">Edit E-mail</label>
                <input type="text" name="" id="email" class="input" v-model="form.email"/>
                <div class="input-error" v-if="form.errors.email">{{ form.errors.email }}</div>
            </div>
            <div class="mt-3">
                <button class="button-primary w-full" type="submit">Edit Account</button>
            </div>
        </div>
    </form>
</template>


<script setup>
import { Link ,useForm } from '@inertiajs/vue3'
const props = defineProps({
    user: Object
})

const form = useForm({
    name: props.user.name,
    email: props.user.email
})
const update = () => form.put(route('user-account.update', {user_account: props.user}));
</script>