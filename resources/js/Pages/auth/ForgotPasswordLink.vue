<template>
    <Head title="Reset Password" />
    <guest-nav></guest-nav>

    <div
        class="flex items-center justify-center p-6 min-h-screen bg-gradient-to-b from-blue-800 via-blue-900 to-gray-900"
    >
        <div class="w-full max-w-md">
            <form
                class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden"
                @submit.prevent="resetPassword"
            >
                <div class="px-10 py-12">
                    <h1 class="text-center text-3xl font-bold mb-4">
                        Reset Password
                    </h1>
                    <div
                        class="mt-6 mx-auto w-24 border-b-2 border-rgb-primary"
                    />
                    <text-input
                        v-model="form.email"
                        :error="form.errors.email"
                        class="mt-10 text-input"
                        label="Email"
                        placeholder="Enter your email"
                        autofocus
                        autocapitalize="off"
                    />
                    <text-input
                        v-model="form.password"
                        :error="form.errors.password"
                        class="mt-6 text-input"
                        label="Password"
                        type="password"
                        placeholder="Enter your password"
                    />
                    <text-input
                        v-model="form.password_confirmation"
                        :error="form.errors.password_confirmation"
                        class="mt-6 text-input"
                        label="Confirm Password"
                        type="password"
                        placeholder="Confirm your password"
                    />
                </div>

                <div
                    class="flex px-10 py-4 bg-gray-100 items-center border-t border-gray-100"
                >
                    <loading-button
                        :loading="form.processing"
                        class="btn-indigo loading-button"
                        type="submit"
                    >
                        Submit
                    </loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import Logo from "../../shared/Logo.vue";
import TextInput from "../../shared/TextInput.vue";
import LoadingButton from "../../shared/LoadingButton.vue";
import GuestNav from "../../shared/GuestNav.vue";

export default {
    components: {
        Head,
        LoadingButton,
        Logo,
        TextInput,
        GuestNav,
        Link,
    },
    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                password_confirmation: "",
                token: this.token,
            }),
        };
    },
    props: { token: String },
    methods: {
        resetPassword() {
            this.form.post("/reset-password");
        },
    },
};
</script>
