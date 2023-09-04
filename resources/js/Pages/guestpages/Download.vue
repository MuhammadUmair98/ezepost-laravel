<template>
    <div>
      <Head title="Download" />
      <div class="flex flex-col min-h-screen">
        <guest-nav></guest-nav>
  
        <div class="flex-grow bg-gradient-to-b from-blue-800 via-blue-900 to-gray-900 py-16">
          <div class="container mx-auto text-center mb-3">
            <div class="mb-8 flex items-center justify-center ">
            <svg
              class="w-10 h-10 text-white "
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
              
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 19h16v-7h2v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-8h2v7zM14 9h5l-7 7-7-7h5V3h4v6z"
              ></path>
            </svg>
            <h2 class="text-4xl font-semibold text-white mb-6 ml-4 mt-3">Download</h2>
        </div>
            
            <p class="text-lg text-white mb-8">
              Download the ezepost app for different platforms
            </p>
            
            <div
              class="grid grid-cols-1 md:grid-cols-3 gap-8 "
            >
              <!-- Windows Download -->
              <div class="p-6 bg-gray-800 rounded-lg shadow-lg text-white">
              <div class="mb-4 animate-bounce">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 22 22"
                  class="w-12 h-12 mx-auto text-rgb-primary"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6.555 1.375 0 2.237v5.45h6.555V1.375zM0 13.795l6.555.933V8.313H0v5.482zm7.278-5.4.026 6.378L16 16V8.395H7.278zM16 0 7.33 1.244v6.414H16V0z"
                  ></path>
                </svg>
              </div>
              <h3 class="text-xl font-semibold mb-2">Windows</h3>
              <p class="text-white-300 mb-4">
                Download the ezepost app for Windows
              </p>
              <a
                href="#"
                class="block w-1/2 mx-auto bg-rgb-primary text-white px-6 py-3 p-3 rounded-full text-lg hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105"
              >
                Download Now
              </a>
              <p class="text-white-300 p-3">Minimum System Requirements:</p>
              <ul class="text-left text-white mb-4">
                <li>Windows 10</li>
                <li>2GB RAM</li>
                <li>50MB Storage</li>
              </ul>
            </div>

            <!-- Apple Download -->
            <div class="p-6 bg-gray-800 rounded-lg shadow-lg text-white">
              <div class="mb-4 animate-bounce ">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 18 18"
                  class="w-12 h-12 mx-auto text-rgb-primary"
                >
                  <path
                    d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282z"
                  ></path>
                </svg>
              </div>
              <h3 class="text-xl font-semibold mb-2">Apple</h3>
              <p class="text-white-300 mb-4">
                Download the ezepost app for Apple devices
              </p>
              <a
                href="#"
                class="block w-1/2 mx-auto bg-rgb-primary text-white px-6 py-3 p-3 rounded-full text-lg hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105"
              >
                Download Now
              </a>
              <p class="text-white-300 p-3">Minimum System Requirements:</p>
              <ul class="text-left text-white mb-4">
                <li>iOS 12+</li>
                <li>100MB Storage</li>
              </ul>
            </div>

            <!-- Linux Download -->
            
            <div class="p-6 bg-gray-800 rounded-lg shadow-lg text-white">
              <div class="mb-4 animate-bounce">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="white"
                  stroke="currentColor"
                  viewBox="0 0 256 256"
                  class="w-12 h-12 mx-auto text-rgb-primary"
                >
                  <path
                    d="M161.2,217.7a4,4,0,0,1-3.3,6.3H98.1a4,4,0,0,1-3.3-6.3,40,40,0,0,1,66.4,0Zm68.6,3.8a8.2,8.2,0,0,1-6,2.5H184.6a4.1,4.1,0,0,1-3.8-2.7,56,56,0,0,0-105.6,0,4.1,4.1,0,0,1-3.8,2.7H32.2a8,8,0,0,1-6-2.5,7.9,7.9,0,0,1-1.1-9.5c.3-.5,30.9-55,30.9-116a72.1,72.1,0,0,1,72.5-72c39.6.3,71.4,32.9,71.5,72.5.2,60.8,30.6,115,30.9,115.5A7.9,7.9,0,0,1,229.8,221.5ZM88,108a12,12,0,1,0,12-12A12,12,0,0,0,88,108Zm79.2,32.4a8.2,8.2,0,0,0-10.8-3.6L128,151.1,99.6,136.8a8,8,0,1,0-7.2,14.4l32,16a8.5,8.5,0,0,0,7.2,0l32-16A8.2,8.2,0,0,0,167.2,140.4ZM168,108a12,12,0,1,0-12,12A12,12,0,0,0,168,108Z"
                  ></path>
                </svg>
                

              </div>
              <h3 class="text-xl font-semibold mb-2">Linux</h3>
              <p class="text-white-300 mb-4">
                Download the ezepost app for Linux distributions
              </p>
              <a
                href="#"
                class="block w-1/2 mx-auto bg-rgb-primary text-white px-6 py-3 p-3 rounded-full text-lg hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105"
              >
                Download Now
              </a>
              <p class="text-white-300 p-3">Minimum System Requirements:</p>
              <ul class="text-left text-white mb-4">
                <li>Ubuntu 18.04+</li>
                <li>64-bit Architecture</li>
                <li>100MB Storage</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="bg-gray-800 py-8">
      <div class="container mx-auto text-center">
        <p class="text-gray-300">&copy; 2023 ezepost. All rights reserved.</p>
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
