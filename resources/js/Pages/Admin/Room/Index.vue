<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Room
            </h2>
        </template>
        <div class="p-6">

            <select class="rounded   px-3 py-3 border" v-model="search">
                <option></option>
                <option v-for="roomType in roomTypes" :value="roomType.title_slug">{{ roomType.title }}</option>
            </select>

            <div class="mt-6 rounded" v-if="rooms.data.length > 0">
                <div class="shadow overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4">Title</th>
                            <th class="px-6 pt-6 pb-4">Description</th>
                        </tr>
                        <tr v-for="room in rooms.data">


                            <td class="px-6 py-4 flex items-center focus:text-indigo-500 border-t">
                                <InertiaLink :href="route('room_type.edit',{id:room.id})">
                                    {{ room.name }}
                                </InertiaLink>
                            </td>
                            <td class="px-6 py-4  items-center focus:text-indigo-500 border-t">
                                <InertiaLink :href="route('room_type.edit',{id:room.id})">
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

import { stringify } from 'qs';

export default {
    props: ['rooms', 'roomTypes', 'filters'],
    components: {Pagination, AppLayout},
    data() {
        return {
            search: this.filters.filter,
        }
    },
    watch: {
        search: _.throttle(function(){
            const query = stringify({
                room_type: this.search || undefined
            });
            this.$inertia.visit(query ? `/room?${query}` : `/room`,{
                preserveState: true,
                preserveScroll: true,
            });
        },500)

    }
}
</script>
