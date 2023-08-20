<template>
    <nav class="bg-rgb-primary py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="#" class="text-white text-lg font-semibold"
                ><logo></logo
            ></a>
            <div class="hidden md:flex space-x-6">
                <Link href="/home" class="text-white hover:text-gray-300"
                    >Home</Link
                >
                <Link href="/pricing" class="text-white hover:text-gray-300"
                    >Pricing</Link
                >

                <Link href="/download" class="text-white hover:text-gray-300"
                    >Download</Link
                >

                <a href="/contact-us" class="text-white hover:text-gray-300"
                    >Contact us</a
                >
                <a href="/about-us" class="text-white hover:text-gray-300"
                    >About us</a
                >
                <Link href="/login" class="text-white hover:text-gray-300"
                    >Login</Link
                >
                <Link href="/signup" class="text-white hover:text-gray-300"
                    >Signup</Link
                >
            </div>
            <div class="md:hidden">
                <!-- Mobile menu button goes here -->
            </div>
        </div>
        <div class="mt-2 md:hidden flex justify-center space-x-4 px-4">
            <Link href="/home" class="text-white hover:text-gray-300"
                >Home</Link
            >
            <Link href="/pricing" class="text-white hover:text-gray-300"
                >Pricing</Link
            >
            <Link href="/download" class="text-white hover:text-gray-300"
                >Download</Link
            >
            <a href="#" class="text-white hover:text-gray-300">Contact us</a>
            <a href="#" class="text-white hover:text-gray-300">About us</a>
            <Link href="/login" class="text-white hover:text-gray-300"
                >Login</Link
            >
        </div>
        <div class="md:hidden flex justify-center mt-4">
            <!-- Mobile menu button goes here -->
        </div>
    </nav>
</template>

<script>
import Logo from "./Logo.vue";
import { Link } from "@inertiajs/vue3";
export default {
    components: { Logo, Link },
    name: "Navbar",
};
</script>

<style scoped>
/* Define your primary color class */
.bg-rgb-primary {
    background-color: rgba(49, 46, 129, 1);
}
</style>
