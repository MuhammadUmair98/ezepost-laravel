<template>
    <Head title="Home" />
    <div>
        <guest-nav></guest-nav>

        <!-- Hero Section -->
        <div class="bg-gray-100 py-16">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl font-semibold mb-4">Welcome to ezepost</h1>
                <p class="text-lg text-gray-600 mb-8">
                    Effortless Data Transfer Between Users
                </p>
                <a
                    href="#"
                    class="bg-rgb-primary text-white px-6 py-3 rounded-full text-lg hover:bg-gray-800 transition duration-300 ease-in-out"
                    >Get Started</a
                >
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-white py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-semibold mb-6">Key Features</h2>
                <div
                    class="flex flex-wrap justify-center items-center space-x-6"
                >
                    <!-- Feature 1 -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4">
                        <div class="bg-gray-200 p-6 rounded-lg">
                            <svg
                                class="w-12 h-12 mx-auto mb-4 text-rgb-primary"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                ></path>
                            </svg>
                            <h3 class="text-lg font-semibold mb-2">
                                Easy Data Transfer
                            </h3>
                            <p class="text-gray-600">
                                Effortlessly share data between users using our
                                desktop app.
                            </p>
                        </div>
                    </div>
                    <!-- Feature 2 -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4">
                        <div class="bg-gray-200 p-6 rounded-lg">
                            <svg
                                class="w-12 h-12 mx-auto mb-4 text-rgb-primary"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"
                                ></path>
                            </svg>
                            <h3 class="text-lg font-semibold mb-2">
                                Secure Transfers
                            </h3>
                            <p class="text-gray-600">
                                Your data is encrypted and securely transmitted
                                between users.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stripe Payment Section -->
        <div class="bg-rgb-primary py-16 text-white">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-semibold mb-6">
                    Subscribe to Premium
                </h2>
                <p class="text-lg text-gray-200 mb-8">
                    Unlock premium features for seamless data transfer.
                </p>
                <button
                    style="color: rgba(49, 46, 129, 1)"
                    class="bg-white text-rgb-primary px-6 py-3 rounded-full text-lg hover:bg-gray-100 transition duration-300 ease-in-out"
                >
                    Subscribe Now
                </button>
            </div>
        </div>
        <footer class="bg-rgb-primary py-8">
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
    components: {
        GuestNav,
        Head,
    },
};
</script>

<style>
/* Define your primary color class */
.bg-rgb-primary {
    background-color: rgba(49, 46, 129, 1);
}
</style>
