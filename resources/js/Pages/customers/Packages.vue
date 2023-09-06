<template>
    <div>
        <Head :title="headText" />
        <h1 class="mb-8 text-3xl font-bold">{{ headText }}</h1>
        <div class="flex items-center justify-between mb-6">
            <search-filter
                v-model="form.search"
                class="mr-4 w-full max-w-md"
                @reset="reset"
            >
            </search-filter>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="pb-4 pt-6 px-6">File Name</th>
                    <th class="pb-4 pt-6 px-6">File Size</th>
                    <th class="pb-4 pt-6 px-6">Sender Name</th>
                    <th class="pb-4 pt-6 px-6">Reciever Name</th>
                    <th class="pb-4 pt-6 px-6">Date</th>
                    <th class="pb-4 pt-6 px-6">View Receipt </th>
                    <th class="pb-4 pt-6 px-6">Download Receipt</th>
                </tr>
                <tr
                    v-for="packageData in packages.data"
                    :key="packageData.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >   
                    <td class="border-t">
                        <Link
                            class="flex items-center px-6 py-4 focus:text-indigo-500"
                        >
                            {{ packageData.file_name }}  
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" tabindex="-1">
                            {{ packageData.file_size_original }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" tabindex="-1">
                            {{ packageData.sender_username }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" tabindex="-1">
                            {{ packageData.receiver_username }}
                        </Link>
                        </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" tabindex="-1">
                            <span v-if="url === '/customer/received/history'">{{ packageData.ltime_recv_end ? packageData.ltime_recv_end : "No Date" }}</span>
                            <span v-if="url === '/customer/viewed/history'">{{ packageData.time_post_opened }}</span>
                            <span v-if="url === '/customer/sent/history'">{{ packageData.ltime_send_end ? packageData.ltime_send_end : "No Date" }}</span>

                            <span v-if="url === '/customer/received/today'">{{ packageData.ltime_recv_end }}</span>
                            <span v-if="url === '/customer/sent/today'">{{ packageData.ltime_send_end }}</span>
                            <span v-if="url === '/customer/viewed/today'">{{ packageData.time_post_opened }}</span>
                           
                        </Link>
                    </td>
                    <a
    v-bind:href="'/vepost-tracking/view-pdf/' + packageData.id"
    target="_blank"
    class="flex items-center px-6 py-4"
>
    <!-- new SVG for view -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0 0 0 0 0 0zm-2-4h4"></path></svg>
</a>
                    <td class="border-t">
    <a
        v-bind:href="'/vepost-tracking/pdf/' + packageData.id"
        class="flex items-center px-6 py-4"
        download
    >
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5"/></svg>
    </a>
</td>

                    <div>
   
  </div>
                </tr>
                <tr v-if="packages.data.length === 0">
                    <td class="px-6 py-4 border-t" colspan="4">
                        No packages found.
                    </td>
                </tr>
            </table>
        </div>
        <pagination class="mt-6" :links="packages.links" />
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import Icon from "../../shared/Icon.vue";
import pickBy from "lodash/pickBy";
import Layout from "../../shared/Layout.vue";
import throttle from "lodash/throttle";
import mapValues from "lodash/mapValues";
import Pagination from "../../shared/Pagination.vue";
import SearchFilter from "../../shared/SearchFilter.vue";

export default {
    components: {
        Head,
        Icon,
        Link,
        Pagination,
        SearchFilter,
    },
    layout: Layout,
    props: {
        packages: Object,
        headText: String,
        url: String,
    },
    data() {
        return {
            form: {
                search: "",
            },
        };
    },
    computed: {
    isReceivedHistoryRoute() {
      // Check if the current route path matches the desired pattern
      return this.$url === '/customer/recieved/history';
    },
  },
    watch: {
        form: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get(this.url, pickBy(this.form), {
                    preserveState: true,
                });
            }, 150),
        },
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null);
        },
    },
};


</script>
