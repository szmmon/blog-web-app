<template>
    <form @submit.prevent="login">
        <div class="w-1/2 mx-auto">
            <div>
                <label class="label" for="email">E-mail</label>
                <input type="text" name="" id="email" class="input" v-model="form.email"/>
                <div class="input-error" v-if="form.errors.email">{{ form.errors.email }}</div>
            </div>
            <div class="mt-3">
                <label class="label" for="password">Password</label>
                <input type="password" name="" id="password" class="input" v-model="form.password"/>
                <div class="input-error" v-if="form.errors.password">{{form.errors.password}}</div>
            </div>
            <div class="mt-3">
                <button class="button-primary w-full" type="submit">Login</button> 
                <div class="mt-3 text-center">
                    <Link :href="route('user-account.create')" class="text-sm text-gray-400" as="button">Don't have an account? Create account instead</Link>
                </div>
            </div>
        </div>
    </form>
</template>


<script setup>
import { Link ,useForm } from '@inertiajs/vue3'
const form = useForm({
    email: null,
    password: null
})
const login = () => form.post(route('login.store'))
</script>   