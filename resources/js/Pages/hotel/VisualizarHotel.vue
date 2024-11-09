<template>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-5">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">
            Informações do Hotel
        </h2>

        <div class="mb-4">
            <label
                for="name"
                class="block text-sm font-medium text-gray-700"
                >Nome do Hotel</label
            >
            <input
                disabled
                type="text"
                id="name"
                v-model="hotel.name"
                class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
        </div>

        <div class="mb-4">
            <label
                for="zip_code"
                class="block text-sm font-medium text-gray-700"
                >CEP</label
            >
            <input
                disabled
                type="text"
                id="zip_code"
                v-model="hotel.zip_code"
                v-mask="'##.###-###'"
                class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
        </div>

        <div class="mb-4">
            <label
                for="address"
                class="block text-sm font-medium text-gray-700"
                >Endereço</label
            >
            <input
                disabled
                type="text"
                id="address"
                v-model="hotel.address"
                class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
        </div>

        <div class="mb-4">
            <label
                for="city"
                class="block text-sm font-medium text-gray-700"
                >Cidade</label
            >
            <input
                disabled
                type="text"
                id="city"
                v-model="hotel.city"
                class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
            
        </div>

        <div class="mb-4">
            <label
                for="state"
                class="block text-sm font-medium text-gray-700"
                >Estado</label
            >
            <input
                disabled
                type="text"
                id="state"
                v-model="hotel.state"
                class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
            
        </div>

        <div class="mb-4">
            <label
                for="website"
                class="block text-sm font-medium text-gray-700"
                >Website</label
            >
            <input
                disabled
                type="url"
                id="website"
                v-model="hotel.website"
                class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
        </div>

        <div class="mb-4 flex gap-2">
            <Link
                href="/"
                class="text-center w-full py-2 px-4 bg-gray-600 text-white font-bold rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
            >
                Voltar
            </Link>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    props: ['hotel'], 
    components: {
        Link,
    },
    data() {
        return {

        };
    },
};
</script>

<style scoped>
</style>
