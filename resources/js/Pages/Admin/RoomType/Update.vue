<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Room Type
            </h2>
        </template>
        <div class="p-6">
            <InertiaLink method="DELETE" :href="route('room_type.destroy',{id:data.id})" class="px-5 float-right py-3 rounded text-gray-100 bg-red-500 mr-5 hover:shadow-inner hover:bg-red-700 transition-all duration-300">Delete</InertiaLink>
            <br clear="all"/>
            <form @submit.prevent="submitForm">
                <div class="bg-white rounded-lg p-6">
                    <div class="grid lg:grid-cols-1 gap-6">
                        <div class="text-sm" v-if="form.error('title')">
                        <div class="float-right" >{{ form.error('title') }}</div>
                        </div>
                        <div
                            class="border focus-within:border-blue-500  transition-all duration-500 relative rounded p-1">

                            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                                <p>
                                    <label for="title" class="bg-white text-gray-600 px-1">Title *</label>
                                </p>
                            </div>
                            <p>
                                <input id="title"   tabindex="0" type="text"
                                       class="py-2 px-2 text-gray-900 outline-none block h-full w-1/2"
                                       v-model="form.title">
                            </p>
                        </div>
                        <div class="text-sm" v-if="form.error('description')">
                            <div class="float-right" >{{ form.error('description') }}</div>
                        </div>

                        <div
                            class="border focus-within:border-blue-500   transition-all duration-500 relative rounded p-1">
                            <div class="-mt-4 absolute tracking-wider px-1   text-xs">
                                <p>
                                    <label for="description" class="bg-white text-gray-600 px-1">Description *</label>
                                </p>
                            </div>
                            <p>

                                <textarea class="py-1 px-1 outline-none block h-full w-1/2 text-sm "
                                          id="description" v-model="form.description"></textarea>
                            </p>
                        </div>


                    </div>
                    <div class="mt-2 pt-3">
                        <button
                            type="submit"
                            class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                            Update room type
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    props: ['data'],
    components: {AppLayout},
    data() {
        return {
            form: this.$inertia.form({
                id: this.data.id,
                title: this.data.title,
                description: this.data.description,
            })
        }
    },
    methods: {
        submitForm() {
            this.$inertia.visit('/room_type/'+this.form.id,{
                method: 'PUT',
                data: this.form,
                preserveState:true,
                preserveScroll:true,
            });
        }
    }

}
</script>
