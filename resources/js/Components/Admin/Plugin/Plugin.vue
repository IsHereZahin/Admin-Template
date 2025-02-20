<template>
    <div class="fixed-plugin" ref="fixedPlugin">
        <a class="fixed-plugin-button text-dark position-fixed px-2 py-2" @click="toggleCardVisibility">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <circle cx="12" cy="12" r="3" />
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
            </svg>
        </a>

        <div class="card shadow-lg" :class="{ show: showCard }">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button" @click="toggleCardVisibility">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
            </div>
            <hr class="horizontal dark my-1" />
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" @click="changeColor('primary')"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" @click="changeColor('dark')"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" @click="changeColor('info')"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" @click="changeColor('success')"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" @click="changeColor('warning')"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" @click="changeColor('danger')"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm mt-1 mb-2">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>

                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <hr class="horizontal dark my-sm-4" />
                <a class="btn bg-gradient-dark w-100" :href="githubUrl" target="_blank">Free Download</a>
                <a class="btn btn-outline-dark w-100" :href="githubUrl" target="_blank">
                    <span v-if="starCount !== null" class="mr-2 font-semibold text-md">{{ starCount }}</span>
                    <span class="text-md">Github Stars</span>
                </a>
                <div class="w-100 text-center">
                    <h6 class="mt-3 mb-2">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20out%20this%20Laravel%20Vue%20Inertia%20Dashboard%20Template%20by%20%40IsHereZahin%20%23Laravel%20%23Vue%20%23Inertia&url=https%3A%2F%2Fgithub.com%2FIsHereZahin%2FAdmin-Template" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://github.com/IsHereZahin/Admin-Template&quote=Check%20out%20this%20Laravel%20Vue%20Inertia%20Dashboard%20Template%20by%20%40IsHereZahin%20%23Laravel%20%23Vue%20%23Inertia" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            githubUrl: "https://github.com/IsHereZahin/Admin-Template",
            repositoryName: "Admin-Template",
            starCount: null,
            showCard: false,
        };
    },
    methods: {
        toggleCardVisibility() {
            this.showCard = !this.showCard;
        },
        handleClickOutside(event) {
            if (this.$refs.fixedPlugin && !this.$refs.fixedPlugin.contains(event.target)) {
                this.showCard = false;
            }
        },
        changeColor(color) {
            // Save the color to localStorage (device-specific)
            localStorage.setItem('systemColor', color);
            this.$emit('update-color', color);
        },
        async fetchStarCount() {
            const apiUrl = `https://api.github.com/repos/IsHereZahin/Admin-Template`;
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();
                this.starCount = data.stargazers_count;
            } catch (error) {
                console.error("Error fetching star count:", error);
                this.starCount = "Error loading stars"; 
            }
        }
    },
    mounted() {
        // Load the saved color from localStorage if it exists
        const savedColor = localStorage.getItem('systemColor');
        if (savedColor) {
            this.$emit('update-color', savedColor);
        }

        // Fetch GitHub star count
        this.fetchStarCount();

        document.addEventListener("click", this.handleClickOutside);
    },
    beforeDestroy() {
        document.removeEventListener("click", this.handleClickOutside);
    },
};
</script>


<style scoped>
.fixed-plugin .fixed-plugin-button {
    background: #fff;
    border-radius: 50%;
    bottom: 30px;
    right: 30px;
    font-size: 1.25rem;
    z-index: 990;
    box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.16);
    cursor: pointer;
}

.fixed-plugin .fixed-plugin-button i {
    pointer-events: none;
}

.fixed-plugin .card {
    position: fixed !important;
    right: -360px;
    top: 0;
    height: 100%;
    left: auto !important;
    transform: unset !important;
    width: 360px;
    border-radius: 0;
    padding: 0 10px;
    transition: .2s ease;
    z-index: 1020;
}

.fixed-plugin .card.show {
    right: 0;
}

.fixed-plugin .badge {
    border: 1px solid #fff;
    border-radius: 50%;
    cursor: pointer;
    display: inline-block;
    height: 23px;
    margin-right: 5px;
    position: relative;
    width: 23px;
    transition: all 0.2s ease-in-out;
}

.fixed-plugin .badge:hover,
.fixed-plugin .badge.active {
    border-color: #344767;
}

.fixed-plugin .btn.bg-gradient-primary:not(:disabled):not(.disabled) {
    border: 1px solid transparent;
}

.fixed-plugin .btn.bg-gradient-primary:not(:disabled):not(.disabled):not(.active) {
    background-color: transparent;
    background-image: none;
    border: 1px solid #cb0c9f;
    color: #cb0c9f;
}
</style>
