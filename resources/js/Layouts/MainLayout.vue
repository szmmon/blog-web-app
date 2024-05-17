<template>
    <header class="border-b  bg-slate-300 dark:border-gray-700 dark:bg-cyan-950 w-full">
        <div class="container mx-auto ">
            <nav class="p-4 flex items-center justify-between">
                <div class="font-medium sm:text-sm md:text-lg dark:text-gray-100">
                    <Link :href="route('blog-post.index')">All posts</Link>
                </div>
                
                <div class="flex items-center gap-4 dark:text-gray-100">
                    <button @click="toggleDark()">
                    <i v-if="!isDark" class="fa-regular fa-moon font-medium"></i>  
                    <i v-else class="fa-regular fa-sun font-medium"></i>
                    </button>
                
                <div v-if="user" class="flex items-center gap-4 dark:text-gray-100">
                    <div   class="text-sm text-gray-400" >
                        {{ user.email }} <span v-if="user.is_admin">(admin)</span>
                    </div>
                    <Link v-if="user.is_admin" :href="route('user-account.index')" class="sm:text-sm md:text-lg">Users list</Link>
                    <div class="button-primary">
                        <Link :href="route('blog-post.create')">Add post</Link>
                    </div>
                    <div class="sm:text-sm md:text-lg">
                        <Link :href="route('logout')" method="delete" as="button"> Logout </Link>
                    </div>
                </div>
                <div v-else class="flex items-center gap-4 dark:text-gray-100" >
                    <Link :href="route('login')" as="button"> Sign-in </Link>
                    <Link :href="route('user-account.create')" as="button"> New user </Link>
                    
                </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4 w-full">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-400 dark:border-green-600 bg-green-400 dark:bg-green-600 p-2">
            {{ flashSuccess }}
        </div>
        <slot >default</slot>
    </main>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import { useDark, useToggle } from "@vueuse/core";
const isDark = useDark();
const toggleDark = useToggle(isDark);
const page = usePage();
const user = computed(() => page.props.user);

const flashSuccess = computed(() => page.props.flash.success);

</script>

