<template>
    <div>
        <Head title="Packages Today" />
        <h1 class="mb-8 text-3xl font-bold">Packages History</h1>
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
                    <th class="pb-4 pt-6 px-6">File name</th>
                    <th class="pb-4 pt-6 px-6">Sender name</th>
                    <th class="pb-4 pt-6 px-6">Reciever name</th>
                    <th class="pb-4 pt-6 px-6">File size</th>
                    <th class="pb-4 pt-6 px-6">Recieved date</th>
                </tr>
                <tr
                    v-for="packageItem in packagesHistory?.data"
                    :key="packageItem.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <div
                            class="flex items-center px-6 py-4 focus:text-indigo-500"
                        >
                            {{ packageItem.fileName }}
                        </div>
                    </td>
                    <td class="border-t">
                        <div class="flex items-center px-6 py-4" tabindex="-1">
                            {{ packageItem.senderName }}
                        </div>
                    </td>
                    <td class="border-t">
                        <div class="flex items-center px-6 py-4" tabindex="-1">
                            {{ packageItem.recieverName }}
                        </div>
                    </td>
                    <td class="border-t">
                        <div class="flex items-center px-6 py-4" tabindex="-1">
                            {{ packageItem.fileSize }}
                        </div>
                    </td>
                    <td class="border-t">
                        <div class="flex items-center px-6 py-4" tabindex="-1">
                            {{ packageItem.recievedDate }}
                        </div>
                    </td>
                </tr>
                <tr v-if="packagesHistory?.data.length === 0">
                    <td class="px-6 py-4 border-t" colspan="5">
                        No Packages found.
                    </td>
                </tr>
            </table>
        </div>
        <pagination class="mt-6" :links="packagesHistory.links" />
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
        packagesHistory: Object,
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
                this.$inertia.get(
                    "/admin/packages/history",
                    pickBy(this.form),
                    {
                        preserveState: true,
                    }
                );
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
