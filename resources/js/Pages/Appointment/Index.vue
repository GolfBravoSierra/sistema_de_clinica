<template>
  <div class="flex flex-row justify-around">
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
                            <td class="border px-4 py-2"><Link :href="'/'+$page.props.auth.user.id+'/appointment/update'">Editar</Link></td>
                            <td class="border px-4 py-2"><Link :href="'/'+$page.props.auth.user.id+'/appointment/destroy'" method="post" as="button">Cancelar</Link></td>
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
defineProps({ appointments:Array, user:Object });
</script> 

<script>
import Layout from "../../Shared/Layout.vue";
import { Link } from "@inertiajs/vue3"


export default {
layout: Layout,
components: { Link },
};
</script>
