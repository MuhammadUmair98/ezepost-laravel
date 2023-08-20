<template>
    <Head title="Pricing" />
    <div>
        <guest-nav></guest-nav>

        <!-- Pricing Section -->
        <div class="bg-white py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-semibold mb-6">Pricing</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Choose a plan that fits your needs
                </p>
                <div
                    class="flex flex-col md:flex-row justify-center space-y-6 md:space-y-0 md:space-x-6"
                >
                    <!-- Basic Plan -->
                    <div
                        class="w-full md:w-1/3 lg:w-1/4 p-4 bg-gray-100 rounded-lg shadow"
                    >
                        <h3 class="text-xl font-semibold mb-2">Basic</h3>
                        <p class="text-gray-600 mb-4">
                            Perfect for individuals
                        </p>
                        <p class="text-2xl font-semibold mb-2">$9.99/mo</p>
                        <ul class="text-left text-gray-600 mb-4">
                            <li>10 GB Storage</li>
                            <li>Unlimited Transfers</li>
                            <li>Email Support</li>
                        </ul>
                        <button
                            class="bg-rgb-primary text-white px-4 py-2 rounded-full text-lg hover:bg-gray-800 transition duration-300 ease-in-out"
                        >
                            Select Plan
                        </button>
                    </div>
                    <!-- Pro Plan -->
                    <div
                        class="w-full md:w-1/3 lg:w-1/4 p-4 bg-gray-100 rounded-lg shadow"
                    >
                        <h3 class="text-xl font-semibold mb-2">Pro</h3>
                        <p class="text-gray-600 mb-4">
                            For businesses and teams
                        </p>
                        <p class="text-2xl font-semibold mb-2">$19.99/mo</p>
                        <ul class="text-left text-gray-600 mb-4">
                            <li>50 GB Storage</li>
                            <li>Unlimited Transfers</li>
                            <li>Priority Support</li>
                        </ul>
                        <button
                            class="bg-rgb-primary text-white px-4 py-2 rounded-full text-lg hover:bg-gray-800 transition duration-300 ease-in-out"
                        >
                            Select Plan
                        </button>
                    </div>
                    <!-- Enterprise Plan -->
                    <div
                        class="w-full md:w-1/3 lg:w-1/4 p-4 bg-gray-100 rounded-lg shadow"
                    >
                        <h3 class="text-xl font-semibold mb-2">Enterprise</h3>
                        <p class="text-gray-600 mb-4">
                            For large organizations
                        </p>
                        <p class="text-2xl font-semibold mb-2">Contact Us</p>
                        <ul class="text-left text-gray-600 mb-4">
                            <li>Customized Solutions</li>
                            <li>Unlimited Transfers</li>
                            <li>Dedicated Support</li>
                        </ul>
                        <button
                            class="bg-rgb-primary text-white px-4 py-2 rounded-full text-lg hover:bg-gray-800 transition duration-300 ease-in-out"
                        >
                            Contact Us
                        </button>
                    </div>
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
    components: {
        GuestNav,
        Head,
    },
};
</script>

<style></style>
