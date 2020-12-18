<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Room
            </h2>
        </template>
        <div class="p-6">
            <InertiaLink preserve-state preserve-scroll :href="route('admin.room.create')"
                         class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline float-left">
                New Room
            </InertiaLink>
            <Search :filters="filters" :is-dropdown="false" :route-url="route('admin.room.index')"   />
            <div class="mt-6 rounded" v-if="rooms.data.length > 0">
                <div class="shadow overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4">Title</th>
                            <th class="px-6 pt-6 pb-4">Description</th>
                        </tr>
                        <tr v-for="room in rooms.data">
                            <td class="px-6 py-4 flex items-center focus:text-indigo-500 border-t">
                                <InertiaLink :href="route('admin.room.edit',{id:room.id})">
                                    {{ room.name }}
                                </InertiaLink>
                            </td>
                            <td class="px-6 py-4  items-center focus:text-indigo-500 border-t">
                                <InertiaLink :href="route('admin.room.edit',{id:room.id})">
                                    {{ room.description }}
                                </InertiaLink>
                            </td>

                        </tr>
                    </table>

                </div>
                <pagination :links="rooms.links"/>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import Pagination from "@/Shared/Pagination";
import Search from "@/Pages/Filter/Search";

export default {
    props: ['rooms', 'roomTypes', 'filters'],
    components: {Pagination, AppLayout, Search},

}
</script>
