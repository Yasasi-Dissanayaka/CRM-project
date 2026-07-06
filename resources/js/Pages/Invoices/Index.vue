<script setup>
import { Link,router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';


defineProps({
    invoices:Array
});
function deleteInvoice(id){
    if(confirm("Are you sure you want to dalete this invoice?")){
        router.delete(route('invoices.destroy', id));
    }

}
</script>

<template>
    <AppLayout title="Invoices">
        
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
            
                <h1 class="text-3xl font-bold text-gray-800">Invoices</h1>

                <Link :href="route('invoices.create')"class="inline-flex items-center
                    px-5 py-2.5
                    bg-[#6366F1]
                    border border-transparent
                    rounded-xl
                    font-semibold
                    text-sm
                    text-white
                    shadow-lg
                    shadow-indigo-500/30
                    hover:bg-[#4F46E5]
                    hover:shadow-xl
                    hover:-translate-y-0.5
                    active:bg-[#4338CA]
                    focus:outline-none
                    focus:ring-2
                    focus:ring-[#6366F1]
                    focus:ring-offset-2
                    transition-all
                    duration-200"
                >
                    Add Invoice
                </Link>
        
        
            </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
                            Customer ID
                        </th>

                        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
                            Proposal
                        </th>

                        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
                            Invoice
                        </th>

                        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
                            Amount
                        </th>

                        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
                            Due Date
                        </th>

                        <th class="px-6 py-4 text-center text-gray-500 font-semibold uppercase text-sm">
                            Status
                        </th>

                        <th class="px-6 py-4 text-center text-gray-500 font-semibold uppercase text-sm">
                            Actions
                        </th>

                    </tr>
                </thead>

                <tbody>

                    <tr
                        v-for="invoice in invoices"
                        :key="invoice.id"
                        class="border-b hover:bg-gray-50 transition duration-200"
                    >

                        <td class="px-6 py-5">
                            {{ invoice.customer_id }}
                        </td>

                        <td class="px-6 py-5">
                            {{ invoice.proposal_number }}
                        </td>

                        <td class="px-6 py-5 font-semibold">
                            {{ invoice.invoice_number }}
                        </td>

                        <td class="px-6 py-5 font-bold text-blue-600">
                            Rs. {{ invoice.amount }}
                        </td>

                        <td class="px-6 py-5">
                            {{ invoice.due_date }}
                        </td>

                        <td class="px-6 py-5 text-center">

                            <span
                                class="px-4 py-1 rounded-full text-sm font-semibold"
                                :class="{
                                    'bg-green-100 text-green-700': invoice.status === 'Paid',
                                    'bg-yellow-100 text-yellow-700': invoice.status === 'Unpaid',
                                    'bg-red-100 text-red-700': invoice.status === 'Overdue'
                                }"
                            >
                                {{ invoice.status }}
                            </span>

                        </td>

                        <td class="px-6 py-5">

                            <div class="flex justify-center gap-2">

                                <Link
                                    :href="route('invoices.edit', invoice.id)"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md hover:shadow-xl transition-all duration-200"
                                >
                                    Edit
                                </Link>

                                <Link
                                    :href="route('payment.checkout', invoice.id)"
                                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-md hover:shadow-xl transition-all duration-200"
                                >
                                    Pay
                                </Link>

                                <button
                                    @click="deleteInvoice(invoice.id)"
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow-md hover:shadow-xl transition-all duration-200"
                                >
                                    Delete
                                </button>

                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

</div>
        </div>
    </AppLayout>

        
    </template>