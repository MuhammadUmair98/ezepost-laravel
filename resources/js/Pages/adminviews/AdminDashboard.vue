<template>
    <div>
        <Head title="Dashboard" />
        <h1 class="mb-8 text-3xl font-bold">Dashboard</h1>
        <div class="p-3 mb-4 bg-white rounded-md shadow overflow-x-auto">
            <p class="total_customers text-center">Total Customers: <span class="count_customer">{{ customerCount }}</span></p>
        </div>

        <div v-if="customerCount > 0" class="bg-white rounded-md shadow overflow-x-auto">
            <h3 class="total_customers text-center mb-2"><u>Recent Customers</u></h3>

            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="pb-4 pt-6 px-6">Names</th>
                    <th class="pb-4 pt-6 px-6">Username</th>
                    <th class="pb-4 pt-6 px-6">Email</th>
                    <th class="pb-4 pt-6 px-6" colspan="2">Phone</th>
                </tr>
                <tr
                    v-for="customer in recentCustomers"
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

                </tr>

            </table>
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
    recentCustomers: Object, // Add this line for the recentCustomers prop
  },
  layout: Layout,
};
</script>
