<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';


defineProps({
    transactions:Array,
});

</script>

<template>
    <AppLayout title="Transactions">
        
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
            
                <h1 class="text-2xl font-bold">Transactions</h1>

            </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-50 border-b">

                <tr>

                    <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
                        Transaction
                    </th>

                    <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
                        Customer
                    </th>

                    <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
                        Invoice
                    </th>

                    <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
                        Amount
                    </th>

                    <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
                        Payment Method
                    </th>

                    <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
                        Payment Date
                    </th>

                    <th class="px-6 py-4 text-center text-gray-500 font-semibold uppercase text-sm">
                        Status
                    </th>

                </tr>

            </thead>

            <tbody>

                <tr
                    v-for="transaction in transactions"
                    :key="transaction.id"
                    class="border-b hover:bg-gray-50 transition duration-200"
                >

                    <td class="px-6 py-5 font-semibold">
                        {{ transaction.transaction_number }}
                    </td>

                    <td class="px-6 py-5">
                        {{ transaction.customer_id }}
                    </td>

                    <td class="px-6 py-5">
                        {{ transaction.invoice_number }}
                    </td>

                    <td class="px-6 py-5 font-bold text-blue-600">
                        Rs. {{ transaction.amount }}
                    </td>

                    <td class="px-6 py-5">
                        {{ transaction.payment_method }}
                    </td>

                    <td class="px-6 py-5">
                        {{ transaction.payment_date }}
                    </td>

                    <td class="px-6 py-5 text-center">

                        <span
                            class="px-4 py-1 rounded-full text-sm font-semibold"
                            :class="{
                                'bg-green-100 text-green-700': transaction.status === 'Completed',
                                'bg-yellow-100 text-yellow-700': transaction.status === 'Pending',
                                'bg-red-100 text-red-700': transaction.status === 'Failed'
                            }"
                        >
                            {{ transaction.status }}
                        </span>

                    </td>

                </tr>

            </tbody>

        </table>

        </div>
        </div>
    </AppLayout>

        
    </template>