<template>
    <table
        class="border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm"
    >
        <thead class="bg-slate-50 dark:bg-slate-700">
            <tr>
                <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                    Nome
                </th>
                <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                    Rua
                </th>
                <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                    Cidade
                </th>
                <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                    Estado
                </th>
                <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                    CEP
                </th>
                <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                    WebSite
                </th>
                <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="hotel in hoteis" :key="hotel.id">
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ hotel.name }}
                </td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ hotel.address }}
                </td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ hotel.city }}
                </td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ hotel.state }}
                </td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ hotel.zip_code }}
                </td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ hotel.website }}
                </td>
                <td class="text-center border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    <div class="flex gap-2">
                        <Link :href="'/hotel/editar/' + hotel.id">
                            <i class="fa fa-solid fa-pen cursor-pointer"></i>
                        </Link>
                        
                        <i class="fa fa-solid fa-trash cursor-pointer" @click="excluir(hotel)"></i>

                        <Link :href="'/hotel/visualizar/' + hotel.id">
                            <i class="fa fa-solid fa-eye cursor-pointer"></i>
                        </Link>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    props: ['hoteis'],
    components: {
        Link,
    },
    methods: {
        excluir(hotel) {
            this.$swal({
                title: `Deseja realmente excluír o hotel: ${hotel.name}?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#00B372",
                cancelButtonColor: "#BB2D3B",
                confirmButtonText: "Sim, deletar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(`/hotel/deletar/${hotel.id}`);
                }
            });
        }
    }
}
</script>

<style>

</style>