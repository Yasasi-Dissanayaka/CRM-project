<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {useForm} from '@inertiajs/vue3';

import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    customer: Object,
});

const form = useForm({
    name: props.customer.name,
    email: props.customer.email,
    phone: props.customer.phone,
    address: props.customer.address,
    status: props.customer.status,
});

const submit = () =>{
    form.put(route('customers.update',props.customer.id));
};

</script>
<template>
    <AppLayout title="Edit Customer">
        <template #header>
            <h2 class="text-xl font-semibold">
                Edit Customer
            </h2>
        </template>

            <div class ="max-w-2xl mx-auto py-10">

                <div class="p-6 bg-white rounded-lg shadow">

                    <form @submit.prevent="submit">

            
                        <div class="mb-4">
                            <InputLabel for="name" value="Name"/>

                            <TextInput v-model="form.name" type="text" class="mt-1 block w-full"/>
                            <InputError :message="form.errors.name"/>
                        </div>

                        <div class="mb-4">
                            <InputLabel for="email" value="Email"/>

                            <TextInput v-model="form.email" type="text" class="mt-1 block w-full"/>
                            <InputError :message="form.errors.email"/>
                        </div>

                        <div class="mb-4">
                            <InputLabel for="address" value="Address" />

                            <TextInput v-model="form.address" type="text" class="mt-1 block w-full"/>
                            <InputError :message="form.errors.address"/>
                        </div>

                        <div class="mb-4">
                            <InputLabel for="phone" value="Phone"/>

                            <TextInput v-model="form.phone" type="text" class="mt-1 block w-full"/>
                            <InputError :message="form.errors.phone"/>
                        </div>

                        <PrimaryButton>
                            Update Customer
                        </PrimaryButton>

                    </form>

                </div>

            </div>

    </AppLayout>
</template>

