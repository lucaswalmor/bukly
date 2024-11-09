<template>
    <v-container class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-5">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">
            Informações do Hotel
        </h2>

        <v-form>
            <v-row>
                <v-col cols="12" md="6">
                    <v-text-field
                        v-model="hotel.name"
                        label="Nome do Hotel"
                        :readonly="true"
                        outlined
                    ></v-text-field>
                </v-col>

                <v-col cols="12" md="6">
                    <v-text-field
                        v-model="hotel.zip_code"
                        label="CEP"
                        v-mask="'##.###-###'"
                        :readonly="true"
                        outlined
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-text-field
                        v-model="hotel.address"
                        label="Endereço"
                        :readonly="true"
                        outlined
                    ></v-text-field>
                </v-col>

                <v-col cols="12" md="6">
                    <v-text-field
                        v-model="hotel.city"
                        label="Cidade"
                        :readonly="true"
                        outlined
                    ></v-text-field>
                </v-col>

                <v-col cols="12" md="6">
                    <v-text-field
                        v-model="hotel.state"
                        label="Estado"
                        :readonly="true"
                        outlined
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-text-field
                        v-model="hotel.website"
                        label="Website"
                        :readonly="true"
                        outlined
                    ></v-text-field>
                </v-col>
            </v-row>

            <v-row class="mt-4">
                <v-col cols="12" class="text-center">
                    <Link
                        href="/"
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
    props: ['hotel'],
    components: {
        Link,
    },
};
</script>
