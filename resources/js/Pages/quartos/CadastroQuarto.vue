<template>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-5">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">
            Cadastrar Quarto
        </h2>

        <form @submit.prevent="submit">
            <div class="mb-4">
                <label for="hotel_id" class="block text-sm font-medium text-gray-700">
                    Selecione o hotel
                </label>
                <select
                    id="hotel_id"
                    v-model="form.hotel_id"
                    required
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
                    <option value="" disabled>Selecione um hotel</option>
                    <option v-for="hotel in hoteis" :key="hotel.id" :value="hotel.id">
                        {{ hotel.name }}
                    </option>
                </select>
                <span v-if="form.errors.hotel_id" class="text-red-500 text-sm">
                    {{ form.errors.hotel_id }}
                </span>
            </div>

            <div class="mb-4" v-if="form.hotel_id != ''">
                <label
                    for="name"
                    class="block text-sm font-medium text-gray-700"
                    >Nome do quarto</label
                >
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    required
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                />
                <span v-if="form.errors.name" class="text-red-500 text-sm">{{
                    form.errors.name
                }}</span>
            </div>

            <div class="mb-4" v-if="form.hotel_id != ''">
                <label
                    for="description"
                    class="block text-sm font-medium text-gray-700"
                >
                    Descrição do quarto
                </label>
                <input
                    type="text"
                    id="description"
                    v-model="form.description"
                    required
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                />
                <span v-if="form.errors.description" class="text-red-500 text-sm">{{
                    form.errors.description
                }}</span>
            </div>

            <div class="mb-4 flex gap-2">
                <Link
                    href="/rooms"
                    class="text-center w-full py-2 px-4 bg-gray-600 text-white font-bold rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
                >
                    Voltar
                </Link>

                <button
                    type="submit"
                    class="w-full py-2 px-4 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                >
                    <span v-if="isLoading">
                        <v-progress-circular
                            color="blue"
                            indeterminate
                        ></v-progress-circular>
                        Aguarde...
                    </span>
                    <span v-else>
                        Cadastrar Quarto
                    </span>
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    props: ['hoteis'],
    components: {
        Link,
    },
    data() {
        return {
            form: {
                hotel_id: "",
                name: "asdasdasd",
                description: "asdasdasd",
                errors: {},
            },
            isLoading: false,
        };
    },
    methods: {
        async submit() {
            this.isLoading = true;
            this.$inertia.post("/room/cadastro", this.form, {
                onSuccess: (page) => {
                    this.isLoading = false;
                },
                onError: (errors) => {
                    this.form.errors = errors;
                    this.isLoading = false;
                },
            });
        },
    },
};
</script>

<style scoped>

</style>
