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
                    <th class="pb-4 pt-6 px-6">Recieved File Name</th>
                    <th class="pb-4 pt-6 px-6">File Size</th>
                    <th class="pb-4 pt-6 px-6">Sender Name</th>
                    <th class="pb-4 pt-6 px-6" colspan="2">Reciever Name</th>
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
                            {{ packageData.sender_displayname }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" tabindex="-1">
                            {{ packageData.receiver_username }}
                        </Link>
                    </td>
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
