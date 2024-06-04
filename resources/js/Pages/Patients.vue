<template>
  <div class="flex flex-col items-center justify-center min-h-screen mx-4 px-2">
    <h1 class="text-2xl font-bold mb-6 text-center">Depoimentos de Pacientes</h1>
    <div class="flex flex-row flex-wrap justify-around">
      <div class = "card bg-white shadow-md rounded px-4 py-4 mb-7 mx-4 max-w-xs" v-for="post in posts" :key="post.id" >
        <img class="w-full h-64 object-cover mb-2 rounded" src="https://avatarfiles.alphacoders.com/288/288371.jpg" alt="Patient Image">
        <h2 class="text-xl font-bold mb-2">{{ post.user_name }}</h2>
        <p class="text-base">{{ post.content }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
  defineProps( {posts:Array} );
</script>

<script>
import Layout from "../Shared/Layout.vue";

export default {
layout: Layout,
};
</script>