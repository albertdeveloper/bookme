<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Room Type's
            </h2>
        </template>
        <div class="p-6">
            <div class="mt-6 bg-white rounded">
                <div class="shadow overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4">Type</th>
                            <th class="px-6 pt-6 pb-4">Description</th>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 flex items-center focus:text-indigo-500 border-t">
                                Tds
                            </td>
                            <td class="px-6 py-4  items-center focus:text-indigo-500 border-t">
                                Tds
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    props:['roomTypes'],
    components: {AppLayout}
}
</script>
