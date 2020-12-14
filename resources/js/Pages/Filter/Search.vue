<template>
    <div class="flex">
        <div class="flex-1">

            <select class="rounded  w-1/2 px-2 py-2 border" v-model="dropdown" v-if="isDropdown">
                <option></option>
                <option v-for="dropdownItem in isDropdown" :value="dropdownItem.title_slug">{{ dropdownItem.title }}</option>
            </select>
        </div>
        <div class="flex-1">
            <input type="text" class="form-input w-1/2 ml-2  px-2 py-2 float-right" v-model="search"/>
        </div>
    </div>
</template>
<script>

import Search from "@/Pages/Filter/Search";
import {stringify} from 'qs';


export default {
    props: ['filters', 'isDropdown','routeUrl'],
    components: {Search},
    data() {
        return {
            search: this.filters.search,
            dropdown: this.filters.dropdown
        }
    },
    watch: {
        search: _.throttle(function () {
            const query = stringify({
                dropdown_type: this.dropdown || undefined,
                search: this.search || undefined,
            });

            this.$inertia.visit(query ? `${this.routeUrl}?${query}` : `${this.routeUrl}`, {
                preserveState: true,
                preserveScroll: true,
            });
        }, 500)
    }
}
</script>


