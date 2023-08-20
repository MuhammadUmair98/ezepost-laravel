<template>
    <Head title="Contact Us" />
    <div>
        <guest-nav></guest-nav>
        <!-- Contact Section -->
        <div class="bg-gray-100 py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-semibold mb-6">Contact Us</h2>
                <p class="text-lg text-gray-600 mb-8">
                    We'd love to hear from you! Get in touch with us.
                </p>
                <div class="max-w-md mx-auto">
                    <form @submit.prevent="submitForm" class="space-y-4">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-600"
                                >Name</label
                            >
                            <input
                                v-model="formData.name"
                                type="text"
                                id="name"
                                name="name"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-rgb-primary"
                            />
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-600"
                                >Email</label
                            >
                            <input
                                v-model="formData.email"
                                type="email"
                                id="email"
                                name="email"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-rgb-primary"
                            />
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-600"
                                >Message</label
                            >
                            <textarea
                                v-model="formData.message"
                                id="message"
                                name="message"
                                rows="4"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-rgb-primary"
                            ></textarea>
                        </div>
                        <button
                            type="submit"
                            class="w-full bg-rgb-primary text-white py-2 rounded-lg hover:bg-gray-800 transition duration-300 ease-in-out"
                        >
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <footer style="margin-top: 4rem" class="bg-rgb-primary py-8">
            <div class="container mx-auto text-center">
                <p class="text-gray-300">
                    &copy; 2023 ezepost. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</template>

<script>
import GuestNav from "../../shared/GuestNav.vue";
import { Head } from "@inertiajs/vue3";

export default {
    name: "Contact",
    data() {
        return {
            formData: {
                name: "",
                email: "",
                message: "",
            },
        };
    },
    components: {
        GuestNav,
        Head,
    },
    methods: {
        submitForm() {
            console.log("Form submitted:", this.formData);
            // Reset form data
            this.formData = {
                name: "",
                email: "",
                message: "",
            };
        },
    },
};
</script>

<style scoped>
.bg-rgb-primary {
    background-color: rgba(49, 46, 129, 1);
}
</style>
