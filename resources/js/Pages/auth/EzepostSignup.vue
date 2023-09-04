<template>
    <Head title="Signup" />
    <guest-nav></guest-nav>
    <div
        class="flex items-center justify-center p-6 min-h-screen bg-gradient-to-b from-blue-800 via-blue-900 to-gray-900"
    >
        <div class="w-full max-w-md">
            <form
                class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden"
                @submit.prevent="signup"
            >
                <div class="px-10 py-12">
                    <h1 class="text-center text-3xl font-bold">
                        Sign up as an ezepost customer
                    </h1>
                    <div class="mt-6 mx-auto w-24 border-b-2" />
                    <text-input
                        v-model="form.name"
                        :error="errors.name"
                        class="mt-10"
                        label="Full name"
                        autofocus
                        autocapitalize="off"
                    />
                    <text-input
                        v-model="form.email"
                        :error="errors.email"
                        class="mt-10"
                        label="Email"
                        autofocus
                        autocapitalize="off"
                    />
                    <text-input
                        v-model="form.username"
                        :error="errors.username"
                        class="mt-10"
                        label="Username"
                        autofocus
                        autocapitalize="off"
                    />
                    <text-input
                        v-model="form.password"
                        :error="errors.password"
                        class="mt-6"
                        label="Password"
                        type="password"
                    />
                    <text-input
                        v-model="form.phone"
                        :error="errors.phone"
                        class="mt-10"
                        label="Phone"
                        autofocus
                    />
                    <label
                        class="flex items-center mt-6 select-none"
                        for="is_organization"
                    >
                        <input
                            id="remember"
                            v-model="form.isOrganization"
                            class="mr-1"
                            type="checkbox"
                        />
                        <span class="text-sm">Are u an organization</span>
                    </label>
                </div>
                <div
                    class="flex px-10 py-4 bg-gray-100 border-t border-gray-100"
                >
                    <loading-button
                        :loading="form.processing"
                        class="btn-indigo ml-auto"
                        type="submit"
                        >Signup</loading-button
                    >
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/vue3";
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
    },
    props: { errors: Object },
    data() {
        return {
            form: this.$inertia.form({
                name: "",
                username: "",
                password: "",
                email: "",
                phone: "",
                isOrganization: false,
            }),
        };
    },
    methods: {
        signup() {
            this.form.post("/signup");
        },
    },
};
</script>
