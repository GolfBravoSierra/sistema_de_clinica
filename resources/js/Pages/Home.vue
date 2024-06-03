<template>
  <ul>
    <li
    v-for="appointment in appointments"
    :key="appointment.id"
    >{{appointment.date}}
    {{ appointment.id }}</li>

  </ul>
</template>

<script setup>
defineProps({ appointments:Array });
</script> 

<script>
import Layout from "../Shared/Layout.vue";


export default {
layout: Layout,
};
</script>
