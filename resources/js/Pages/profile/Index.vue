<template>
    <div>
        <h1 class="mb-8 text-3xl text-center font-bold">My Profile</h1>
      <form class="p-2 bg-white rounded-md shadow overflow-x-auto" @submit.prevent="updateProfile">
        <div class="text-left p-2">
          <label class="font-bold">Name:</label>
          <input class="text-center" v-model="user.name" />
        </div>
        <div class="text-left p-2 border-t border-b">
          <label class="font-bold">New Passsword:</label>
          <input class="text-center" type="password" v-model="newPassword" />
        </div>

        <div class="mt-2 text-center">
            <loading-button

                        class="btn-indigo mx-auto"
                        type="submit"
                        >Update Profile</loading-button
                    >
        </div>
        <p v-if="successMessage" class="text-green-500">{{ successMessage }}</p>
        <p v-if="errorMessage" class="text-red-500">{{ errorMessage }}</p>
      </form>
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
import LoadingButton from "../../shared/LoadingButton.vue";
export default {
    components: {
        Head,
        LoadingButton,
        Icon,
        Link,
        Pagination,
        SearchFilter,
    },
    layout: Layout,
    props: {
      user: Object
    },
    data() {
      return {
        newPassword: '',
        successMessage: '',
        errorMessage: ''
      };
    },
    methods: {
      async updateProfile() {
        try {
          await this.$inertia.put('/profile/update', {
            name: this.user.name,
            newPassword: this.newPassword
          });

          this.successMessage = 'Profile updated successfully.';
          this.errorMessage = ''; // Clear previous error message
        } catch (error) {
          console.error(error);
          this.successMessage = ''; // Clear previous success message
          this.errorMessage = 'An error occurred while updating the profile.';
        }
      }
    }
  };
  </script>
