<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref, inject } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};

// Inject the systemColor
const systemColor = inject('systemColor');
const updateSystemColor = inject('updateSystemColor');

// If you need to update the color from this component
// const changeColor = (newColor) => {
//     updateSystemColor(newColor);
// };
</script>

<template>
    <Head title="Update Password" />

    <MasterLayout title="Update Password">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card h-100 p-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex flex-column align-items-start">
                                    <h2 class="text-lg font-medium text-gray-900">Update Password</h2>
                                    <p class="mt-2 text-sm text-gray-600">
                                        Ensure your account is using a long, random password to stay secure.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-3 mt-3">
                            <form @submit.prevent="updatePassword" class="space-y-6">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>

                                    <input
                                        id="current_password"
                                        ref="currentPasswordInput"
                                        v-model="form.current_password"
                                        type="password"
                                        class="block w-full px-4 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        autocomplete="current-password"
                                    />

                                    <div v-if="form.errors.current_password" class="mt-2 text-sm text-red-600">
                                        {{ form.errors.current_password }}
                                    </div>
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>

                                    <input
                                        id="password"
                                        ref="passwordInput"
                                        v-model="form.password"
                                        type="password"
                                        class="block w-full px-4 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        autocomplete="new-password"
                                    />

                                    <div v-if="form.errors.password" class="mt-2 text-sm text-red-600">
                                        {{ form.errors.password }}
                                    </div>
                                </div>

                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>

                                    <input
                                        id="password_confirmation"
                                        v-model="form.password_confirmation"
                                        type="password"
                                        class="block w-full px-4 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        autocomplete="new-password"
                                    />

                                    <div v-if="form.errors.password_confirmation" class="mt-2 text-sm text-red-600">
                                        {{ form.errors.password_confirmation }}
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="flex justify-end gap-4"> <!-- Changed 'items-end' to 'justify-end' -->
                                    <Button
                                        :disabled="form.processing"
                                        :class="`px-4 py-2 bg-gradient-${systemColor} text-white rounded-md shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black disabled:opacity-50`"
                                    >
                                        <span v-if="form.processing" class="mr-2">Password Updating...</span>
                                        <span v-else>Password Update</span>
                                    </Button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MasterLayout>
</template>
