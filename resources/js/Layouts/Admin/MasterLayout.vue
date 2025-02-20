<!-- MasterLayout.vue -->
<template>
    <div class="g-sidenav-show bg-gray-100" :class="{ 'g-sidenav-pinned': isOpen }">
        <Sidebar :systemColor="systemColor" />
        <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
            <Navbar :title="title" @toggle-sidebar="toggleSidenav" />
            <!-- Page Content -->
            <main>
                <slot />
            </main>
            <Footer />
        </main>
        <Plugin @update-color="updateSystemColor" />
    </div>
</template>

<script setup>
import { ref, provide, onMounted, onBeforeUnmount } from 'vue';
import Sidebar from '@/Components/Admin/Sidebar/Sidebar.vue';
import Navbar from '@/Components/Admin/Navbar/Navbar.vue';
import Footer from '@/Components/Admin/Footer/Footer.vue';
import Plugin from '@/Components/Admin/Plugin/Plugin.vue';

const props = defineProps({
    title: String,
});

const isOpen = ref(false);
const systemColor = ref('success');

// Provide both the value and the update function
provide('systemColor', systemColor);
provide('updateSystemColor', (color) => {
    systemColor.value = color;
});

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

const updateSystemColor = (color) => {
    systemColor.value = color;
};

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
