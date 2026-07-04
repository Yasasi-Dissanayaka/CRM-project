<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {useForm} from '@inertiajs/vue3';

import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    invoice : Object,
    customers: Array,
});

const form = useForm({
    customer_id: props.invoice.customer_id,
    proposal_number: props.invoice.proposal_number,
    invoice_number: props.invoice.invoice_number,
    amount: props.invoice.amount,
    due_date: props.invoice.due_date,
    status: props.invoice.status,
});

const submit = () =>{
    form.put(route('invoices.update',props.invoice.id));
};

</script>
<template>
    <AppLayout title="Create Invoice">
        <template #header>
            <h2 class="text-xl font-semibold">
                Edit Invoice
            </h2>
        </template>

            <div class ="max-w-2xl mx-auto py-10">

                <div class="p-6 bg-white rounded-lg shadow">

                    <form @submit.prevent="submit">

            
                        <div class="mb-4">
                            <InputLabel for="customer_id" value="Customer"/>

                            <select
                                v-model="form.customer_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >
                                <option value="">Select Customer</option>

                                <option
                                    v-for="customer in customers"
                                    :key="customer.id"
                                    :value="customer.id"
                                >
                                    {{ customer.name }}
                                </option>
                            </select>

                            <InputError :message="form.errors.customer_id"/>
                        </div>

                        <div class="mb-4">
                            <InputLabel for="proposal_number" value="Proposal_Number"/>

                            <TextInput v-model="form.proposal_number" type="text" class="mt-1 block w-full"/>
                            <InputError :message="form.errors.proposal_number"/>
                        </div>

                        <div class="mb-4">
                            <InputLabel for="invoice_number" value="Invoice_Number" />

                            <TextInput v-model="form.invoice_number" type="text" class="mt-1 block w-full"/>
                            <InputError :message="form.errors.invoice_number"/>
                        </div>

                        <div class="mb-4">
                            <InputLabel for="amount" value="Amount"/>

                            <TextInput v-model="form.amount" type="text" class="mt-1 block w-full"/>
                            <InputError :message="form.errors.amount"/>
                        </div>

                        <div class="mb-4">
                            <InputLabel for="due_date" value="Due_Date"/>

                            <TextInput v-model="form.due_date" type="date" class="mt-1 block w-full"/>
                            <InputError :message="form.errors.due_date"/>
                        </div>

                        <PrimaryButton>
                            Update Invoice
                        </PrimaryButton>

                    </form>

                </div>

            </div>

    </AppLayout>
</template>

