<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
import { inject } from 'vue';

const user = usePage().props.auth.user;

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
  name: user.name,
  email: user.email,
});

const submitForm = () => {
    console.log('Form data:', form);
    form.patch(route('profile.update'));
};

// Inject the systemColor
const systemColor = inject('systemColor');
const updateSystemColor = inject('updateSystemColor');
</script>

<template>
        <div class="container-fluid">
            <!-- Profile Header -->
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('/assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>

            <!-- Profile Card -->
            <div class="card card-body shadow-lg mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="/assets/img/bruce-mars.jpg" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm" />
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">{{ form.name }}</h5>
                            <p class="mb-0 font-weight-bold text-sm">{{ form.email }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-auto ms-auto me-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-2 py-1 d-flex align-items-center" data-bs-toggle="tab"
                                        href="javascript:;" role="tab" aria-selected="false">
                                        <svg class="text-dark" width="18px" height="18px" viewBox="0 0 40 40"
                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>settings</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2020.000000, -442.000000)" fill="#333"
                                                    fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(304.000000, 151.000000)">
                                                            <polygon class="color-background" opacity="0.75"
                                                                points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                            </polygon>
                                                            <path class="color-background"
                                                                d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                                opacity="0.75"></path>
                                                            <path class="color-background"
                                                                d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="ms-2 fs-6 fw-semibold text-dark">Profile Information Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Form -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card h-100 p-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex flex-column align-items-start">
                                    <p class="font-weight-bold mb-1">Profile Information</p>
                                    <p class="mt-2 text-muted">Update your account's profile information and email address.</p>
                                </div>
                            </div>
                        </div>


                        <div class="card-body p-3 mt-3">
                            <form @submit.prevent="submitForm" class="space-y-6">
                                <!-- Name Input Field -->
                                <div>
                                    <InputLabel for="name" value="Name" />
                                    <div class="relative">
                                        <Input
                                            id="name"
                                            type="text"
                                            :value="form.name"
                                            @input="form.name = $event.target.value"
                                            required
                                            autofocus
                                            autocomplete="name"
                                            class="block w-full px-4 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        />
                                        <InputError class="mt-2" :message="form.errors.name" />
                                    </div>
                                </div>

                                <!-- Email Input Field -->
                                <div>
                                    <InputLabel for="email" value="Email" />
                                    <div class="relative">
                                        <Input
                                            id="email"
                                            type="email"
                                            :value="form.email"
                                            @input="form.email = $event.target.value"
                                            required
                                            autocomplete="email"
                                            class="block w-full px-4 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        />
                                        <InputError class="mt-2" :message="form.errors.email" />
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="flex justify-end gap-4"> <!-- Changed 'items-end' to 'justify-end' -->
                                    <Button
                                        :disabled="form.processing"
                                        :class="`px-5 py-2 bg-gradient-${systemColor} text-white rounded-md shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black disabled:opacity-50`"
                                    >
                                        <span v-if="form.processing" class="mr-2">Saving...</span>
                                        <span v-else>Save</span>
                                    </Button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>
