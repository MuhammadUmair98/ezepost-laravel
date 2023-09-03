<template>
    <div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="/">
                <icon
                    name="dashboard"
                    class="mr-2 w-4 h-4"
                    :class="
                        isUrl('')
                            ? 'fill-white'
                            : 'fill-indigo-400 group-hover:fill-white'
                    "
                />
                <div
                    :class="
                        isUrl('')
                            ? 'text-white'
                            : 'text-indigo-300 group-hover:text-white'
                    "
                >
                    Dashboard
                </div>
            </Link>
        </div>
        <div v-show="isUrl('organizations') || isUrl('admin/customers') " class="mb-4">
            <Link class="group flex items-center py-3" href="/admin/customers">
                <icon
                    name="office"
                    class="mr-2 w-4 h-4"
                    :class="
                        isUrl('organizations')
                            ? 'fill-white'
                            : 'fill-indigo-400 group-hover:fill-white'
                    "
                />
                <div
                    :class="
                        isUrl('admin/customers')
                            ? 'text-white'
                            : 'text-indigo-300 group-hover:text-white'
                    "
                >
                    Customers
                </div>
            </Link>
        </div>
        <div v-show="isUrl('reports')" class="mb-4">
            <Link class="group flex items-center py-3" href="/reports">
                <icon
                    name="printer"
                    class="mr-2 w-4 h-4"
                    :class="
                        isUrl('reports')
                            ? 'fill-white'
                            : 'fill-indigo-400 group-hover:fill-white'
                    "
                />
                <div
                    :class="
                        isUrl('reports')
                            ? 'text-white'
                            : 'text-indigo-300 group-hover:text-white'
                    "
                >
                    Reports
                </div>
            </Link>
        </div>
        <div v-show="isUrl('customer/pricing') || isUrl('customer/dashboard') || isUrl('customer/checkout') || isUrl('customer/top-up')" class="mb-4">
            <Link class="group flex items-center py-3" href="/customer/pricing">
                <icon
                    name="printer"
                    class="mr-2 w-4 h-4"
                    :class="
                        isUrl('customer/pricing')
                            ? 'fill-white'
                            : 'fill-indigo-400 group-hover:fill-white'
                    "
                />
                <div
                    :class="
                        isUrl('customer/dashboard')
                            ? 'text-white'
                            : 'text-indigo-300 group-hover:text-white'
                    "
                >
                    Pricing
                </div>
            </Link>
        </div>
        <div v-show="isUrl('customer/pricing') || isUrl('customer/dashboard') || isUrl('customer/checkout') || isUrl('customer/top-up')" class="mb-4">
            <Link class="group flex items-center py-3" href="/customer/top-up">
                <icon
                    name="printer"
                    class="mr-2 w-4 h-4"
                    :class="
                        isUrl('customer/pricing')
                            ? 'fill-white'
                            : 'fill-indigo-400 group-hover:fill-white'
                    "
                />
                <div
                    :class="
                        isUrl('customer/dashboard')
                            ? 'text-white'
                            : 'text-indigo-300 group-hover:text-white'
                    "
                >
                    Top up
                </div>
            </Link>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import Icon from "../shared/Icon.vue";

export default {
    components: {
        Icon,
        Link,
    },
    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1);
            if (urls[0] === "") {
                return currentUrl === "";
            }
            return urls.filter((url) => currentUrl.startsWith(url)).length;
        },
    },
};
</script>
