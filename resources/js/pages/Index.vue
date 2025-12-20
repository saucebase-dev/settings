<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import SettingsSidebar from '@modules/Navigation/resources/js/components/SettingsSidebar.vue';
import AppLayout from '@modules/Navigation/resources/js/layouts/AppLayout.vue';

const title = 'Settings';
</script>
<template>
    <Head :title="$t(title)" />
    <AppLayout :title="title">
        <div class="flex h-full min-h-[calc(100vh-6rem)]">
            <!-- Settings Sidebar on the left -->
            <SettingsSidebar collapsible="none" class="shadow-md" />

            <!-- Page Content on the right -->
            <div class="flex-1 p-4 pt-2 pl-2">
                <div class="flex h-full flex-1 flex-col gap-4">
                    <h1 class="text-2xl font-bold">General Settings</h1>
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
