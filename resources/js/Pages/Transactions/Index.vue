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

        <table class="w-full border border-collapse">
            <thead style="background-color: darkgray;" class="bg-gray-100">
                <tr>
                    <th class="border p-2">Transaction </th>
                    <th class="border p-2">Customer ID</th>
                    <th class="border p-2">Invoice No</th>
                    <th class="border p-2">Amount</th>
                    <th class="border p-2">Payment Method</th>
                    <th class="border p-2">Payment Date</th>
                    <th class="border p-2">Status</th>


                </tr>
            </thead>
            <tbody>
                <tr v-for="transaction in transactions" :key="transaction.id">
                    <td class="border p-2">{{ transaction.transaction_number }}</td>
                    <td class="border p-2">{{ transaction.customer_id }}</td>
                    <td class="border p-2">{{ transaction.invoice_number }}</td>
                    <td class="border p-2">Rs. {{ transaction.amount }}</td>
                    <td class="border p-2">{{ transaction.payment_method }}</td>
                    <td class="border p-2">{{ transaction.payment_date }}</td>

                    <td 
                        class="border p-2 text-white"
                        :class="{
                        'bg-green-600': transaction.status === 'Completed',
                        'bg-yellow-600': transaction.status === 'Pending',
                        'bg-red-600': transaction.status === 'Failed'

                        }"
                    >
                        {{ transaction.status }}
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </AppLayout>

        
    </template>