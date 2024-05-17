<template>
    <div class="sm:w-3/4 md: w-1/2 mx-auto overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right bg-gray-400 text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3" >#</th>
                    <th scope="col" class="px-6 py-3" >Username</th>
                    <th scope="col" class="px-6 py-3" >Email</th>
                    <th scope="col" class="px-6 py-3">
                    <span class="sr-only"></span>
                    </th>
                    
                </tr>
            </thead>
            <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" v-for="user in users">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{user.id}}
                </th>
                <td class="px-6 py-4">
                    {{user.name}}
                </td>
                <td class="px-6 py-4">
                    {{user.email}}
                </td>
                <td class="flex justify-end px-6 py-4 text-right gap-2">
                    <a :href="route('user-account.edit', {user_account: user})" class="font-medium text-lg text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-regular fa-pen-to-square"></i></a>
                    <Link as="button" :href="route('user-account.destroy', {user_account: user})" method="delete" class="font-medium text-lg text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-regular fa-trash-can"></i></Link>
                </td>
                
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    users: Object
})
</script>