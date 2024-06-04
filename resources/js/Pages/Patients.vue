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
  <div v-if="$page.props.auth !== null" class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form @submit.prevent="sendPost" class="space-y-6">
      <div>
        <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Depoimento</label>
        <textarea v-model="post.content" required class="border p-2 w-full rounded" id="content" name="content"></textarea>
      </div>
      
      <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        Enviar
      </button>
    </form>
    <p v-if="message">{{ message }}</p>
  </div>
</template>

<script setup>
  defineProps( {posts:Array} );
</script>

<script>
import axios from 'axios';
import Layout from "../Shared/Layout.vue";

export default {
layout: Layout,
data() {
    return {
      post: {
        content: '',
        user_name: '',
        paciente_id: '',
      },
      message: ''
    };
  },
  mounted () {
    this.post.user_name = this.$page.props.auth.user.name,
    this.post.paciente_id = this.$page.props.auth.user.id
  },
  methods: {
    async sendPost() {
      try {
        console.log(this.post);
        const response = await axios.post('/patients/post', this.post);
        window.location.reload();
      } catch (error) {
        console.log(error);
      }
    }
  }
};
</script>