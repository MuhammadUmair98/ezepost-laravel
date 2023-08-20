<template>
    <div>
      <h1 class="mb-8 text-3xl text-center font-bold">Customer Details</h1>
      <form class="p-2 bg-white rounded-md shadow overflow-x-auto" @submit.prevent="updateCustomer">
        <table class="w-full whitespace-nowrap">
          <tr class="text-left border-t">
            <td class="p-2 font-bold">Name:</td>
            <td>
              <input v-model="editedCustomer.name" />
            </td>
          </tr>
          <tr class="text-left border-t">
            <td class="p-2 font-bold">Email:</td>
            <td>
              <input v-model="editedCustomer.email" />
            </td>
          </tr>
          <tr class="text-left border-t">
            <td class="p-2 font-bold">Contact No:</td>
            <td>
              <input v-model="editedCustomer.phone" />
            </td>
          </tr>
        </table>
        <div class="mt-2 text-center">
            <loading-button

                        class="btn-indigo mx-auto"
                        type="submit"
                        >Save Changes</loading-button
                    >
        </div>


        <p v-if="successMessage" class="text-green-500">{{ successMessage }}</p>
        <p v-if="errorMessage" class="text-red-500">{{ errorMessage }}</p>
      </form>
    </div>
  </template>

  <script>
  import { Head } from "@inertiajs/vue3";
import LoadingButton from "../../shared/LoadingButton.vue";
  import Layout from "../../shared/Layout.vue";

  export default {
    components: {
      Head,
      LoadingButton,
    },
    props: {
      customer: Object,
    },
    layout: Layout,
    data() {
      return {
        editedCustomer: { ...this.customer },
        successMessage: '',
        errorMessage: '',
      };
    },
    methods: {
      async updateCustomer() {
        try {
          await this.$inertia.put(`/customers/${this.editedCustomer.id}/update`, this.editedCustomer);
          this.successMessage = 'Customer updated successfully.';
          this.errorMessage = ''; // Clear previous error message
        } catch (error) {
          console.error(error);
          this.successMessage = ''; // Clear previous success message
          this.errorMessage = 'An error occurred while updating the customer.';
        }
      },
    },
  };
  </script>
