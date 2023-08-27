<template>
    <div>
        <Head title="Dashboard"><title>Checkout</title></Head>
        <h1 class="mb-8 text-3xl font-bold text-center">Selected Plan</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div class="p-4 bg-gray-100 rounded-lg shadow">
                <h3 class="text-xl text-center font-semibold mb-2">
                    {{ plan.name }}
                </h3>
                <p class="text-gray-600 mb-4 text-center">
                    {{ plan.description }}
                </p>
                <p class="text-2xl font-semibold mb-2 text-center">
                    ${{ plan.price }}/mo
                </p>
                <ul class="text-left text-gray-600 mb-4">
                    <li v-for="(option, index) in plan.options" :key="index">
                        {{ option }}
                    </li>
                </ul>
            </div>
            <div
                v-if="
                    !!$page.props.auth.user &&
                    !!$page.props.auth.user.id &&
                    !$page.props.auth.user.subscribe &&
                    !isUserSubscribe
                "
                class="p-4 bg-gray-100 rounded-lg shadow"
            >
                <div>
                    <label class="font-semibold text-md text-gray-600"
                        >Card Details</label
                    >
                    <div id="card-element"></div>
                    <div class="text-red-700" v-if="!!this.cardError">
                        {{ cardError }}
                    </div>

                    <button
                        @click="submitPaymentMethod()"
                        class="px-12 py-2 w-full bg-purple-600 hover:bg-purple-900 rounded text-base text-center text-white uppercase"
                        :class="{ 'opacity-25': this.disable }"
                        :disabled="this.disable"
                        type="button"
                    >
                        Pay
                    </button>
                </div>
            </div>
            <div
                v-else
                class="p-4 bg-gray-100 rounded-lg shadow flex items-center justify-center"
            >
                <div class="text-center">
                    <p
                        class="font-semibold text-md text-gray-600 text-center mb-4"
                    >
                        You are already subscribed.
                    </p>
                    <button
                        @click="cancelStripePlan()"
                        class="bg-rgb-primary text-white px-4 py-2 rounded-full text-lg hover:bg-gray-800 transition duration-300 ease-in-out"
                    >
                        Cancel Plan
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "../../shared/Layout.vue";
import axios from "axios";

export default {
    data() {
        return {
            stripe: {},
            elements: {},
            card: {},
            cardError: "",
            disable: false,
            baseUrl: window.location.origin,
        };
    },

    methods: {
        includeStripe(URL, callback) {
            let documentTag = document,
                tag = "script",
                object = documentTag.createElement(tag),
                scriptTag = documentTag.getElementsByTagName(tag)[0];
            object.src = "//" + URL;

            if (callback) {
                object.addEventListener(
                    "load",
                    function (e) {
                        callback(null, e);
                    },
                    false
                );
            }
            scriptTag.parentNode.insertBefore(object, scriptTag);
        },
        async configureStripe() {
            this.stripe = Stripe(this.SKey);

            this.elements = this.stripe.elements();
            this.card = this.elements.create("card");
            this.card.mount("#card-element");
        },
        async submitPaymentMethod() {
            self = this;
            self.disable = true;
            self.cardError = "";

            await self.stripe
                .confirmCardSetup(self.intentToken.client_secret, {
                    payment_method: {
                        card: self.card,
                    },
                })
                .then(function (result) {
                    if (!!result.error) {
                        self.cardError = result.error.message;
                        self.disable.value = false;
                    } else {
                        self.subscribe(
                            result.setupIntent.payment_method,
                            self.plan.slug
                        );
                    }
                });
        },
        subscribe(key, slug) {
            this.disable = true;

            axios
                .post("/customer/subscribe", { payment: key, slug: slug })
                .then((response) => {
                    if (response.data.success === true) {
                        if (
                            !!response.data.data.data3 &&
                            (response.data.data.data3 === "requires_action" ||
                                response.data.data.data3 ===
                                    "requires_payment_method")
                        ) {
                            let nextUrl =
                                this.baseUrl +
                                "/stripe/payment/" +
                                response.data.data.data1 +
                                "?redirect=" +
                                response.data.data.data2 +
                                "";
                            window.location.replace(nextUrl);
                        } else if (!!response.data.data.data4) {
                            this.$inertia.visit("/customer/pricing");
                        } else {
                            this.$inertia.visit("/customer/pricing");
                        }
                    }
                })
                .catch((error) => {
                    this.$inertia.visit("/customer/pricing");
                })
                .finally(() => {
                    this.disable = false;
                });
        },
        cancelStripePlan() {
            this.$inertia.post("/remove-subscription", {
                plan: this.plan,
            });
        },
    },

    components: {
        Head,
        Link,
    },

    props: {
        plan: Object,
        SKey: String,
        intentToken: Object,
        isUserSubscribe: Boolean,
    },

    layout: Layout,

    mounted() {
        if (
            !this.isUserSubscribe &&
            Object.values(this.intentToken).length > 0
        ) {
            this.includeStripe(
                "js.stripe.com/v3/",
                function () {
                    this.configureStripe();
                }.bind(this)
            );
        }
    },
};
</script>

<style>
.StripeElement {
    margin-top: 10px;
    margin-bottom: 10px;
    height: 40px;
    padding: 10px 12px;
    border: 1px solid #d1d5db;
    border-radius: 0.25rem;
    background-color: white;
}
</style>
