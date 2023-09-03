<template>
    <div :class="[collapsed ? '' : 'w-56']">
        <div v-if="this.$page.props.auth.user.user_type === 'admin'">
            <div class="mb-0">
                <Link
                    class="group flex items-center py-3"
                    href="/admin/dashboard"
                >
                    <icon
                        name="dashboard"
                        class="mr-2 w-4 h-4"
                        :class="
                            isUrl('admin/dashboard')
                                ? 'fill-white'
                                : 'menuTextColor group-hover:fill-white'
                        "
                    />
                    <div
                        :class="
                            isUrl('admin/dashboard')
                                ? 'text-white menu-text'
                                : 'menuTextColor group-hover:text-white menu-text menu-text'
                        "
                    >
                        Dashboard
                    </div>
                </Link>
            </div>
            <div class="py-3">
                <div class="tabs">
                    <div class="relative tab">
                        <input
                            class="tab-checkbox"
                            type="checkbox"
                            id="master-plan-accordion"
                            :checked="true"
                        />
                        <label
                            class="tab-label styles-configurator-tab-label"
                            :style="`${
                                collapsed ? 'display: none !important' : ''
                            }`"
                            for="master-plan-accordion"
                        >
                            {{ "Packages" }}
                        </label>
                        <div
                            :class="[
                                'tab-content',
                                !collapsed ? 'pl-3 pt-3' : '',
                            ]"
                        >
                            <div class="mb-0">
                                <Link
                                    class="group flex items-center py-2"
                                    href="/admin/packages/today"
                                >
                                    <icon
                                        name="office"
                                        class="mr-2 w-4 h-4"
                                        :class="
                                            isUrl('admin/packages/today')
                                                ? 'fill-white'
                                                : 'menuTextColor group-hover:fill-white'
                                        "
                                    />
                                    <div
                                        :class="
                                            isUrl('admin/packages/today')
                                                ? 'text-white menu-text'
                                                : 'menuTextColor group-hover:text-white menu-text'
                                        "
                                    >
                                        {{ "Packages Today" }}
                                    </div>
                                </Link>
                            </div>
                            <div class="mb-0">
                                <Link
                                    class="group flex items-center py-2"
                                    href="/admin/packages/history"
                                >
                                    <icon
                                        name="users"
                                        class="mr-2 w-4 h-4"
                                        :class="
                                            isUrl('admin/packages/history')
                                                ? 'fill-white'
                                                : 'menuTextColor group-hover:fill-white'
                                        "
                                    />
                                    <div
                                        :class="
                                            isUrl('admin/packages/history')
                                                ? 'text-white menu-text'
                                                : 'menuTextColor group-hover:text-white menu-text'
                                        "
                                    >
                                        {{ "Packages History" }}
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-3">
                <div class="tabs">
                    <div class="relative tab">
                        <input
                            class="tab-checkbox"
                            type="checkbox"
                            id="customer-accordian"
                            :checked="true"
                        />
                        <label
                            class="tab-label styles-configurator-tab-label"
                            :style="`${
                                collapsed ? 'display: none !important' : ''
                            }`"
                            for="customer-accordian"
                        >
                            {{ "Customer" }}
                        </label>
                        <div
                            :class="[
                                'tab-content',
                                !collapsed ? 'pl-3 pt-3' : '',
                            ]"
                        >
                            <div class="mb-0">
                                <Link
                                    class="group flex items-center py-2"
                                    href="/admin/customers"
                                >
                                    <icon
                                        name="office"
                                        class="mr-2 w-4 h-4"
                                        :class="
                                            isUrl('admin/customers')
                                                ? 'fill-white'
                                                : 'menuTextColor group-hover:fill-white'
                                        "
                                    />
                                    <div
                                        :class="
                                            isUrl('admin/customers')
                                                ? 'text-white menu-text'
                                                : 'menuTextColor group-hover:text-white menu-text'
                                        "
                                    >
                                        {{ "Customers" }}
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else-if="this.$page.props.auth.user.user_type === 'customer'">
            <div class="mb-0">
                <Link
                    class="group flex items-center py-3"
                    href="/customer/dashboard"
                >
                    <icon
                        name="dashboard"
                        class="mr-2 w-4 h-4"
                        :class="
                            isUrl('customer/dashboard')
                                ? 'fill-white'
                                : 'menuTextColor group-hover:fill-white'
                        "
                    />
                    <div
                        :class="
                            isUrl('customer/dashboard')
                                ? 'text-white menu-text'
                                : 'menuTextColor group-hover:text-white menu-text menu-text'
                        "
                    >
                        Dashboard
                    </div>
                </Link>
                
            </div>
            <div class="mb-4">
                <div class="py-3">
                    <div class="tabs">
                        <div class="relative tab">
                            <input
                                class="tab-checkbox"
                                type="checkbox"
                                id="customer-accordian"
                                :checked="true"
                            />
                            <label
                                class="tab-label styles-configurator-tab-label"
                                :style="`${
                                    collapsed ? 'display: none !important' : ''
                                }`"
                                for="customer-accordian"
                            >
                                {{ "Payments" }}
                            </label>
                            <div
                                :class="[
                                    'tab-content',
                                    !collapsed ? 'pl-3 pt-3' : '',
                                ]"
                            >
                                <div class="mb-0">
                                    <Link
                                        class="group flex items-center py-3"
                                        href="/customer/personal"
                                    >
                                        <icon
                                            name="printer"
                                            class="mr-2 w-4 h-4"
                                            :class="
                                                isUrl('customer/personal')
                                                    ? 'fill-white'
                                                    : 'fill-indigo-400 group-hover:fill-white'
                                            "
                                        />
                                        <div
                                            :class="
                                                isUrl('customer/personal')
                                                    ? 'text-white'
                                                    : 'text-indigo-300 group-hover:text-white'
                                            "
                                        >
                                            Personal
                                        </div>
                                    </Link>
                                    <Link
                                        class="group flex items-center py-3"
                                        href="/customer/business"
                                    >
                                        <icon
                                            name="printer"
                                            class="mr-2 w-4 h-4"
                                            :class="
                                                isUrl('customer/business')
                                                    ? 'fill-white'
                                                    : 'fill-indigo-400 group-hover:fill-white'
                                            "
                                        />
                                        <div
                                            :class="
                                                isUrl('customer/business')
                                                    ? 'text-white'
                                                    : 'text-indigo-300 group-hover:text-white'
                                            "
                                        >
                                            Business
                                        </div>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
div::-webkit-scrollbar {
    width: 4px;
    height: 4px;
}

div::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

div::-webkit-scrollbar-thumb {
    background-color: #818cf8;
    outline: 1px solid slategrey;
    border-radius: 5px;
}

.collapse-icon {
    user-select: none;
}
</style>

<style scoped lang="scss">
/* Accordion styles */
.tabs {
    overflow: hidden;
}

.tab {
    width: 100%;
    color: #b6bfbf;
    overflow: hidden;
    &-label {
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        /* Icon */
        &:hover {
        }
        &::after {
            content: "\276F";
            text-align: center;
            transition: all 0.35s;
            color: #b6bfbf;
            position: absolute;
            right: 10px;
            margin-top: 15px;
        }
    }
    &-content {
        display: none;
        max-height: 0;
        color: #b6bfbf;
        transition: all 0.35s;
    }
    &-close {
        display: flex;
        justify-content: flex-end;
        font-size: 0.75em;
        cursor: pointer;
        &:hover {
        }
    }
}

.styles-configurator-tab-label::after {
    margin-top: 0px !important;
}

// :checked
input:checked {
    + .tab-label {
        &::after {
            transform: rotate(90deg);
            transform-origin: center;
        }
    }
    ~ .tab-content {
        display: block;
        max-height: 100vh;
    }
}

.inner-accordion-label::after {
    transform: rotate(90deg);
    transform-origin: center;
}

input[class="tab-checkbox"] {
    position: absolute;
    opacity: 0;
    z-index: -1;
}

.inner-accordion {
    display: none;
}

.menuTextColor {
    color: #b6bfbf;
    fill: #b6bdbf;
}
</style>
<script>
import { Link } from "@inertiajs/vue3";
import Icon from "../shared/Icon.vue";

export default {
    components: {
        Icon,
        Link,
    },
    data() {
        return {
            collapsed: false,
        };
    },
    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1);
            if (urls[0] === "") {
                return currentUrl === "";
            }
            return urls.filter((url) => currentUrl.startsWith(url)).length;
        },

        collapse() {
            Array.from(document.querySelectorAll(".menu-text")).forEach(
                (menu) => {
                    menu.style.display = this.collapsed ? "block" : "none";
                }
            );
            this.collapsed = !this.collapsed;
            localStorage.setItem("collapsed", this.collapsed);
        },
    },
};
</script>
