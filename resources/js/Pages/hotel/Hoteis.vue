<template>
    <div class="container mx-auto px-5">
        <div class="flex columns-3 mt-5">
            <Link class="p-2 bg-slate-800 text-white text-xs font-bold rounded" href="/hotel/cadastro">
                Cadastrar Hotel
            </Link>
        </div>

        <v-alert
            v-if="showAlert" 
            class="mt-3"
            :text="$page.props.flash.success"
            title="Sucesso"
            type="success"
            color="success"
            variant="tonal"
            border="start"
            border-color="deep-green accent-4"
            elevation="2"
            closable
        ></v-alert>

        <div class="flex mt-5">
            <TableHotels :hoteis="hoteis" />
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
