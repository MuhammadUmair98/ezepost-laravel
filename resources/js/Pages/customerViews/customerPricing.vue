<template>
    <div>
        <Head title="Dashboard" ><title>Pricing</title></Head>
        <h1 class="mb-8 text-3xl font-bold">Pricing</h1>

        <div class="bg-white py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-semibold mb-6">Pricing</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Choose a plan that fits your needs
                </p>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                >
                    <div
                        v-for="plan in plans"
                        :class="{ 'border border-green-500': !!activePrice && !!plan.stripe_plan && activePrice === plan.stripe_plan }"
                        class="p-4 bg-gray-100 rounded-lg shadow"
                    >
                        <h3 class="text-xl font-semibold mb-2">{{ plan.name }}</h3>
                        <p class="text-gray-600 mb-4">
                            {{ plan.description }}
                        </p>
                        <p class="text-2xl font-semibold mb-2">${{ plan.price }}/mo</p>
                        <ul class="text-left text-gray-600 mb-4">
                            <li v-for="option in plan.options">{{ option }}</li>
                        </ul>
                        <Link
                            :class="!!activePrice && !!plan.stripe_plan && activePrice === plan.stripe_plan ? 'bg-green-500 hover:bg-green-800': 'bg-rgb-primary hover:bg-gray-800'"
                            class="text-white px-4 py-2 rounded-full text-lg transition duration-300 ease-in-out"
                            :href="'/customer/checkout/'+ plan.slug"
                        >
                            {{ !!activePrice && !!plan.stripe_plan && activePrice === plan.stripe_plan ? 'Subscribed': 'Select Plan' }}
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
        Link
    },
    props: {
        plans: Object,
        activePrice: String
    },
    layout: Layout,
};
</script>
