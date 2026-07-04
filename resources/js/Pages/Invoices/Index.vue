<script setup>
import { Link,router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';


defineProps({
    invoices:Array
});
function deleteInvoice(id){
    if(confirm("Are yoou sure you want to dalete this invoice")){
        router.delete(route('invoices.destroy', id));
    }

}
</script>

<template>
    <AppLayout title="Invoices">
        
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
            
                <h1 class="text-2xl font-bold">Invoices</h1>

                <Link :href="route('invoices.create')"class="bg-blue-600 text-white px-4 py-2 rounded">
                    Add Invoice
                </Link>
        
        
            </div>

        <table class="w-full border border-collaps">
            <thead style="background-color: darkgray;" class="bg-gray-100">
                <tr>
                    <th class="border p-2">Customer_ID</th>
                    <th class="border p-2">Proposal_Number</th>
                    <th class="border p-2">Invoice_Number</th>
                    <th class="border p-2">Amount</th>
                    <th class="border p-2">Due_Date</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Action</th>


                </tr>
            </thead>
            <tbody>
                <tr v-for="invoice in invoices" :key="invoice.id">
                    <td class="border p-2">{{ invoice.customer_id }}</td>
                    <td class="border p-2">{{ invoice.proposal_number }}</td>
                    <td class="border p-2">{{ invoice.amount }}</td>
                    <td class="border p-2">{{ invoice.due_date }}</td>
                    <td 
                        class="border p-2 text-white"
                        :class="{
                        'bg-green-600': invoice.status === 'Paid',
                        'bg-yellow-600': invoice.status === 'Unpaid',
                        'bg-red-600': invoice.status === 'Overdue'

                        }"
                    >
                        {{ invoice.status }}
                    </td>

                    <td class="border p-2">
                        <Link 
                            :href="route('invoices.edit',invoice.id)"
                            class="text-blue-600 mr-4"
                        >

                            Edit
                        </Link>

                        <button
                            @click="deleteInvoice(invoice.id)"
                            class="text-red-600 mr-4">
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </AppLayout>

        
    </template>