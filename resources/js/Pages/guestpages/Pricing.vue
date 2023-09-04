<template>
    <div>
      <Head title="Pricing" />
      <div class="flex flex-col min-h-screen">
        <guest-nav></guest-nav>
  
         <div class="flex-grow bg-gradient-to-b from-blue-800 via-blue-900 to-gray-900 py-16">
        <div class="container mx-auto text-center">
          <h2 class="text-4xl font-semibold text-white mb-6">Pricing</h2>
          <p class="text-lg text-white mb-8">
            Choose a plan that fits your needs
          </p>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Basic Plan -->
            <div class="p-6 bg-gray-800 rounded-lg shadow-lg text-white ">

              <div class="bg-blue-600 rounded-full p-4 mb-4 inline-block animate-bounce">
                <svg
                  class="w-12 h-12 mx-auto text-white"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  ></path>
                </svg>
              </div>
              <h3 class="text-xl font-semibold mb-4">Basic</h3>
              <p class="text-whte-300 mb-6">Perfect for individuals</p>
              <p class="text-2xl font-semibold text-blue-400 mb-6">$9.99/mo</p>
              <ul class="text-left text-white-300 mb-6 space-y-2">
                <li>10 GB Storage</li>
                <li>Unlimited Transfers</li>
                <li>Email Support</li>
              </ul>
              <button
                class="bg-rgb-primary text-white px-6 py-3 rounded-full text-lg hover:bg-gray-700 hover:text-blue-400 transition duration-300 ease-in-out transform hover:scale-105"
              >
                Select Plan
              </button>
            </div>
              <!-- Pro Plan -->
              <div class="p-6 bg-gray-800 rounded-lg shadow-lg text-white ">

                <div class="bg-blue-600 rounded-full p-4 mb-4 inline-block animate-bounce">
                  <svg
                    class="w-12 h-12 mx-auto text-white"
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
                </div>
                <h3 class="text-xl font-semibold mb-4">Pro</h3>
                <p class="text-white-300 mb-6">For businesses and teams</p>
                <p class="text-2xl font-semibold text-blue-400 mb-6">$19.99/mo</p>
                <ul class="text-left text-white-300 mb-6 space-y-2">
                  <li>50 GB Storage</li>
                  <li>Unlimited Transfers</li>
                  <li>Priority Support</li>
                </ul>
                <button
                  class="bg-rgb-primary text-white px-6 py-3 rounded-full text-lg hover:bg-gray-700 hover:text-blue-400 transition duration-300 ease-in-out transform hover:scale-105"
                >
                  Select Plan
                </button>
              </div>
              <!-- Enterprise Plan -->
              <div class="p-6 bg-gray-800 rounded-lg shadow-lg text-white ">

                <div class="bg-blue-600 rounded-full p-4 mb-4 inline-block animate-bounce">
                  <svg
                    class="w-12 h-12 mx-auto text-white"
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
                </div>
                <h3 class="text-xl font-semibold mb-4">Enterprise</h3>
                <p class="text-white-300 mb-6">For large organizations</p>
                <p class="text-2xl font-semibold text-blue-400 mb-6">Contact Us</p>
                <ul class="text-left text-white-300 mb-6 space-y-2">
                  <li>Customized Solutions</li>
                  <li>Unlimited Transfers</li>
                  <li>Dedicated Support</li>
                </ul>
                <button
                  class="bg-rgb-primary text-white px-6 py-3 rounded-full text-lg hover:bg-gray-700 hover:text-blue-400 transition duration-300 ease-in-out transform hover:scale-105"
                >
                  Contact Us
                </button>
              </div>
            </div>
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
    components: {
        GuestNav,
        Head,
    },
};
</script>

<style></style>
