<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Permissions
            </h2>
        </template>
        <div class="p-6">
            <InertiaLink preserve-state preserve-scroll :href="route('admin.permission.create')"
                         class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                New Permission
            </InertiaLink>
            <div class="mt-6 rounded" v-if="permissions.data.length > 0">
                <div class="shadow overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4">Title</th>
                        </tr>
                        <tr v-for="roomType in permissions.data">
                            <td class="px-6 py-4 flex items-center focus:text-indigo-500 border-t">
                                <InertiaLink :href="route('admin.permission.edit',{id:roomType.id})">
                                    {{ roomType.title }}
                                </InertiaLink>
                            </td>
                        </tr>
                    </table>

                </div>
                <pagination :links="permissions.links"/>
            </div>
            <div class="px-3 py-3 shadow rounded mt-2" v-else>
                No record found
            </div>
        </div>

    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import Pagination from "@/Shared/Pagination";
export default {
    props:['permissions'],
    components: {Pagination, AppLayout}
}
</script>
