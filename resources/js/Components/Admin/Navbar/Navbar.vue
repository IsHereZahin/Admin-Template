<template>
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                        {{ title }}
                    </li>
                </ol>
                <h6 class="font-weight-bolder mb-0">{{ title }}</h6>
            </nav>
            <div class=" navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <!-- collapse -->
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width=24 height=24 viewBox="0 0 24 24" fill="none"
                                stroke=gray strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                                <circle cx="11" cy="11" r="7.5" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                            </svg>
                        </span>
                        <input type="text"
                            class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200"
                            placeholder="Search..." />
                    </div>
                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0 position-relative" id="dropdownMenuButton"
                            @click="toggleNotifications">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <span v-if="notificationCount > 0"
                                :class="`position-absolute top-0 start-100 translate-middle badge rounded-pill bg-gradient-${systemColor}`"
                                style="font-size: 0.7rem; transform: translate(-50%, -30%);">
                                {{ notificationCount > 9 ? '9+' : notificationCount }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end bg-white border shadow-sm px-2 py-3 me-sm-n4"
                            :class="{ 'show': showNotifications }" aria-labelledby="dropdownMenuButton"
                            style="position: absolute; z-index: 1000; min-width: 20rem; max-height: 350px; overflow-y: auto;">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="/assets/img/team-2.jpg" class="avatar avatar-sm me-3" />
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span>
                                                from Laur
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="/assets/img/small-logos/logo-spotify.svg"
                                                class="avatar avatar-sm bg-gradient-dark me-3" />
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New album</span>
                                                by Travis Scott
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background"
                                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                    opacity="0.593633743"></path>
                                                                <path class="color-background"
                                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                Payment successfully completed
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- Additional notifications for testing scroll -->
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="/assets/img/team-3.jpg" class="avatar avatar-sm me-3" />
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">Project update</span>
                                                from Sarah
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                3 days ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="/assets/img/small-logos/logo-jira.svg"
                                                class="avatar avatar-sm bg-gradient-dark me-3" />
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New ticket</span>
                                                #4219 created
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                4 days ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown pl-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" id="userProfileDropdown"
                            @click="toggleProfileMenu">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">John Doe</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end bg-white border shadow-sm px-2 py-3"
                            :class="{ 'show': showProfileMenu }" aria-labelledby="userProfileDropdown"
                            style="position: absolute; z-index: 1000; min-width: 10rem;">
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="/assets/img/team-2.jpg" class="avatar avatar-sm me-3" />
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                My Profile
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="horizontal dark my-2">
                            </li>
                            <li>
                                <Link :href="route('logout')" method="post" as="button"
                                    class="dropdown-item border-radius-md">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <i class="fa fa-sign-out text-danger me-3"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            Sign Out
                                        </h6>
                                    </div>
                                </div>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav"
                            @click="$emit('toggleSidebar')">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
</template>

<script setup>
import { inject } from 'vue';
import { Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted, computed } from 'vue';

// Inject the systemColor
const systemColor = inject('systemColor');
const updateSystemColor = inject('updateSystemColor');

const props = defineProps({
    title: String,
});

const emit = defineEmits(['toggleSidebar']);

const showNotifications = ref(false);
const showProfileMenu = ref(false);
const notifications = ref([
    // You can add your notifications here or fetch them from an API
    { id: 1, title: 'New message from Laur' },
    { id: 2, title: 'New album by Travis Scott' },
    { id: 3, title: 'Payment successfully completed' },
    { id: 4, title: 'Project update from Sarah' },
    { id: 5, title: 'New ticket #4219 created' },
]);

const notificationCount = computed(() => {
    return notifications.value.length;
});

const toggleNotifications = (event) => {
    event.preventDefault();
    event.stopPropagation();
    showNotifications.value = !showNotifications.value;
    if (showNotifications.value) {
        showProfileMenu.value = false;
    }
};

const toggleProfileMenu = (event) => {
    event.preventDefault();
    event.stopPropagation();
    showProfileMenu.value = !showProfileMenu.value;
    if (showProfileMenu.value) {
        showNotifications.value = false;
    }
};

// Close dropdowns when clicking outside
const closeDropdowns = (event) => {
    if (showNotifications.value &&
        !event.target.closest('#dropdownMenuButton') &&
        !event.target.closest('.dropdown-menu')) {
        showNotifications.value = false;
    }

    if (showProfileMenu.value &&
        !event.target.closest('#userProfileDropdown') &&
        !event.target.closest('.dropdown-menu')) {
        showProfileMenu.value = false;
    }
};

onMounted(() => {
    document.addEventListener('click', closeDropdowns);
});

onUnmounted(() => {
    document.removeEventListener('click', closeDropdowns);
});
</script>

<style scoped>
.dropdown-menu.show {
    display: block;
    top: 100%;
    transform: translateY(10px);
}

.nav-item.dropdown {
    position: relative;
}
</style>
