<template>
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

            <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition-transform hover:scale-105">
                <h2 class="text-xl font-semibold text-gray-800">
                    <i class="fa-solid fa-hotel text-green-600"></i>
                    Hotéis
                </h2>
                <p class="text-gray-600 mt-2">Gerencie e adicione novos hotéis ao sistema.</p>
                <Link
                    href="/hotel"
                >
                    <button class="mt-4 px-6 py-2 bg-green-500 text-white font-bold rounded hover:bg-green-600">
                        Acessar
                    </button>
                </Link>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition-transform hover:scale-105">
                <h2 class="text-xl font-semibold text-gray-800">
                    <i class="fa-solid fa-bed text-blue-600"></i>
                    Quartos
                </h2>
                <p class="text-gray-600 mt-2">Gerencie e adicione novos quartos ao sistema.</p>
                <Link
                    href="/rooms"
                >
                    <button class="mt-4 px-6 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-600">
                        Acessar
                    </button>
                </Link>
            </div>
        </div>
    </div>
</template>

<script>
import TableHotels from '@/Components/tables/TableHotels.vue';
import { Link } from '@inertiajs/vue3'

export default {
    props: ['hoteis'],
    components: {
        TableHotels,
        Link,
    },
    data() {
        return {
            showAlert: !!this.$page.props.flash.success,
        };
    },
    mounted() {
        if (this.showAlert) {
            setTimeout(() => {
                this.showAlert = false;
            }, 3000); // Fecha o alerta após 3 segundos
        }
    },
};
</script>

<style></style>
