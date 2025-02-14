<template>
    <div class="g-sidenav-show bg-gray-100">
        <sidebar />
        <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
            <Navbar/>
            <!-- Page Content -->
            <main>
                <slot />
            </main>
            <Footer/>
        </main>
    </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar/Sidebar.vue';
import Navbar from '@/Components/Navbar/Navbar.vue';
import Footer from '@/Components/Footer/Footer.vue';
</script>
