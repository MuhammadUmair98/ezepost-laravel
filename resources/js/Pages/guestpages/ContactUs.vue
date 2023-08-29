<template>
    <Head title="Contact Us" />
    <div class="flex flex-col min-h-screen">
      <guest-nav></guest-nav>
      <!-- Contact Section -->
      <div class="flex-grow bg-gradient-to-b from-blue-800 via-blue-900 to-gray-900">
        <div class="container mx-auto text-center py-16">
          <div class="mb-6 flex items-center justify-center">
            <svg
              class="w-10 h-10 text-white animate-bounce"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
              ></path>
            </svg>
            <h2 class="text-4xl font-semibold text-white inline-block ml-2">
              Contact Us
            </h2>
          </div>
          <p class="text-lg text-gray-400 mb-8">
            We'd love to hear from you! Get in touch with us.
          </p>
          <div class="max-w-md mx-auto">
            <form @submit.prevent="submitForm" class="space-y-4">
              <div class="mb-4">
                <label for="name" class="block text-gray-300">Name</label>
                <input
                  v-model="formData.name"
                  type="text"
                  id="name"
                  name="name"
                  placeholder="Enter your name"
                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400"
                />
              </div>
              <div class="mb-4">
                <label for="email" class="block text-gray-300">Email</label>
                <input
                  v-model="formData.email"
                  type="email"
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400"
                />
              </div>
              <div class="mb-4">
                <label for="message" class="block text-gray-300">Message</label>
                <textarea
                  v-model="formData.message"
                  id="message"
                  name="message"
                  rows="4"
                  placeholder="Type your message here"
                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400"
                ></textarea>
              </div>
              <button
                type="submit"
                class="w-full bg-rgb-primary text-white py-2 rounded-lg hover:bg-gray-700 transition duration-300 ease-in-out"
              >
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
  
      <footer class="bg-gray-800 py-8">
        <div class="container mx-auto text-center">
          <p class="text-gray-400">
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
