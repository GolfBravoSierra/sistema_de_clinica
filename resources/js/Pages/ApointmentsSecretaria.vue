<template>
    <!-- <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-4 mb-4">
            <h1 class="mb-6 text-2xl font-bold text-center">Consultas</h1> 
            <div class="mb-4">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Data</th>
                            <th class="px-4 py-2">Hora</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="appointment in appointments" :key="appointment.id">
                            <td class="border px-4 py-2">{{ appointment.date }}</td>
                            <td class="border px-4 py-2">{{ appointment.time }}</td>
                            <td class="border px-4 py-2">{{ appointment.status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
<div class="flex flex-col items-center justify-center min-h-screen mx-4 px-2">
    <h1 class="text-2xl font-bold mb-6 text-center">Depoimentos de Pacientes</h1>
    <div class="flex flex-row flex-wrap justify-around">
        <div class="card bg-white shadow-md rounded px-4 py-4 mb-7 mx-4 max-w-xs">
            <h2 class="text-xl font-bold mb-2">Consultas finalizadas</h2>
            <div class="mb-4">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Data</th>
                            <th class="px-4 py-2">Paciente</th>
                            <th class="px-4 py-2">Psicologo</th>
                            <th class="px-4 py-2">Hora</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="appointment in appointments" :key="appointment.id">
                            <td class="border px-4 py-2">{{ appointment.date }}</td>
                            <td class="border px-4 py-2">{{ appointment.paciente_name }}</td>
                            <td class="border px-4 py-2">{{ appointment.psicologo_name }}</td>
                            <td class="border px-4 py-2">{{ appointment.time }}</td>
                            <td class="border px-4 py-2">{{ appointment.status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="card bg-white shadow-md rounded px-4 py-4 mb-7 mx-4 max-w-xs">
            <h2 class="text-xl font-bold mb-2">Blossom</h2>
            <p class="text-base">Pellentesque a nisl nisi. Sed facilisis tortor quis odio cursus, sit amet consequat tellus congue.</p>
        </div>
        <div class="card bg-white shadow-md rounded px-4 py-4 mb-7 mx-4 max-w-xs">
            <h2 class="text-xl font-bold mb-2">Buttercup</h2>
            <p class="text-base">Sed viverra nibh finibus turpis iaculis, a mollis purus sagittis.</p>
        </div> -->
    </div>
  </div>
</template>

<script setup>
    defineProps({
        appointments: Array,
    }); 

</script>

<script>
import Layout from "../Shared/Layout.vue";

export default {
  layout: Layout,
};
</script>