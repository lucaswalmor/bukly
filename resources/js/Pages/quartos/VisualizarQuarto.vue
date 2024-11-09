<template>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-5">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">
            Informações do Quarto
        </h2>

        <div class="mb-4">
            <label
                for="name"
                class="block text-sm font-medium text-gray-700"
                >Nome do Quarto</label
            >
            <input
                disabled
                type="text"
                id="name"
                v-model="quarto.name"
                class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
        </div>

        <div class="mb-4">
            <label
                for="name"
                class="block text-sm font-medium text-gray-700"
                >Descrição do Quarto</label
            >
            <input
                disabled
                type="text"
                id="description"
                v-model="quarto.description"
                class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
        </div>

        <div class="mb-4 flex gap-2">
            <Link
                href="/rooms"
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
    props: ['quarto'], 
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
