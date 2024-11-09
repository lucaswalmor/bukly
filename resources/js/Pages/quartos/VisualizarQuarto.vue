<template>
    <v-container class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-5">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">
            Informações do Quarto
        </h2>

        <v-form>
            <v-row>
                <v-col cols="12">
                    <v-text-field
                        v-model="quarto.name"
                        label="Nome do Quarto"
                        :readonly="true"
                        outlined
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-text-field
                        v-model="quarto.description"
                        label="Descrição do Quarto"
                        :readonly="true"
                        outlined
                    ></v-text-field>
                </v-col>
            </v-row>

            <v-row class="mt-4">
                <v-col cols="12" class="text-center">
                    <Link
                        href="/rooms"
                        class="w-full py-2 px-4 bg-gray-600 text-white font-bold rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
                    >
                        Voltar
                    </Link>
                </v-col>
            </v-row>
        </v-form>
    </v-container>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    props: ['quarto'],
    components: {
        Link,
    },
};
</script>
