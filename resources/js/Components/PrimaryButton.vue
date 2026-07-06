<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-5 py-2.5
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
               active:translate-y-0
               focus:outline-none
               focus:ring-2
               focus:ring-[#6366F1]
               focus:ring-offset-2
               disabled:opacity-50
               transition-all
               duration-200">
        <slot />
    </button>
</template>
