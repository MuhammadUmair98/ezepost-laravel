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
                    <th class="text-center pb-4 pt-6 px-6">Download</th>
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
                            {{ packageTransfered.s_name }}
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

                    <td class="text-center border-t">
                        <button @click="downloadPDF(packageTransfered)">
                            <img class="w-44" src="/assets/download_icon.png" alt="Download Icon" />
                        </button>
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
import jsPDF from 'jspdf';

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

        downloadPDF(packageTransfered) {
            const pdf = new jsPDF();

            const xOffset = 10;
            let yOffset = 20; // Initial yOffset value

            const lineHeight = 10;
            const tableWidth = 180;
            const pageWidth = pdf.internal.pageSize.width;

            pdf.setFontSize(16);
            const headingText = `Package Details: ${packageTransfered.s_name}`;
            const headingWidth = pdf.getStringUnitWidth(headingText) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;
            const headingX = (pageWidth - headingWidth) / 2; // Calculate centered x-coordinate
            pdf.text(headingText, headingX, yOffset);

            yOffset += 15; // Increase yOffset for spacing after heading

            pdf.setFontSize(12);

            const tableData = [
                ['File Name:', packageTransfered.fileName],
                ['File Size Transfer:', packageTransfered.fileSizeTransfer],
                ['Sender OS:', packageTransfered.senderOS],
                ['Sender Device Name:', packageTransfered.senderDeviceName],
                ['Receiver Name:', packageTransfered.r_name],
                ['Receiver OS:', packageTransfered.receiverOS],
                ['Receiver Device Name:', packageTransfered.receiverDeviceName],
                ['Sending Time:', packageTransfered.senttime],
            ];

            tableData.forEach((row, rowIndex) => {
                const fillColor = rowIndex % 2 === 0 ? [240, 240, 240] : [255, 255, 255];

                row.forEach((cell, cellIndex) => {
                pdf.setFillColor(fillColor[0], fillColor[1], fillColor[2]);
                pdf.rect(
                    xOffset + cellIndex * (tableWidth / 2),
                    yOffset + rowIndex * lineHeight,
                    tableWidth / 2,
                    lineHeight,
                    'F'
                );

                const textColor = cellIndex === 0 ? [0, 0, 0] : [100, 100, 100];
                pdf.setTextColor(textColor[0], textColor[1], textColor[2]);

                pdf.text(
                    cell,
                    xOffset + cellIndex * (tableWidth / 2) + 2,
                    yOffset + (rowIndex + 0.5) * lineHeight + 3
                );
                });
            });

            pdf.save(`package_${packageTransfered.s_name}.pdf`);
        }

    },
};
</script>
