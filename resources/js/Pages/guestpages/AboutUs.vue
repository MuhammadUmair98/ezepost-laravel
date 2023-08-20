<template>
    <Head title="About us" />
    <div>
        <guest-nav></guest-nav>
        <!-- About Us Section -->
        <div class="bg-white py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-semibold mb-6">About Us</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Learn more about ezepost and our team
                </p>
                <div class="md:flex md:justify-center space-x-6">
                    <!-- Mission Section -->
                    <div class="md:w-1/2 p-4">
                        <h3 class="text-xl font-semibold mb-2">Our Mission</h3>
                        <p class="text-gray-600 mb-4">
                            At ezepost, our mission is to simplify and
                            streamline the process of secure file transfer
                            between users. We aim to provide a seamless and
                            efficient solution for individuals and businesses to
                            exchange data.
                        </p>
                    </div>
                    <!-- Vision Section -->
                    <div class="md:w-1/2 p-4">
                        <h3 class="text-xl font-semibold mb-2">Our Vision</h3>
                        <p class="text-gray-600 mb-4">
                            We envision a world where sharing files securely is
                            as easy as a click. Our vision is to become the
                            go-to platform for hassle-free and secure data
                            transfer, empowering users to collaborate and
                            communicate seamlessly.
                        </p>
                    </div>
                </div>
                <!-- Team Section -->
                <div class="mt-8">
                    <h3 class="text-2xl font-semibold mb-4">Meet Our Team</h3>
                    <div
                        class="flex flex-col md:flex-row md:justify-center space-y-4 md:space-x-6"
                    >
                        <!-- Team Member 1 -->
                        <div class="md:w-1/3 p-4 bg-gray-100 rounded-lg shadow">
                            <img
                                src=""
                                alt="Team Member 1"
                                class="w-full h-32 object-cover mb-4 rounded-lg"
                            />
                            <h4 class="text-lg font-semibold mb-2">Daniel</h4>
                            <p class="text-gray-600 mb-2">Co-Founder & CEO</p>
                            <p class="text-gray-600">
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Sed fringilla mi eget justo
                                malesuada scelerisque.
                            </p>
                        </div>
                        <!-- Team Member 2 -->
                        <div class="md:w-1/3 p-4 bg-gray-100 rounded-lg shadow">
                            <img
                                src=""
                                alt="Team Member 2"
                                class="w-full h-32 object-cover mb-4 rounded-lg"
                            />
                            <h4 class="text-lg font-semibold mb-2">
                                Jane Smith
                            </h4>
                            <p class="text-gray-600 mb-2">Co-Founder & CTO</p>
                            <p class="text-gray-600">
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Sed fringilla mi eget justo
                                malesuada scelerisque.
                            </p>
                        </div>
                    </div>
                </div>
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

<style scoped>
/* Add any necessary styling for the About Us component */
.bg-rgb-primary {
    background-color: rgba(49, 46, 129, 1);
}
</style>
