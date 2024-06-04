<template>
    <main class="grid place-items-center min-h-screen">
        <section class="bg-white p-8 rounded-xl max-w-md mx-auto border w-full">
            <h1 class="text-3xl mb-6">Crie um novo Agendamento</h1>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form @submit.prevent="sendNewAppointment" class="space-y-6">
                    <div>
                        <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Data</label>
                        <input type="date" v-model="appointment.date" required class="border p-2 w-full rounded">
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Horário</label>
                        <input type="time" v-model="appointment.time" required class="border p-2 w-full rounded">
                    </div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Enviar
                    </button>
                    <p v-if="message" class="text-center">{{ message }}</p>
                </form>
            </div>
        </section>
    </main>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
let form = useForm({
    date: "",
    time: "",
});
let submit = () => {
    form.post("login");
};
</script>

<script>
import axios from 'axios';
import Layout from "../../Shared/Layout.vue";

export default {
  layout: Layout,
data(){
    return {
      appointment: {
        date: '',
        time: '',
        paciente_id: '',
        paciente_name: '',
    },
    message: '',
    };
},
mounted () {
    this.appointment.paciente_name = this.$page.props.auth.user.name,
    this.appointment.paciente_id = this.$page.props.auth.user.id
},
methods: {
    async sendNewAppointment() {
        try {
            console.log(this.appointment);
            const response = await axios.post('/appointments/create', this.appointment);
            window.location.reload();
        } catch (error) {
            console.log(error);
        }
    },
},
};
</script>