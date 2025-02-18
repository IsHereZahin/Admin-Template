<template>
    <div class="card z-index-2 h-full flex flex-col">
        <div class="card-header pb-0">
            <h6>Sales overview</h6>
            <p class="text-sm">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
            </p>
        </div>
        <div class="card-body p-3 flex-1">
            <div class="chart">
                <canvas ref="lineChartRef" height="300"></canvas>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Chart from 'chart.js/auto';

const lineChartRef = ref(null);

onMounted(() => {
    createChart(lineChartRef.value, "line", {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
            {
                label: "Mobile Apps",
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                borderColor: "#cb0c9f",
                backgroundColor: createLineGradient(lineChartRef.value),
                tension: 0.4,
                fill: true,
                borderWidth: 3,
                pointRadius: 0,  // Points are hidden by default
                hoverRadius: 6,
            },
            {
                label: "Web Apps",
                data: [30, 80, 200, 150, 400, 180, 350, 200, 450],
                borderColor: "#17c1e8",
                backgroundColor: createLineGradient(lineChartRef.value),
                tension: 0.4,
                fill: true,
                borderWidth: 3,
                pointRadius: 0,  // Points are hidden by default
                hoverRadius: 6,
            },
        ],
    });
});

const createChart = (canvas, type, data) => {
    if (!canvas) return;
    new Chart(canvas.getContext("2d"), {
        type,
        data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: true },
                tooltip: {
                    enabled: true,
                    mode: "index",
                    intersect: false,
                },
            },
            hover: {
                mode: "index",
                intersect: false,
            },
            scales: {
                y: {
                    grid: { borderDash: [5, 5], color: "rgba(255,255,255,.2)" },
                    ticks: { color: "#b2b9bf", font: { size: 12 } },
                },
                x: {
                    grid: { display: false },
                    ticks: { color: "#b2b9bf", font: { size: 12 } },
                },
            },
        },
    });
};

// Gradient for the line chart
const createLineGradient = (canvas) => {
    const ctx = canvas.getContext("2d");
    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, "rgba(203, 12, 159, 0.6)");
    gradient.addColorStop(0.5, "rgba(255, 255, 255, 0.2)");
    gradient.addColorStop(1, "rgba(255, 255, 255, 0.2)");
    return gradient;
};
</script>
