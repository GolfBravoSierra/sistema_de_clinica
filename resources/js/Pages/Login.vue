<template>
  <div class="flex items-center justify-center min-h-screen">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="login">
      <div class="mb-4">
        <label class="block text-sm font-medium leading-6 text-gray-900" for="name">
          Username
        </label>
        <input class="block shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" v-model="name">
      </div>
      <div class="mb-6">
        <label class="block text-sm font-medium leading-6 text-gray-900" for="password">
          Senha
        </label>
        <input class="block shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" v-model="password">
      </div>
      <div class="flex items-center justify-between">
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" type="submit">
          Login
        </button>
      </div>
    </form>
    <p v-if="message">{{ message }}</p>
  </div>
  <a href="/home">sair</a>
</template>

<style scoped>
/* Estilos específicos para esta página de login */
</style>

<script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        name: '',
        password: '',
        message: 'sdadbdb'
      }
    },
    methods: {
      async login() {
        try {
          const response = await axios.post('/login-submit', {
              name: this.name,
              password: this.password
          });
          this.message = response.data.message;
        } catch (error) {
          this.message = 'Failed to login.';
          console.log(error);
        } 
      }
    }
  };
  </script>