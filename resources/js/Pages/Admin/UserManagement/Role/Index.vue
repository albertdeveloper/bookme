<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles
            </h2>
        </template>
        <div class="p-6">
            <InertiaLink preserve-state preserve-scroll :href="route('admin.role.create')"
                         class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                New Role
            </InertiaLink>
            <div class="mt-6 rounded" v-if="roles.data.length > 0">
                <div class="shadow overflow-x-auto">
                    <table class="table-fixed">
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4">Title</th>
                            <th class="px-6 pt-6 pb-4">Permissions</th>

                        </tr>
                        <tr v-for="role in roles.data">
                            <td class="px-6 py-4 flex items-center focus:text-indigo-500 border-t">
                                <InertiaLink :href="route('admin.role.edit',{id:role.id})">
                                    {{ role.title }}
                                </InertiaLink>
                            </td>
                            <td class="border-t break-words">
                                <button
                                    class="rounded btn primary px-2 py-2 bg-blue-500 hover:bg-blue-700 text-white mr-1 mt-1 mb-1"
                                    v-for="permission in role.permissions">
                                    {{ permission.title }}
                                </button>
                            </td>

                        </tr>
                    </table>

                </div>
                <pagination :links="roles.links"/>
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
    props: ['roles'],
    components: {Pagination, AppLayout}
}
</script>
