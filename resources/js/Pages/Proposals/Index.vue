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

                <Link :href="route('proposals.create')"class="inline-flex items-center
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
                    Add Proposal
                </Link>
        
        
            </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <table class="min-w-full">

        <thead class="bg-gray-50 border-b">

        <tr>

        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
        Customer
        </th>

        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
        Proposal No
        </th>

        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
        Title
        </th>

        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
        Description
        </th>

        <th class="px-6 py-4 text-left text-gray-500 font-semibold uppercase text-sm">
        Amount
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
        v-for="proposal in proposals"
        :key="proposal.id"
        class="border-b hover:bg-gray-50 transition duration-200">

        <td class="px-6 py-5">
        {{ proposal.customer_id }}
        </td>

        <td class="px-6 py-5 font-semibold">
        {{ proposal.proposal_number }}
        </td>

        <td class="px-6 py-5">
        {{ proposal.title }}
        </td>

        <td class="px-6 py-5 text-gray-600 max-w-xs truncate">
        {{ proposal.description }}
        </td>

        <td class="px-6 py-5 font-bold text-blue-600">
        Rs. {{ proposal.amount }}
        </td>

        <td class="px-6 py-5 text-center">

        <span
        class="px-4 py-1 rounded-full text-sm font-semibold"
        :class="{
        'bg-green-100 text-green-700': proposal.status === 'Accepted',
        'bg-yellow-100 text-yellow-700': proposal.status === 'Pending',
        'bg-red-100 text-red-700': proposal.status === 'Rejected'
        }"
        >
        {{ proposal.status }}
        </span>

        </td>

        <td class="px-6 py-5">

        <div class="flex justify-center gap-2">

        <Link
        :href="route('proposals.edit', proposal.id)"
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
        @click="deleteProposal(proposal.id)"
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