<template>
    <div>
      <Head title="Dashboard"><title>Pricing</title></Head>
      <h1 class="mb-8 text-3xl font-bold">Design for Business Use</h1>
      
  
      <div class="bg-white py-4">
        <div class="container mx-auto text-center">
          <h2 class="text-3xl font-semibold mb-6">Pricing</h2>
          <label class="relative inline-flex items-center cursor-pointer">
      <input
        type="checkbox"
        v-model="showYearlyPlans"
        class="sr-only peer"
      />
      <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
      <span
        :class="{
          'text-blue-600': showYearlyPlans,
          'text-gray-900 dark:text-gray-300': !showYearlyPlans,
        }"
        class="ml-3 text-sm font-medium"
      >
        {{ showYearlyPlans ? 'Yearly plans' : 'Monthly plans' }}
      </span>
    </label>
          <p class="text-lg text-gray-600 mb-8">
            Choose a plan that fits your needs
          </p>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div
              v-for="plan in filteredPlans"
              :key="plan.id"
              :class="{
                'border border-green-500': !!activePrice && activePrice === plan.stripe_plan,
              }"
              class="p-4 bg-gray-100 rounded-lg shadow"
            >
              <h3 class="text-xl font-semibold mb-2">{{ plan.name }}</h3>
              <h3 class="text-xl font-semibold mb-2">{{ plan.subscription_type }}</h3>
              <p class="text-gray-600 mb-4">{{ plan.description }}</p>
              <p class="text-2xl font-semibold mb-2">${{ plan.price }}/mo</p>
              <ul class="text-left text-gray-600 mb-4">
                <li v-for="option in plan.options">{{ option }}</li>
              </ul>
              <Link
                :class="
                  !!activePrice &&
                  !!plan.stripe_plan &&
                  activePrice === plan.stripe_plan
                    ? 'bg-green-500 hover:bg-green-800'
                    : 'bg-rgb-primary hover:bg-gray-800'
                "
                class="text-white px-4 py-2 rounded-full text-lg transition duration-300 ease-in-out"
                :href="'/customer/checkout/' + plan.slug"
              >
                {{
                  !!activePrice &&
                  !!plan.stripe_plan &&
                  activePrice === plan.stripe_plan
                    ? 'Subscribed'
                    : 'Select Plan'
                }}
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "../../shared/Layout.vue";

export default {
    components: {
        Head,
        Link,
    },
    props: {
        plans: Object,
        activePrice: String,
    },
    layout: Layout,
    data() {
    return {
      showYearlyPlans: false,
    };
  },
  computed: {
    filteredPlans() {
      if (this.showYearlyPlans) {
        return this.plans.filter(plan => plan.subscription_type === 'yearly');
      } else {
        return this.plans.filter(plan => plan.subscription_type === 'monthly');
      }
    },
  },
};
</script>
