<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;

defineProps({customerCount: Number,
             proposalCount: Number,
             invoiceCount: Number,
             transactionCount: Number,


});
</script>


<template>
    <AppLayout title="Dashboard">

        <template #header>
            <h2 class="text-2xl font-bold">
                Dashboard
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-8 px-6">

            <div
                class="bg-gradient-to-r from-[#6366F1] to-[#4F46E5] rounded-3xl shadow-2xl p-8 text-white mb-8">

                <div class="flex items-center justify-between">

                    <div>

                        <h1 class="text-4xl font-bold">
                            Welcome, {{ user.name }}
                        </h1>

                        <p class="mt-3 text-indigo-100 text-lg">
                            Customer Relationship Management System
                        </p>

                        <p class="mt-2 text-indigo-200">
                            Manage Customers, Proposals, Invoices and Transactions from one dashboard.
                        </p>

                    </div>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div
                    class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 p-6">

                    <div class="text-red-600 text-4xl mb-5">
                        
                    </div>

                    <h3 class="text-gray-500 font-semibold">
                        Customers
                    </h3>

                    <p class="text-5xl font-bold text-red-600 mt-4">
                        {{ customerCount }}
                    </p>

                </div>

                <!-- Proposals -->
                <div
                    class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 p-6">

                    <div class="text-green-600 text-4xl mb-4">
                        
                    </div>

                    <h3 class="text-gray-500 font-semibold">
                        Proposals
                    </h3>

                    <p class="text-5xl font-bold text-green-600 mt-4">
                        {{ proposalCount }}
                    </p>

                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 p-6">

                    <div class="text-yellow-500 text-4xl mb-4">
                        
                    </div>

                    <h3 class="text-gray-500 font-semibold">
                        Invoices
                    </h3>

                    <p class="text-5xl font-bold text-yellow-500 mt-4">
                        {{ invoiceCount }}
                    </p>

                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 p-6">

                    <div class="text-blue-600 text-4xl mb-4">
                        
                    </div>

                    <h3 class="text-gray-500 font-semibold">
                        Transactions
                    </h3>

                    <p class="text-5xl font-bold text-blue-600 mt-4">
                        {{ transactionCount }}
                    </p>

                </div>

            </div>

            <div class="mt-10 bg-white rounded-3xl shadow-lg p-8">

                <h2 class="text-2xl font-bold text-gray-800 mb-4">
                    CRM Overview
                </h2>

                <p class="text-gray-600 leading-8">
                    This Customer Relationship Management (CRM) System helps businesses
                    manage customers, create proposals, generate invoices,
                    receive payments using Stripe, and track all transactions
                    from one centralized dashboard.
                </p>

            </div>

        </div>

    </AppLayout>
</template>
