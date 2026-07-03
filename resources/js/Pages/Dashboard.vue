<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;

defineProps({customerCount: Number,
             proposalCount: Number,


});
</script>


<template>
    <AppLayout title="Dashboard">

        <template #header>
            <h2 class="text-2xl font-bold">
                Dashboard
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-8">

            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h2 class="text-xl font-bold">
                    Welcome, {{ user.name }}
                </h2>
                <p style="color:slateblue;" class="text-gry-500 mt-2"><b></b>
                    Manage your customers,Proposals,Invoices and Transactions
                </p>
            </div>

            <div class="grid grid-cols-4 gap-4">

                <div class="bg-red-600 text-white p-6 rounded text-center">
                    Total Customers
                    <p class="text-4xl font-bold mt-4">
                        {{ customerCount }}
                    </p>
                </div>

                <div class="bg-green-600 text-white p-6 rounded text-center">
                    Total Proposals
                    <p class="text-4xl font-bold mt-4">
                        {{ proposalCount }}
                    </p>
                </div>

            </div>

        </div>

    </AppLayout>
</template>
