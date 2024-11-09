<template>
    <table
        class="border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm"
    >
        <thead class="bg-slate-50 dark:bg-slate-700">
            <tr>
                <th class="w-1/5 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                    Nome
                </th>
                <th class="w-2/3 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                    Descrição
                </th>
                <th class="w-1/5 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                    Hotel
                </th>
                <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="quarto in quartos" :key="quarto.id">
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ quarto.name }}
                </td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ quarto.description }}
                </td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ quarto.hotel_name }}
                </td>
                <td class="text-center border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    <div class="flex gap-2">
                        <Link :href="'/room/editar/' + quarto.id">
                            <i class="fa fa-solid fa-pen cursor-pointer"></i>
                        </Link>
                        
                        <i class="fa fa-solid fa-trash cursor-pointer" @click="excluir(quarto)"></i>

                        <Link :href="'/room/visualizar/' + quarto.id">
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
    props: ['quartos'],
    components: {
        Link,
    },
    methods: {
        excluir(quarto) {
            this.$swal({
                title: `Deseja realmente excluír o quarto: ${quarto.name}?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#00B372",
                cancelButtonColor: "#BB2D3B",
                confirmButtonText: "Sim, deletar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(`/room/deletar/${quarto.id}`);
                }
            });
        }
    }
}
</script>

<style>

</style>