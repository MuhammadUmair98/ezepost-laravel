<template>
    <div>
        <Head title="Dashboard" ><title>Top up</title></Head>

        <div class="bg-white">
            <div class="container mx-auto">
                <h2 class="text-3xl font-semibold mb-6 text-center">Top up</h2>
                <p class="text-lg text-gray-600 mb-8 text-center">
                    Top up your account
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="p-8 bg-gray-100 rounded-lg shadow">
                        <div class="currency-section">
                            <label class="text-left font-semibold text-md text-gray-600">Choose Currency</label>
                            <ul class="mt-2.5 items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">
                                        <input id="pound" type="radio" value="GBP" v-model="paymentInfo.currency" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                        <label for="pound" class="w-full py-3 ml-2 text-sm font-medium text-gray-900"> Pound </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">
                                        <input id="euro" type="radio" value="EUR" v-model="paymentInfo.currency" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                        <label for="euro" class="w-full py-3 ml-2 text-sm font-medium text-gray-900"> Euro </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">
                                        <input id="dollar" type="radio" value="USD" v-model="paymentInfo.currency" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                        <label for="dollar" class="w-full py-3 ml-2 text-sm font-medium text-gray-900"> US Dollar </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="amount-section py-10">
                            <label class="text-left font-semibold text-md text-gray-600">Choose Amount</label>
                            <ul class="mt-2.5 items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">
                                        <input id="five" type="radio" value="5" v-model="paymentInfo.amount" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                        <label for="five" class="w-full py-3 ml-2 text-sm font-medium text-gray-900"> 5 </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">
                                        <input id="ten" type="radio" value="10" v-model="paymentInfo.amount" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                        <label for="ten" class="w-full py-3 ml-2 text-sm font-medium text-gray-900"> 10 </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">
                                        <input id="twenty" type="radio" value="20" v-model="paymentInfo.amount" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                        <label for="twenty" class="w-full py-3 ml-2 text-sm font-medium text-gray-900"> 20 </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">
                                        <input id="thirty" type="radio" value="30" v-model="paymentInfo.amount" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                        <label for="thirty" class="w-full py-3 ml-2 text-sm font-medium text-gray-900"> 30 </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="selected-section p-4 bg-white rounded-lg shadow">
                            <p class="font-semibold">Selected amount with currency {{ paymentInfo.amount }} ( {{ paymentInfo.currency }} )</p>
                        </div>
                        <div class="checkout-section pt-10 text-end">
                            <button v-if="!isCheckoutButtonClick" @click="showCheckoutSection()" type="button" class="bg-[#312e81] hover:bg-gray-800 text-white px-4 py-2 rounded-full text-lg transition duration-300 ease-in-out"> Checkout </button>
                        </div>
                    </div>
                    <div class="p-8 bg-gray-100 rounded-lg shadow">
                        <div v-if="isCheckoutButtonClick">
                            <h1 class="text-left font-semibold text-md text-gray-600">Billing Information</h1>
                            <div id="card-element"></div>
                            <div class="text-red-700" v-if="!!this.cardError">{{ cardError }}</div>

                            <button @click="getPaymentMethod()" class="px-12 py-2 w-full bg-purple-600 hover:bg-purple-900 rounded text-base text-center text-white uppercase" :class="{ 'opacity-25': this.disable}" :disabled="this.disable" type="button">
                                Top up
                            </button>
                        </div>
                        <div v-else>
                            <h1 class="text-left font-semibold text-md text-gray-600">Total Top up</h1>
                            <ul class="mt-2.5 items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                <li v-for="(amount, key) in TotalTopup" class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">
                                        <label for="pound" class="w-full py-3 ml-2 text-sm font-medium text-gray-900"> {{ key }} ({{ amount }})</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "../../shared/Layout.vue";
import axios from 'axios';

export default {
    data () {
        return {
            isCheckoutButtonClick: false,
            paymentInfo: { currency : 'USD', amount: 5, paymentMethod: '' },
            stripe: {},
            elements: {},
            card: {},
            cardError: '',
            disable: false,
            baseUrl: window.location.origin
        }
    },

    methods: {
        showCheckoutSection() {
            this.isCheckoutButtonClick = true

            if(!!this.isCheckoutButtonClick) {
                this.includeStripe('js.stripe.com/v3/', function() {
                    this.configureStripe();
                }.bind(this));
            }
        },
        includeStripe ( URL, callback ) {
            let documentTag = document, tag = 'script',
                object = documentTag.createElement(tag),
                scriptTag = documentTag.getElementsByTagName(tag)[0];
            object.src = '//' + URL;

            if (callback) { object.addEventListener('load', function (e) { callback(null, e); }, false); }
            scriptTag.parentNode.insertBefore(object, scriptTag);
        },
        async configureStripe () {
            this.stripe = await Stripe( this.SKey );

            this.elements = this.stripe.elements();
            this.card = this.elements.create('card');
            this.card.mount('#card-element');
        },
        async getPaymentMethod () {
            self = this
            self.disable = true
            self.cardError = ''

            const { paymentMethod, error } = await self.stripe.createPaymentMethod (
                'card', self.card, {
                    billing_details: {

                    }
                }
            );

            if(!!error) {
                self.cardError = !!error.message ? error.message: ''
                self.disable = false
            } else {
                if(!!paymentMethod && !!paymentMethod.id)
                    self.userTopup(paymentMethod.id)
                else
                    this.$inertia.visit('/customer/top-up');
            }
        },
        userTopup (key) {
            this.disable = true
            this.cardError = ''
            this.paymentInfo.paymentMethod = key

            axios
                .post('/customer/charge', this.paymentInfo)
                .then((response) => {
                    if(response.data.success === true) {
                        if(!!response.data.data.data3 && (response.data.data.data3 === "requires_action" || response.data.data.data3 === "requires_payment_method")) {
                            let nextUrl = this.baseUrl+'/stripe/payment/'+response.data.data.data1+"?redirect="+response.data.data.data2+""
                            window.location.replace(nextUrl)
                        } else if(!!response.data.data.data4) {
                            this.$inertia.visit('/customer/top-up');
                        } else {
                            this.$inertia.visit('/customer/top-up');
                        }
                    }
                })
                .catch(error => {
                    if(!!error.response && error.response !== undefined && !!error.response.status){
                        this.$inertia.visit('/customer/top-up');
                    }
                })
                .finally(() => {
                    this.disable = false
                });
        }
    },

    components: {
        Head,
        Link
    },

    props: {
        SKey: String,
        TotalTopup: Object
    },

    layout: Layout,
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
