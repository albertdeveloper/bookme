<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Room
            </h2>
        </template>
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
                                <label for="room_type" class="bg-white text-gray-600 px-1">Room Type</label>
                            </p>
                        </div>
                        <p>

                            <select class="form-select focus:shadow-none text-gray-900  border-0 outline-none block h-full w-full focus:outline-none hover:outline " id="room_type" v-model="form.room_type">
                                    <option v-for="type in roomTypes" :value="type.id">
                                        {{type.title}}
                                    </option>
                            </select>
                        </p>
                    </div>


                    <div class="text-sm" v-if="form.error('name')">
                        <div class="float-right" >{{ form.error('name') }}</div>
                    </div>

                    <div
                        class="border focus-within:border-blue-500 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1   text-xs">
                            <p>
                                <label for="name" class="bg-white text-gray-600 px-1">Name *</label>
                            </p>
                        </div>
                        <p>
                            <input type="text" class="form-input py-3 px-2 outline-none block h-full w-full text-sm border-0 focus:shadow-none"  id="name" v-model="form.name"/>
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



                    <div class="text-sm" v-if="form.error('price')">
                        <div class="float-right" >{{ form.error('price') }}</div>
                    </div>

                    <div
                        class="border focus-within:border-blue-500 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1   text-xs">
                            <p>
                                <label for="price" class="bg-white text-gray-600 px-1">Price *</label>
                            </p>
                        </div>
                        <p>
                            <input type="text" class="form-input py-3 px-2 outline-none block h-full w-full text-sm border-0 focus:shadow-none" placeholder="0.00" id="price" v-model="form.price"/>
                        </p>
                    </div>



                </div>
                <div class="mt-2 pt-3">
                    <button
                        type="submit"
                        class="rounded text-gray-100 px-3 py-2 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                        Create room
                    </button>
                </div>
            </div>
        </form>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    props:['roomTypes'],
    data(){
        return{
            form: this.$inertia.form({
                room_type: null,
                name: null,
                description: null,
                price: null,
            }),
        }
    },
    components: {AppLayout},
    methods:{
        submitForm()
        {
            this.$inertia.visit('/admin/room',{
                method: 'POST',
                data: this.form,
                preserveState:true,
                preserveScroll:true,

            });
        }
    }
}
</script>
