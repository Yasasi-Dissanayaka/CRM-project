<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Head,useForm} from '@inertiajs/vue3';

import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    address: '',
    status: 'Active',
});

const submit = () =>{
    form.post(route('customers.store'));
};

</script>
<template>
    <AppLayout title="Create Customer">
        <template #header>
            <h2 class="text-xl font-semibold">
                Create Customer
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
                            Save Customer
                        </PrimaryButton>

                    </form>

                </div>

            </div>

    </AppLayout>
</template>

