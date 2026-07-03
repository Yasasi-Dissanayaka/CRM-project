<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {useForm} from '@inertiajs/vue3';

import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    proposal:Object,
    customers: Array,
});

const form = useForm({
    customer_id: props.proposal.customer_id,
    proposal_number: props.proposal.proposal_number,
    title: props.proposal.title,
    description: props.proposal.description,
    amount: props.proposal.amount,
    status: props.proposal.status,
});

const submit = () =>{
    form.put(route('proposals.update',props.proposal.id));
};

</script>
<template>
    <AppLayout title="Create Proposal">
        <template #header>
            <h2 class="text-xl font-semibold">
                Edit Proposals
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
                            <InputLabel for="title" value="Title" />

                            <TextInput v-model="form.title" type="text" class="mt-1 block w-full"/>
                            <InputError :message="form.errors.title"/>
                        </div>

                        <div class="mb-4">
                            <InputLabel for="description" value="Description"/>

                            <TextInput v-model="form.description" type="text" class="mt-1 block w-full"/>
                            <InputError :message="form.errors.description"/>
                        </div>

                        <div class="mb-4">
                            <InputLabel for="amount" value="Amount"/>

                            <TextInput v-model="form.amount" type="number" class="mt-1 block w-full"/>
                            <InputError :message="form.errors.amount"/>
                        </div>

                        <PrimaryButton>
                            Update Proposal
                        </PrimaryButton>

                    </form>

                </div>

            </div>

    </AppLayout>
</template>

