<script setup>
import MasterLayout from '@/Layouts/Admin/MasterLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>

    <Head title="Profile" />

    <MasterLayout title="Profile">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Profile
            </h2>
        </template>

        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" />

            <UpdatePasswordForm class="max-w-xl" />

            <DeleteUserForm class="max-w-xl" />
        </div>
    </MasterLayout>
</template>
