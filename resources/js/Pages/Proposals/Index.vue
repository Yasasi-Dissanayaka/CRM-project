<script setup>
import { Link,router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';


defineProps({
    proposals:Array
});
function deleteProposal(id){
    if(confirm("Are yoou sure you want to dalete this prpoosal")){
        router.delete(route('proposals.destroy', id));
    }

}
</script>

<template>
    <AppLayout title="Proposals">
        
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
            
                <h1 class="text-2xl font-bold">Proposals</h1>

                <Link :href="route('proposals.create')"class="bg-blue-600 text-white px-4 py-2 rounded">
                    Add Proposal
                </Link>
        
        
            </div>

        <table class="w-full border border-collaps">
            <thead style="background-color: darkgray;" class="bg-gray-100">
                <tr>
                    <th class="border p-2">Customer_ID</th>
                    <th class="border p-2">Proposal_Number</th>
                    <th class="border p-2">Title</th>
                    <th class="border p-2">Description</th>
                    <th class="border p-2">Amount</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Action</th>


                </tr>
            </thead>
            <tbody>
                <tr v-for="proposal in proposals" :key="proposal.id">
                    <td class="border p-2">{{ proposal.customer_id }}</td>
                    <td class="border p-2">{{ proposal.proposal_number }}</td>
                    <td class="border p-2">{{ proposal.title }}</td>
                    <td class="border p-2">{{ proposal.description }}</td>
                    <td class="border p-2">Rs. {{ proposal.amount }}</td>
                    <td 
                        class="border p-2 text-white"
                        :class="{
                        'bg-green-600': proposal.status === 'Accepted',
                        'bg-yellow-600': proposal.status === 'Pending',
                        'bg-red-600': proposal.status === 'Rejected'

                        }"
                    >
                        {{ proposal.status }}
                    </td>

                    <td class="border p-2">
                        <Link 
                            :href="route('proposals.edit',proposal.id)"
                            class="text-blue-600 mr-4"
                        >

                            Edit
                        </Link>

                        <button
                            @click="deleteProposal(proposal.id)"
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