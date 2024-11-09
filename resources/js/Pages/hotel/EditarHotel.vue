<template>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-5">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">
            Editar Hotel
        </h2>

        <form @submit.prevent="submit">
            <div class="mb-4">
                <label
                    for="name"
                    class="block text-sm font-medium text-gray-700"
                    >Nome do Hotel</label
                >
                <input
                    type="text"
                    id="name"
                    v-model="hotel.name"
                    required
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
                    type="text"
                    id="zip_code"
                    v-model="hotel.zip_code"
                    v-mask="'##.###-###'"
                    required
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
                    type="text"
                    id="address"
                    v-model="hotel.address"
                    required
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
                    type="text"
                    id="city"
                    v-model="hotel.city"
                    required
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
                    type="text"
                    id="state"
                    v-model="hotel.state"
                    required
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
                    type="url"
                    id="website"
                    v-model="hotel.website"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

            <div class="mb-4 flex gap-2">
                <Link
                    href="/hotel"
                    class="text-center w-full py-2 px-4 bg-gray-600 text-white font-bold rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
                >
                    Voltar
                </Link>

                <button
                    type="submit"
                    class="w-full py-2 px-4 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                >
                    Editar Hotel
                </button>
            </div>
        </form>
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
    methods: {
        async submit() {
            this.$inertia.put(`/hotel/editar/${this.$props.hotel.id}`, this.$props.hotel, {
                onSuccess: (page) => {
                    console.log(page)
                    // this.$inertia.visit('/');
                },
                onError: (errors) => {
                    console.log(errors)
                },
            });
        },
        async fetchAddress(zip_code) {
            var cep = zip_code.replace(/\D/g, "");

            try {
                const response = await fetch(
                    `https://viacep.com.br/ws/${cep}/json/`
                );
                const data = await response.json();
                if (!data.erro) {
                    this.hotel.address = data.logradouro || "";
                    this.hotel.city = data.localidade || "";
                    this.hotel.state = data.uf || "";
                } else {
                    alert("CEP não encontrado.");
                }
            } catch (error) {
                alert("Erro ao buscar o endereço.");
            }
        },
    },
    watch: {
        "hotel.zip_code"(newZipCode) {
            const zip_code = newZipCode.replace(/\D/g, "");
            if (zip_code.length === 8) {
                this.fetchAddress(zip_code);
            }
        },
    },
};
</script>

<style scoped>
</style>
