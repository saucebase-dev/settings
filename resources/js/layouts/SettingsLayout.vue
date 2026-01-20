<script setup lang="ts">
import SettingsMobileMenu from '../components/SettingsMobileMenu.vue';
import SettingsSidebar from '../components/SettingsSidebar.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    title: string;
}>();
</script>

<template>
    <Head :title="$t(title)" />
    <AppLayout :title="title">
        <div class="flex h-full min-h-[calc(100vh-6rem)]">
            <!-- Settings Sidebar on the left (desktop only) -->
            <SettingsSidebar collapsible="none" class="shadow-md" />

            <!-- Page Content on the right -->
            <div class="flex-1 p-4 pt-2 pl-2">
                <div class="flex h-full flex-1 flex-col gap-6">
                    <div class="flex items-center gap-2">
                        <!-- Mobile settings menu button (mobile only) -->
                        <SettingsMobileMenu />
                        <slot name="header">
                            <h1 class="text-2xl font-bold">
                                {{ $t(title) }}
                            </h1>
                        </slot>
                    </div>
                    <slot />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
