<template>
    <div>
        <Head title="Customers" />
        <h1 class="mb-8 text-3xl font-bold">Customers</h1>
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
                    <th class="pb-4 pt-6 px-6">Names</th>
                    <th class="pb-4 pt-6 px-6">Username</th>
                    <th class="pb-4 pt-6 px-6">Email</th>
                    <th class="pb-4 pt-6 px-6" colspan="2">Phone</th>
                </tr>
                <tr
                    v-for="customer in customers.data"
                    :key="customer.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <Link
                            class="flex items-center px-6 py-4 focus:text-indigo-500"
                            :href="`/customers/${customer.id}/edit`"
                        >
                            {{ customer.name }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link
                            class="flex items-center px-6 py-4"
                            :href="`/customers/${customer.id}/edit`"
                            tabindex="-1"
                        >
                            {{ customer.username }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link
                            class="flex items-center px-6 py-4"
                            :href="`/customers/${customer.id}/edit`"
                            tabindex="-1"
                        >
                            {{ customer.email }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link
                            class="flex items-center px-6 py-4"
                            :href="`/customers/${customer.id}/edit`"
                            tabindex="-1"
                        >
                            {{ customer.phone }}
                        </Link>
                    </td>
                    <td class="w-px border-t">
                        <Link
                            class="flex items-center px-4"
                            :href="`/customers/${customer.id}/edit`"
                            tabindex="-1"
                        >
                            <icon
                                name="cheveron-right"
                                class="block w-6 h-6 fill-gray-400"
                            />
                        </Link>
                    </td>
                </tr>
                <tr v-if="customers.data.length === 0">
                    <td class="px-6 py-4 border-t" colspan="4">
                        No customers found.
                    </td>
                </tr>
            </table>
        </div>
        <pagination class="mt-6" :links="customers.links" />
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
        customers: Object,
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
                this.$inertia.get("/admin/customers", pickBy(this.form), {
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
