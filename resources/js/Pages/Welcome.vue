<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />

    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-100 flex items-center justify-center">

        <div class="bg-white shadow-2xl rounded-3xl p-12 w-full max-w-lg text-center">

            <!-- Logo -->
            <img
                src="/images/CRMlogo.png"
                alt="CRM Logo"
                class="w-24 h-24 mx-auto mb-6"
            />

            <!-- Title -->
            <h1 class="text-4xl font-bold text-gray-800">
                CRM System
            </h1>

            <!-- Subtitle -->
            <p class="text-gray-500 mt-3 mb-10">
                Customer Relationship Management
            </p>

            <nav
                v-if="canLogin"
                class="flex flex-col items-center gap-5"
            >

                <template v-if="$page.props.auth.user">

                    <Link
                        :href="route('dashboard')"
                        class="w-full bg-[#6366F1] text-white py-3 rounded-xl shadow-lg hover:bg-[#4F46E5] hover:shadow-xl transition duration-200 font-semibold"
                    >
                        Dashboard
                    </Link>

                </template>

                <template v-else>

                    <Link
                        :href="route('login')"
                        class="w-full bg-[#6366F1] text-white py-3 rounded-xl shadow-lg hover:bg-[#4F46E5] hover:shadow-xl transition duration-200 font-semibold"
                    >
                        Login
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="w-full border-2 border-[#6366F1] text-[#6366F1] py-3 rounded-xl font-semibold hover:bg-[#6366F1] hover:text-white transition duration-200"
                    >
                        Register
                    </Link>

                </template>

            </nav>

            <!-- Footer -->
            <p class="text-xs text-gray-400 mt-10">
                © 2026 CRM System. All Rights Reserved.
            </p>

        </div>

    </div>

</template>