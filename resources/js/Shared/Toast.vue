<template>
    <transition name="slide-fade" v-if="toast && visible && !popstate">
        <div class="absolute flex z-50 max-w-xs w-1/4 mt-4 mr-4 top-0 right-0 bg-teal-900 rounded p-4 shadow">
            <div class="mr-2">
                <svg class="w-6 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="flex-1 align-middle text-white">
                {{ toast.message }}
            </div>
            <div class="ml-2">
                <button @click="visible = false"
                        class="align-top text-gray-500 hover:text-white focus:outline-none focus:text-white ">
                    <svg class="w-6 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </transition>


</template>

<script>
export default {
    props: {
        toast: Object,
        popstate: Boolean,
    },
    data() {
        return {
            visible: false,
            timeout: null,

        }
    },
    watch: {
        toast: {
            immediate: true,
            handler() {
                this.visible = true;
                if(this.timeout) clearTimeout(this.timeout);
                this.timeout = setTimeout(() => this.visible = false, 2000);
            }

        }
    }
}
</script>

<style>

.slide-fade-enter-active {
    transition: all .3s ease;
}

.slide-fade-leave-active {
    transition: all .4s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.slide-fade-enter, .slide-fade-leave-to {
    transform: translateX(150px);
    opacity: 0;
}
</style>
