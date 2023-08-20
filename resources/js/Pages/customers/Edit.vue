<template>
    <div>
        <Head title="Customers" />
        <h1 class="mb-8 text-3xl font-bold">Customers</h1>
        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form
                class="p-2 bg-white rounded-md shadow overflow-x-auto"
                @submit.prevent="updateCustomer"
            >
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <text-input
                        v-model="editedCustomer.name"
                        :error="errors.name"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        label="Name"
                    />
                    <text-input
                        v-model="editedCustomer.email"
                        :error="errors.email"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        label="Email"
                    />
                    <text-input
                        v-model="editedCustomer.phone"
                        :error="errors.phone"
                        class="pb-8 pr-6 w-full lg:w-1/2"
                        label="Phone"
                    />
                </div>
                <div
                    class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"
                >
                    <loading-button
                        :loading="editedCustomer.processing"
                        class="btn-indigo ml-auto"
                        type="submit"
                        >Update Customer</loading-button
                    >
                </div>
            </form>
        </div>
        <h2 class="mt-12 text-2xl font-bold">Packages Transferred</h2>
        <div class="mt-6 bg-white rounded shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="pb-4 pt-6 px-6">Name</th>
                    <th class="pb-4 pt-6 px-6">File Name</th>
                    <th class="pb-4 pt-6 px-6">Sender Device Name</th>
                    <th class="pb-4 pt-6 px-6">Sender OS</th>
                </tr>
                <tr
                    v-for="packageTransfered in packages"
                    :key="packageTransfered.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <Link
                            class="flex items-center px-6 py-4 focus:text-indigo-500"
                        >
                            {{ packageTransfered.name }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" tabindex="-1">
                            {{ packageTransfered.fileName }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" tabindex="-1">
                            {{ packageTransfered.senderDeviceName }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" tabindex="-1">
                            {{ packageTransfered.senderOS }}
                        </Link>
                    </td>
                </tr>
                <tr v-if="packages.length === 0">
                    <td class="px-6 py-4 border-t" colspan="4">
                        No Packages found.
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import LoadingButton from "../../shared/LoadingButton.vue";
import Layout from "../../shared/Layout.vue";
import TextInput from "../../shared/TextInput.vue";

export default {
    components: {
        Head,
        Link,
        LoadingButton,
        TextInput,
    },
    props: {
        customer: Object,
        errors: Object,
        packages: Object,
    },
    layout: Layout,
    data() {
        return {
            editedCustomer: { ...this.customer },
            successMessage: "",
            errorMessage: "",
        };
    },
    methods: {
        async updateCustomer() {
            try {
                await this.$inertia.put(
                    `/customers/${this.editedCustomer.id}/update`,
                    this.editedCustomer
                );
                this.successMessage = "Customer updated successfully.";
                this.errorMessage = ""; // Clear previous error message
            } catch (error) {
                this.successMessage = ""; // Clear previous success message
                this.errorMessage =
                    "An error occurred while updating the customer.";
            }
        },
    },
};
</script>
