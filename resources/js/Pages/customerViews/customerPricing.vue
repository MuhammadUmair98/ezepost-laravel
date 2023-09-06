<template>
    <div>
        <Head title="Pricing" />

        <div class="container mx-auto text-center py-16">
            <h2 class="text-3xl font-semibold mb-6 text-black">Pricing</h2>

            <!-- toogle -->
            <div class="flex items-center justify-center space-x-4 mb-8">
                <span
                    :class="
                        !showYearlyPlans
                            ? 'text-white text-xl font-bold bg-blue-500 rounded px-4 py-2'
                            : 'text-black-500 text-xl font-bold'
                    "
                >
                    Monthly</span
                >
                <label for="toggle" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input
                            type="checkbox"
                            id="toggle"
                            v-model="showYearlyPlans"
                            class="hidden"
                        />
                        <div
                            class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"
                        ></div>
                        <div
                            class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"
                        ></div>
                    </div>
                </label>
                <span
                    :class="
                        showYearlyPlans
                            ? 'text-white text-xl font-bold bg-blue-500 rounded px-4 py-2 shadow-inner'
                            : 'text-black-500 text-xl font-bold'
                    "
                    >Yearly</span
                >
            </div>

            <p class="text-lg text-gray-400 mb-8">
                Choose a plan that fits your needs
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div
                    v-for="(plan, index) in plans"
                    :key="index"
                    :class="{
                        'border-4 border-green-500':
                            !!activePrice &&
                            !!plan.stripe_plan &&
                            activePrice === plan.stripe_plan,
                    }"
                    class="plan-card"
                >
                    <h3
                        class="text-2xl font-semibold mb-2 text-center text-white"
                    >
                        {{ plan.name }}
                    </h3>
                    <p class="text-lg text-white mb-8 text-center">
                        {{ plan.description }}
                    </p>
                    <p
                        class="text-4xl font-extrabold mb-8 text-center text-white"
                    >
                        ${{ plan.price }}/mo
                    </p>
                    <ul class="text-left text-white mb-6 space-y-4 pb-5">
                        <li
                            v-for="(option, index) in plan.options"
                            :key="index"
                            class="flex items-center"
                        >
                            <svg
                                class="w-5 h-5 text-green-500 mr-2"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            {{ option }}
                        </li>
                    </ul>
                    <Link
                        :class="
                            !!activePrice &&
                            !!plan.stripe_plan &&
                            activePrice === plan.stripe_plan
                                ? 'bg-green-500 hover:bg-green-800'
                                : 'bg-blue-600 hover:bg-blue-800'
                        "
                        class="text-white px-8 py-3 rounded-full text-xl w-full text-center transition duration-300 ease-in-out"
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
    methods: {
        getButtonClass(plan) {
            if (
                this.activePrice &&
                plan.stripe_plan &&
                this.activePrice === plan.stripe_plan
            ) {
                return "bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-full text-lg transition duration-300 ease-in-out";
            }
            return "bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-full text-lg transition duration-300 ease-in-out";
        },
        getButtonText(plan) {
            if (
                this.activePrice &&
                plan.stripe_plan &&
                this.activePrice === plan.stripe_plan
            ) {
                return "Subscribed";
            }
            return "Select Plan";
        },
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
<style scoped>
.plan-card {
    padding: 3rem;
    margin-top: 3rem;
    height: 100%;
    background: #1a202c;
    border-radius: 1rem;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    color: white;
}

.plan-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}
.toggle__line {
    transition: background 0.3s ease-in-out;
    width: 70px; /* 30% smaller than the doubled size */
    height: 28px; /* 30% smaller than the doubled size */
}

.toggle__dot {
    top: -3px; /* Adjust according to new size */
    left: -3px; /* Adjust according to new size */
    transition: all 0.3s ease-in-out;
    width: 34px; /* 30% smaller than the doubled size */
    height: 34px; /* 30% smaller than the doubled size */
}
.toggle-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 130px; /* Adjust based on your needs */
}

input:checked + .toggle__line {
    background: #05328d; /* bg-green-500 */
}

input:checked + .toggle_line + .toggle_dot {
    left: calc(100% - 1px);
    transform: translateX(-100%);
}
</style>
