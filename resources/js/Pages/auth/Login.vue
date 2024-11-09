<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="12" sm="8" md="4">
                <v-card>
                    <v-card-title class="text-h5">Login</v-card-title>
                    <v-card-text>
                        <v-form @submit.prevent="submitForm">
                            <v-text-field
                                v-model="dados.email"
                                label="Email"
                                type="email"
                                required
                            ></v-text-field>

                            <v-text-field
                                v-model="dados.password"
                                label="Password"
                                type="password"
                                required
                            ></v-text-field>

                            <v-btn type="submit" color="primary" block>
                                <span v-if="isLoading">
                                    <v-progress-circular
                                        color="blue"
                                        indeterminate
                                    ></v-progress-circular>
                                    Aguarde...
                                </span>
                                <span v-else>
                                    Login
                                </span>
                            </v-btn
                            >
                        </v-form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            dados: {
                email: "",
                password: "",
            },
            isLoading: false,
        };
    },
    methods: {
        submitForm() {
            this.isLoading = true;

            this.$inertia.post("/login", this.dados, {
                onSuccess: (page) => {
                    this.isLoading = false;
                },
                onError: (errors) => {
                    this.isLoading = false;
                },
            });
        },
    },
};
</script>
