<script setup>
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;
    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;
    form.clearErrors();
    form.reset();
};
import { inject } from 'vue';

// Inject the systemColor
const systemColor = inject('systemColor');
const updateSystemColor = inject('updateSystemColor');

// If you need to update the color from this component
const changeColor = (newColor) => {
    updateSystemColor(newColor);
};
</script>

<template>
    <Head title="Delete Account" />

    <MasterLayout title="Delete Account">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card p-4">
                        <div class="card-header">
                            <h2 class="text-lg font-medium text-gray-900">
                                Delete Account
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                            </p>
                        </div>

                        <div class="card-body">
                            <button @click="confirmUserDeletion" class="bg-red-600 text-white py-2 px-4 rounded-md">
                                Delete Account
                            </button>

                            <!-- Modal -->
                            <div v-if="confirmingUserDeletion" class="fixed inset-0 z-50 bg-opacity-70 flex justify-center items-center backdrop-blur-md">
                                <div class="bg-white p-6 rounded-md w-1/3 border">
                                    <h2 class="text-lg font-medium bold text-red-500">
                                        Are you sure you want to delete your account?
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                                    </p>

                                    <div class="mt-4">
                                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>

                                        <input
                                            id="password"
                                            ref="passwordInput"
                                            v-model="form.password"
                                            type="password"
                                            class="px-4 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mt-1 block w-full"
                                            placeholder="Password"
                                            @keyup.enter="deleteUser"
                                        />

                                        <div v-if="form.errors.password" class="mt-2 text-sm text-red-600">
                                            {{ form.errors.password }}
                                        </div>
                                    </div>

                                    <div class="mt-4 flex flex-col sm:flex-row justify-end gap-4 sm:gap-3">
                                        <button @click="closeModal" class="bg-gray-300 text-black py-2 px-4 rounded-md w-full sm:w-auto">
                                            Cancel
                                        </button>

                                        <button
                                            @click="deleteUser"
                                            :disabled="form.processing"
                                            class="ms-3 bg-red-600 text-white py-2 px-4 rounded-md w-full sm:w-auto"
                                            :class="{ 'opacity-25': form.processing }"
                                        >
                                            Delete Account
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MasterLayout>
</template>
