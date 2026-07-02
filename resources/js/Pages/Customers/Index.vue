<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';


defineProps({
    customers:Array
});
</script>

<template>
    <AppLayout title="Customers">
        
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
            
                <h1 class="text-2xl font-bold">Customers</h1>

                <Link :href="route('customers.create')"class="bg-blue-600 text-white px-4 py-2 rounded">
                    Add Customer
                </Link>
        
        
            </div>

        <table class="w-full border border-collaps">
            <thead style="background-color: darkgray;" class="bg-gray-100">
                <tr>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Phone</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers" :key="customer.id">
                    <td class="border p-2">{{ customer.name }}</td>
                    <td class="border p-2">{{ customer.email }}</td>
                    <td class="border p-2">{{ customer.phone }}</td>
                    <td style="background-color:green;"class="border p-2">{{ customer.status }}</td>
                    <td class="border p-2">
                        <Link 
                            :href="route('customers.edit',customer.id)"
                            class="text-blue-600">
                            Edit
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </AppLayout>

        
    </template>