<template>
    <div class="min-h-screen bg-white">

        <!-- Hero Section -->
        <main>
            <div class="relative isolate px-6 lg:px-8">
                <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
                    <div
                        class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#FF2D20] to-[#4F46E5] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]">
                    </div>
                </div>

                <div class="mx-auto max-w-3xl py-32 sm:py-48 lg:py-56">
                    <div class="text-center">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                            Laravel Vue Inertia Template
                        </h1>
                        <p class="mt-6 text-lg leading-8 text-gray-600">
                            A modern and clean starter template powered by Laravel v{{ laravelVersion }}, PHP v{{
                            phpVersion }}, Vue.js, and Inertia.js.
                        </p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <template v-if="$page.props.auth.user">
                                <Link :href="route('dashboard')"
                                    class="rounded-md bg-[#FF2D20] px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-[#FF2D20]/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#FF2D20] transition-all duration-300">
                                Go to Dashboard
                                </Link>
                            </template>
                            <template v-else>
                                <Link :href="route('login')"
                                    class="rounded-md bg-[#FF2D20] px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-[#FF2D20]/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#FF2D20] transition-all duration-300">
                                Get Started
                                </Link>
                                <Link v-if="canRegister" :href="route('register')"
                                    class="text-sm font-semibold leading-6 text-gray-900 hover:text-[#FF2D20] transition-all duration-300">
                                Create Account <span aria-hidden="true">→</span>
                                </Link>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Features Section -->
        <section class="py-24 sm:py-32 bg-gray-50">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-[#FF2D20]">Ready to Use</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Core Features
                    </p>
                </div>

                <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
                        <!-- Authentication Feature -->
                        <div
                            class="flex flex-col rounded-xl border border-gray-200 p-6 bg-white hover:shadow-lg transition-all duration-300">
                            <dt class="flex items-center gap-x-3 text-lg font-semibold leading-7 text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="h-6 w-6 text-[#FF2D20]">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Authentication Ready
                            </dt>
                            <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                                <p class="flex-auto">Full authentication system with login, registration, password
                                    reset, and
                                    email verification. Secured routes and middleware configured out of the box.</p>
                            </dd>
                        </div>

                        <!-- Responsive Design Feature -->
                        <div
                            class="flex flex-col rounded-xl border border-gray-200 p-6 bg-white hover:shadow-lg transition-all duration-300">
                            <dt class="flex items-center gap-x-3 text-lg font-semibold leading-7 text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="h-6 w-6 text-[#FF2D20]">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                Responsive Design
                            </dt>
                            <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                                <p class="flex-auto">Fully responsive layout that works seamlessly across desktop,
                                    tablet, and
                                    mobile devices. Built with Tailwind CSS for modern, maintainable styling.</p>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

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
</script>
