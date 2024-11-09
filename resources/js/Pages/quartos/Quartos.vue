<template>
    <div class="container mx-auto px-5">
        <div class="flex columns-3 mt-5">
            <Link class="p-2 bg-slate-800 text-white text-xs font-bold rounded" href="/room/cadastro">
                Cadastrar Quarto
            </Link>
        </div>

        <div v-if="showAlert" class="flex w-full alert alert-success mt-4 p-4 text-green-700 bg-green-100 rounded relative">
            <span>{{ $page.props.flash.success }}</span>
            <button @click="showAlert = false" class="absolute top-1 right-1 text-gray-600 hover:text-gray-900 font-bold">
                &times;
            </button>
        </div>

        <div class="flex mt-5">
            <TableRooms :quartos="quartos" />
        </div>

        <div class="flex mt-5">
            <Link
                href="/"
                class="text-center py-2 px-4 bg-gray-600 text-white font-bold rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
            >
                Voltar
            </Link>
        </div>
    </div>
</template>

<script>
import TableRooms from '@/Components/tables/TableRooms.vue';
import { Link } from '@inertiajs/vue3'

export default {
    props: ['quartos'],
    components: {
        TableRooms,
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
