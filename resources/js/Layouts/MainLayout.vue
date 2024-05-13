<template>
    <header class="border-b  bg-slate-300 dark:border-gray-700 dark:bg-cyan-950 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="font-medium text-lg dark:text-gray-100">
                    <Link href="/">All posts</Link>
                </div>
                <div class="font-medium text-amber-500 dark:text-amber-400 text-xl text-center bold">
                    <Link href="/">App</Link>
                </div>
                <div class="flex items-center gap-4 dark:text-gray-100">
                    <button @click="toggleDark()">
                    <i v-if="!isDark" class="fa-regular fa-moon font-medium"></i>  
                    <i v-else class="fa-regular fa-sun font-medium"></i>
                    </button>
                
                <div v-if="user" class="flex items-center gap-4 dark:text-gray-100">
                    <Link href="/"  class="text-sm text-gray-400" >
                        Username
                    </Link>
                    <div class="button-primary">
                        <Link href="/">Add post</Link>
                    </div>
                    <div>
                        <Link href="/" as="button"> Logout </Link>
                    </div>
                </div>
                <div class="flex items-center gap-4 dark:text-gray-100" v-else>
                    <Link href="/" as="button"> Sign-in </Link>
                    <Link href="/" as="button"> New user </Link>
                </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4 w-full">
        
        <slot>default</slot>
    </main>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import { useDark, useToggle } from "@vueuse/core";
const isDark = useDark();
const toggleDark = useToggle(isDark);
const page = usePage();
// const flashSuccess = computed(() => page.props.flash.success);
const user = computed(() => page.props.user);

const notificationCount = computed(
  () => Math.min(page.props.user.notificationCount, 9),
)
</script>

