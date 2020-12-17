<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Role
            </h2>
        </template>
        <div class="p-6">
            <form @submit.prevent="submitForm">
                <div class="bg-white rounded-lg p-6">
                    <div class="grid lg:grid-cols-1 gap-6">
                        <div class="text-sm" v-if="form.error('title')">
                            <div class="float-right">{{ form.error('title') }}</div>
                        </div>
                        <div
                            class="border focus-within:border-blue-500  transition-all duration-500 relative rounded p-1">

                            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                                <p>
                                    <label for="title" class="bg-white text-gray-600 px-1">Title *</label>
                                </p>
                            </div>
                            <p>
                                <input id="title" tabindex="0" type="text"
                                       class="py-2 px-2 text-gray-900 outline-none block h-full w-1/2"
                                       v-model="form.title">
                            </p>
                        </div>


                        <div class="text-sm" v-if="form.error('permissions')">
                            <div class="float-right">{{ form.error('permissions') }}</div>
                        </div>
                        <div
                            class="border focus-within:border-blue-500  transition-all duration-500 relative rounded p-1">

                            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                                <p>
                                    <label for="title" class="bg-white text-gray-600 px-1">Permissions *</label>
                                </p>
                            </div>
                            <div>
                                <multiselect  v-model="value" tag-placeholder="Add this as new tag" class="border-0" placeholder="Search or add a tag" label="title" track-by="id"  :options="options" :multiple="true" :taggable="true" @tag="addTag"></multiselect>
                            </div>
                        </div>

                    </div>
                    <div class="mt-2 pt-3">
                        <button
                            type="submit"
                            class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                            Create Role
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import Multiselect from 'vue-multiselect'

export default {
    props:['permissions'],
    data() {
        return {
            form: this.$inertia.form({
                title: null,
                permissions: [],
            }),
            value: [],
            options: []
        }
    },
    mounted() {
       this.mapPermissions();

    },
    components: {AppLayout,Multiselect},
    methods:{
        submitForm(){
            this.form.permissions = this.value;
            this.$inertia.visit('/admin/role',{
                method:'POST',
                data:this.form,
                preserveState:true,
                preserveScroll:true,
            })
        },
        mapPermissions()
        {
            this.permissions.map(perm => {
                this.options.push({title: perm.title, id: perm.id},);
            })

        },
        addTag (newTag) {
            const tag = {
                title: newTag,
                id: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
            }
            this.options.push(tag)
            this.value.push(tag)
        }
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
.multiselect__tags{
    border:0!important;
}
</style>

