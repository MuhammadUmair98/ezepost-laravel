<template>
    <Head title="Download" />
    <div>
        <guest-nav></guest-nav>
        <!-- Download Section -->
        <div class="bg-white py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-semibold mb-6">Download</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Download the ezepost app for different platforms
                </p>
                <div
                    class="flex flex-col md:flex-row justify-center space-y-6 md:space-y-0 md:space-x-6"
                >
                    <!-- Windows Download -->
                    <div
                        class="w-full md:w-1/3 lg:w-1/4 p-4 bg-gray-100 rounded-lg shadow"
                    >
                        <h3 class="text-xl font-semibold mb-2">Windows</h3>
                        <p class="text-gray-600 mb-4">
                            Download the ezepost app for Windows
                        </p>
                        <a
                            href="#"
                            class="block text-rgb-primary hover:text-gray-700 mb-4"
                            >Download Now</a
                        >
                        <p class="text-gray-600">
                            Minimum System Requirements:
                        </p>
                        <ul class="text-left text-gray-600 mb-4">
                            <li>Windows 10</li>
                            <li>2GB RAM</li>
                            <li>50MB Storage</li>
                        </ul>
                    </div>
                    <!-- Apple Download -->
                    <div
                        class="w-full md:w-1/3 lg:w-1/4 p-4 bg-gray-100 rounded-lg shadow"
                    >
                        <h3 class="text-xl font-semibold mb-2">Apple</h3>
                        <p class="text-gray-600 mb-4">
                            Download the ezepost app for Apple devices
                        </p>
                        <a
                            href="#"
                            class="block text-rgb-primary hover:text-gray-700 mb-4"
                            >Download Now</a
                        >
                        <p class="text-gray-600">
                            Minimum System Requirements:
                        </p>
                        <ul class="text-left text-gray-600 mb-4">
                            <li>iOS 12+</li>
                            <li>100MB Storage</li>
                        </ul>
                    </div>
                    <!-- Linux Download -->
                    <div
                        class="w-full md:w-1/3 lg:w-1/4 p-4 bg-gray-100 rounded-lg shadow"
                    >
                        <h3 class="text-xl font-semibold mb-2">Linux</h3>
                        <p class="text-gray-600 mb-4">
                            Download the ezepost app for Linux distributions
                        </p>
                        <a
                            href="#"
                            class="block text-rgb-primary hover:text-gray-700 mb-4"
                            >Download Now</a
                        >
                        <p class="text-gray-600">
                            Minimum System Requirements:
                        </p>
                        <ul class="text-left text-gray-600 mb-4">
                            <li>Ubuntu 18.04+</li>
                            <li>64-bit Architecture</li>
                            <li>100MB Storage</li>
                        </ul>
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

<style scoped>
.bg-rgb-primary {
    background-color: rgba(49, 46, 129, 1);
}
</style>
