<template>
    <div>
        <Head title="Pricing" />
        <h1 class="mb-8 text-3xl font-bold">Pricing</h1>

        <div
            class="bg-gradient-to-b from-blue-800 via-blue-900 to-gray-900 min-h-screen"
        >
            <div class="container mx-auto text-center py-16">
                <h2 class="text-3xl font-semibold mb-6 text-white">Pricing</h2>
                <p class="text-lg text-gray-400 mb-8">
                    Choose a plan that fits your needs
                </p>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                >
                    <div
                        v-for="(plan, index) in plans"
                        :key="index"
                        :class="{
                            'border border-green-500':
                                !!activePrice &&
                                !!plan.stripe_plan &&
                                activePrice === plan.stripe_plan,
                        }"
                        class="p-4 bg-gray-100 rounded-lg shadow transform hover:-translate-y-1 transition-transform"
                    >
                        <h3 class="text-xl font-semibold mb-2">
                            {{ plan.name }}
                        </h3>
                        <p class="text-gray-600 mb-4">{{ plan.description }}</p>
                        <p class="text-2xl font-semibold mb-2">
                            ${{ plan.price }}/mo
                        </p>
                        <ul class="text-left text-gray-600 mb-4">
                            <li
                                v-for="(option, index) in plan.options"
                                :key="index"
                            >
                                {{ option }}
                            </li>
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
                                    ? "Subscribed"
                                    : "Select Plan"
                            }}
                        </Link>
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-gray-800 py-8 mt-auto">
            <div class="container mx-auto text-center">
                <p class="text-gray-400">
                    &copy; 2023 ezepost. All rights reserved.
                </p>
            </div>
        </footer>
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
                return this.plans.filter(
                    (plan) => plan.subscription_type === "yearly"
                );
            } else {
                return this.plans.filter(
                    (plan) => plan.subscription_type === "monthly"
                );
            }
        },
    },
};
</script>
