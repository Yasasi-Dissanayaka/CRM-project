<script setup>
import { Link,router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';


defineProps({
    customers:Array
});
function deleteCustomer(id){
    if(confirm("Are yoou sure you want to dalete this customer")){
        router.delete(route('customers.destroy', id));
    }

}
</script>

<template>
    <AppLayout title="Customers">
        
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
            
                <h1 class="text-2xl font-bold">Customers</h1>

                <Link :href="route('customers.create')"class="inline-flex items-center
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
                        duration-200">
                    Add Customer
                </Link>
        
        
            </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <table class="min-w-full">

        <thead class="bg-gray-50 border-b">

        <tr>

        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
        Name
        </th>

        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
        Email
        </th>

        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
        Phone
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
        v-for="customer in customers"
        :key="customer.id"
        class="border-b hover:bg-gray-50 transition duration-200">

        <td class="px-6 py-5 font-semibold">
        {{ customer.name }}
        </td>

        <td class="px-6 py-5 text-gray-600">
        {{ customer.email }}
        </td>

        <td class="px-6 py-5">
        {{ customer.phone }}
        </td>

        <td class="px-6 py-5 text-center">

        <span
        class="px-4 py-1 rounded-full text-sm font-semibold"
        :class="{
        'bg-green-100 text-green-700': customer.status === 'Active',
        'bg-red-100 text-red-700': customer.status === 'Inactive'
        }"
        >
        {{ customer.status }}
        </span>

        </td>

        <td class="px-6 py-5">

        <div class="flex justify-center gap-2">

        <Link
        :href="route('customers.edit', customer.id)"
        class="bg-blue-600
        hover:bg-[#4F46E5]
        text-white
        px-4 py-2
        rounded-xl
        shadow-md
        hover:shadow-xl
        transition-all duration-200"
        >
        Edit
        </Link>

        <button
        @click="deleteCustomer(customer.id)"
        class="bg-red-500
        hover:bg-red-600
        text-white
        px-4 py-2
        rounded-xl
        shadow-md
        hover:shadow-xl
        transition-all duration-200"
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