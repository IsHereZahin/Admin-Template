<template>
    <div class="g-sidenav-show bg-gray-100" :class="{ 'g-sidenav-pinned': isOpen }">
        <Sidebar />
        <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
            <Navbar :title="title" @toggle-sidebar="toggleSidenav" />
            <!-- Page Content -->
            <main>
                <slot />
            </main>
            <Footer/>
        </main>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import Sidebar from '@/Components/Sidebar/Sidebar.vue';
import Navbar from '@/Components/Navbar/Navbar.vue';
import Footer from '@/Components/Footer/Footer.vue';

const props = defineProps({
    title: String,
});

const isOpen = ref(false);

const toggleSidenav = () => {
    const body = document.body;
    const sidenav = document.getElementById("sidenav-main");
    const className = "g-sidenav-pinned";

    isOpen.value = !isOpen.value;
    body.classList.toggle(className, isOpen.value);

    if (sidenav) {
        sidenav.hidden = !isOpen.value;
        sidenav.classList.toggle("bg-white", isOpen.value);
        sidenav.classList.toggle("bg-transparent", !isOpen.value);
    }
};

// Handle window resize
const handleResize = () => {
    const body = document.body;
    if (window.innerWidth > 1200) {
        isOpen.value = true;
        body.classList.add("g-sidenav-pinned");
        document.getElementById("sidenav-main")?.classList.remove("bg-white");
    } else {
        isOpen.value = false;
        body.classList.remove("g-sidenav-pinned");
    }
};

onMounted(() => {
    window.addEventListener("resize", handleResize);
    handleResize();
});

onBeforeUnmount(() => {
    window.removeEventListener("resize", handleResize);
});
</script>
