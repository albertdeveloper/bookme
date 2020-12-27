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
                        <div class="text-sm" v-if="form.error('name')">
                            <div class="float-right">{{ form.error('name') }}</div>
                        </div>
                        <div
                            class="border focus-within:border-blue-500  transition-all duration-500 relative rounded p-1">

                            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                                <p>
                                    <label for="name" class="bg-white text-gray-600 px-1">Name *</label>
                                </p>
                            </div>
                            <p>
                                <input id="name" tabindex="0" type="text"
                                       class="py-2 px-2 text-gray-900 outline-none block h-full w-1/2"
                                       v-model="form.name">
                            </p>
                        </div>


                        <div class="text-sm" v-if="form.error('email')">
                            <div class="float-right">{{ form.error('email') }}</div>
                        </div>
                        <div
                            class="border focus-within:border-blue-500  transition-all duration-500 relative rounded p-1">

                            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                                <p>
                                    <label for="email" class="bg-white text-gray-600 px-1">Email *</label>
                                </p>
                            </div>
                            <p>
                                <input id="email" tabindex="0" type="email"
                                       class="py-2 px-2 text-gray-900 outline-none block h-full w-1/2"
                                       v-model="form.email">
                            </p>
                        </div>



                        <div class="text-sm" v-if="form.error('password')">
                            <div class="float-right">{{ form.error('password') }}</div>
                        </div>
                        <div
                            class="border focus-within:border-blue-500  transition-all duration-500 relative rounded p-1">

                            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                                <p>
                                    <label for="password" class="bg-white text-gray-600 px-1">Password *</label>
                                </p>
                            </div>
                            <p>
                                <input id="password" tabindex="0" type="password"
                                       class="py-2 px-2 text-gray-900 outline-none block h-full w-1/2"
                                       v-model="form.password">
                            </p>
                        </div>

                        <div class="text-sm" v-if="form.error('confirm_password')">
                            <div class="float-right">{{ form.error('confirm_password') }}</div>
                        </div>
                        <div
                            class="border focus-within:border-blue-500  transition-all duration-500 relative rounded p-1">

                            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                                <p>
                                    <label for="confirm" class="bg-white text-gray-600 px-1">Confirm password *</label>
                                </p>
                            </div>
                            <p>
                                <input id="confirm" tabindex="0" type="password"
                                       class="py-2 px-2 text-gray-900 outline-none block h-full w-1/2"
                                       v-model="form.confirm_password">
                            </p>
                        </div>

                        <div class="mt-2 pt-3">
                            <button
                                type="submit"
                                class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                                Create Role
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    methods: {
        submitForm() {
            this.$inertia.visit('/admin/user',{
                method: 'POST',
                data: this.form,
                preserveState: true,
                preserveScroll: true,
            })
        }
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                email: null,
                password: null,
                confirm_password: null,

            })
        }
    },
    components: {AppLayout}
}
</script>
