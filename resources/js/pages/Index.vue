<script setup lang="ts">
import SettingsMobileMenu from '@/components/Navigation/SettingsMobileMenu.vue';
import SettingsSidebar from '@/components/Navigation/SettingsSidebar.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const title = 'Settings';
</script>
<template>
    <Head :title="$t(title)" />
    <AppLayout :title="title">
        <div class="flex h-full min-h-[calc(100vh-6rem)]">
            <!-- Settings Sidebar on the left (desktop only) -->
            <SettingsSidebar collapsible="none" class="shadow-md" />

            <!-- Page Content on the right -->
            <div class="flex-1 p-4 pt-2 pl-2">
                <div class="flex h-full flex-1 flex-col gap-4">
                    <div class="flex items-center gap-2">
                        <!-- Mobile settings menu button (mobile only) -->
                        <SettingsMobileMenu />
                        <h1 class="text-2xl font-bold">General Settings</h1>
                    </div>
                    <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                        <div class="bg-muted/50 aspect-video rounded-xl" />
                        <div class="bg-muted/50 aspect-video rounded-xl" />
                        <div class="bg-muted/50 aspect-video rounded-xl" />
                    </div>
                    <div
                        class="bg-muted/50 min-h-[100vh] flex-1 rounded-xl md:min-h-min"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
