<template>
    <div class="flex flex-col items-center justify-center min-h-screen mx-4 px-2">
        <div class="row justify-content-center">
            <div class="card bg-white shadow-md rounded px-4 py-2 my-7 mx-3 max-w">
                <h2 class="text-xl font-bold mb-2">Consultas finalizadas</h2>
                <div class="mb-4" v-for="appointment in appointments" :key="appointment.id">
                    <button v-if="appointment.status === 2" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <p class="mx-2">{{ appointment.date }}</p>
                        <p class="mx-2">{{ appointment.time }}</p>
                        <p class="mx-2">{{ appointment.paciente_name }}</p>
                        <p class="mx-2">{{ appointment.psicologo_name }}</p>
                    </button>
                </div>
            </div>
            <div class="card bg-white shadow-md rounded px-4 py-2 my-7 mx-3 max-w">
                <h2 class="text-xl font-bold mb-2">Consultas Em Andamento</h2>
                <div class="mb-4" v-for="appointment in appointments" :key="appointment.id">
                    <button v-if="appointment.status === 1" class="flex w-full justify-center rounded-md bg-green-900 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <p class="mx-2">{{ appointment.date }}</p>
                        <p class="mx-2">{{ appointment.time }}</p>
                        <p class="mx-2">{{ appointment.paciente_name }}</p>
                        <p class="mx-2">{{ appointment.psicologo_name }}</p>
                    </button>
                </div>
            </div>
            <div class="card bg-white shadow-md rounded px-4 py-2 my-7 mx-3 max-w">
                <h2 class="text-xl font-bold mb-2">Consultas Agendadas</h2>
                <div class="mb-4" v-for="appointment in appointments" :key="appointment.id">
                    <button v-if="appointment.status === 0" @click="sendAppointmentId(appointment.id)" class="flex w-full justify-center rounded-md bg-red-900 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <p class="mx-2">{{ appointment.date }}</p>
                        <p class="mx-2">{{ appointment.time }}</p>
                        <p class="mx-2">{{ appointment.paciente_name }}</p>
                        <p class="mx-2">{{ appointment.psicologo_name }}</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import axios from 'axios';
    defineProps({
        appointments: Array,
    }); 

    const sendAppointmentId = async (id) => {
        try {
            const response = await axios.post('/onGoingAppointment', { id });
            window.location.reload();
        } catch (error) {
            console.error(error);
        }
    };
</script>

<script>
import Layout from "../Shared/Layout.vue";

export default {
  layout: Layout,
};
</script>