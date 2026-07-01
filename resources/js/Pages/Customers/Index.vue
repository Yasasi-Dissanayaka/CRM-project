<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    customers:Array
});
</script>

<template>
    <div class="text-center">
        <h1><b>Customers</b></h1><br>

        <Link :href="route('customers.create')"class="bg-blue-600 text-white px-4 py-2 rounded">
            <button style="">Add Customer</button>
        </Link>
        
        <p v-for="customer in customers" :key="customer.id">
            {{customer.name}}
        </p>
    </div>
</template>