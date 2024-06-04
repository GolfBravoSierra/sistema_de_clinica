<template>
    <input type="hidden" ref="id" :value="$page.props.auth.user.id" />
  <div class="flex flex-row justify-around">
    <Link href="/appointments/create">Agendar</Link>
        <div class="card bg-white shadow-md rounded px-4 py-4 mb-7 mx-4">
          <h2 class="text-xl font-bold mb-2">Consultas Futuras</h2>
            <div class="mb-4">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Data</th>
                            <th class="px-4 py-2">Psicologo</th>
                            <th class="px-4 py-2">Hora</th>
                            <th class="px-4 py-2"></th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="appointment in appointments" :key="appointment.id">
                            <td class="border px-4 py-2">{{ appointment.date }}</td>
                            <td class="border px-4 py-2">{{ appointment.psicologo_name }}</td>
                            
                            <td class="border px-4 py-2">{{ appointment.time }}</td>
                            <td class="border px-4 py-2"><Link href="/appointments/update">Editar</Link></td>
                            <td class="border px-4 py-2">
                                <input type="hidden":value="appointment.id">
                                <button
                                    @click="destroy(appointment.id)"
                                    type="submit"
                                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                    :disabled="form.processing"
                                >
                                    Cancelar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          <h2 class="text-xl font-bold mb-2">Consultas finalizadas</h2>
          <div class="mb-4">
              <table class="table-auto w-full">
                  <thead>
                      <tr>
                          <th class="px-4 py-2">Data</th>
                          <th class="px-4 py-2">Psicologo</th>
                          <th class="px-4 py-2">Hora</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="appointment in appointments" :key="appointment.id">
                          <td class="border px-4 py-2">{{ appointment.date }}</td>
                          <td class="border px-4 py-2">{{ appointment.psicologo_name }}</td>
                          <td class="border px-4 py-2">{{ appointment.time }}</td>
                      </tr>
                  </tbody>
              </table>
          </div>
        </div>
    </div>
</template>

<script setup>
    import { useForm } from "@inertiajs/vue3";
    import axios from 'axios';

    defineProps({ appointments: Array, user: Object });

    const destroy = async (id) => {
        try {
            const response = await axios.post('/appointments/destroy', { id });
            window.location.reload();
        } catch(error) {
            console.log(error);
        }
    };

    let form = useForm({
        appointmentId: "",
    });

    // let submit = (appointmentId) => {
    //     form.post('/' + id + '/appointments/destroy', { appointmentId });
    // };


</script> 

<script>
    import Layout from "../../Shared/Layout.vue";
    import { Link } from "@inertiajs/vue3"

    export default {
        data(){
            return {
                form: {
                    appointmentId: "",
                    processing: false,
                },
            }
        },
        layout: Layout,
        components: { Link },
    };
</script>
