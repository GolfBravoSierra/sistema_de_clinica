<template>
  <div>
      <h1>Você está na home</h1>
      <button @click="addAppointmentToUser(appointment.id)">Adicionar compromisso</button>
      <div v-for="appointment in appointments" :key="appointment.id">
          <h2>{{ appointment.title }}</h2>
          <p>{{ appointment.date }}</p>
      </div>
  </div>
</template>

<script>
import axios from 'axios';
import Layout from "../../Shared/Layout.vue";

export default {
layout: Layout,
data() {
  return {
    appointments: [],
  };
},
methods: {
  getAppointments(clientName) {
    axios.get(`/api/appointments?clientName=${clientName}`)
      .then(response => {
        this.appointments = response.data;
      })
      .catch(error => {
        console.error(error);
      });
  },
  addAppointmentToUser(appointmentId) {
    axios.post(`/api/appointments/${appointmentId}/add-to-user`)
      .then(response => {
        console.log(response.data);
      })
      .catch(error => {
        console.error(error);
      });
  },
},
created() {
  this.getAppointments('Nome do cliente');
},
};
</script>