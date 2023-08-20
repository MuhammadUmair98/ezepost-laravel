<template>
    <div>
        <Head title="Dashboard" />
        <h1 class="mb-8 text-3xl font-bold">Dashboard</h1>
        <div class="flex justify-center mt-8 space-x-4">
            <!-- Total Customers Card -->
            <div class="bg-rgb-primary p-6 rounded-lg shadow-lg text-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-12 w-12 text-white mx-auto mb-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 13l4 4m0 0l4-4m-4 4V3"
                    ></path>
                </svg>
                <h3 class="text-xl font-semibold text-white mb-2">
                    Total Customers
                </h3>
                <p class="text-gray-300">
                    Total Customers Registered In Our Application
                </p>
                <button
                    class="mt-4 px-6 py-2 bg-white text-rgb-primary font-semibold rounded-lg cursor-default"
                >
                    {{ customerCount }} Customers
                </button>
            </div>

            <!-- Total Packages Card -->
            <div
                class="bg-violet-800 ml-4 p-6 rounded-lg shadow-lg text-center"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-12 w-12 text-white mx-auto mb-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                    ></path>
                </svg>
                <h3 class="text-xl font-semibold text-white mb-2">
                    Total Packages
                </h3>
                <p class="text-gray-300">
                    Total Packages Shipped Through Our Application
                </p>
                <button
                    class="mt-4 px-6 py-2 bg-white text-rgb-secondary font-semibold rounded-lg cursor-default"
                >
                    {{ totalPackages }} Packages
                </button>
            </div>
        </div>
        <div class="flex justify-center mt-8 space-x-4">
            <div
                class="bg-fuchsia-800 ml-4 p-6 rounded-lg shadow-lg text-center"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-12 w-12 text-white mx-auto mb-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                    ></path>
                </svg>
                <h3 class="text-xl font-semibold text-white mb-2">
                    Viewed Packages
                </h3>
                <p class="text-gray-300">
                    Total Packages Viewed Through Our Application
                </p>
                <button
                    class="mt-4 px-6 py-2 bg-white text-rgb-secondary font-semibold rounded-lg cursor-default"
                >
                    {{ viewedOnce }} Packages
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import Layout from "../../shared/Layout.vue";

export default {
    components: {
        Head,
    },
    props: {
        customerCount: Number,
        totalPackages: Number,
        viewedOnce: Number, // Add this line for the recentCustomers prop
    },
    layout: Layout,
};
</script>
