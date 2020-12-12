<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Room Type's
            </h2>
        </template>
        <div class="p-6">
            <div class="mt-6 rounded" v-if="roomTypes.data.length > 0">
                <div class="shadow overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4">Title</th>
                            <th class="px-6 pt-6 pb-4">Description</th>
                        </tr>
                        <tr v-for="roomType in roomTypes.data">
                            <td class="px-6 py-4 flex items-center focus:text-indigo-500 border-t">
                                {{ roomType.title }}
                            </td>
                            <td class="px-6 py-4  items-center focus:text-indigo-500 border-t">
                                {{ roomType.description }}
                            </td>
                        </tr>
                    </table>

                </div>
                <pagination :links="roomTypes.links"/>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import Pagination from "@/Shared/Pagination";

export default {
    props: ['roomTypes'],
    components: {Pagination, AppLayout}
}
</script>
