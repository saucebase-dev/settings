<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowLeft } from 'lucide-vue-next';

defineProps<{
    title: string;
    backUrl?: string;
}>();
</script>

<template>
    <h1 class="text-2xl font-bold mt-2">
        <Link v-if="backUrl" :href="backUrl">
            <ArrowLeft
                class="hover:text-primary-foreground inline size-6 mr-2 mb-1"
            />
        </Link>
        {{ title }}
    </h1>
</template>
