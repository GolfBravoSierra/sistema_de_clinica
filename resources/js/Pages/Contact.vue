<template>
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Entre em Contato</h2>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form @submit.prevent="sendEmail" class="space-y-6">
        <div>
          <!-- <label for="to">Para:</label>
          <input type="email" v-model="email.to" value="irineu0078@gmail.com" required> -->
        </div>
        <div>
          <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Assunto</label>
          <input type="text" v-model="email.subject" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div>
          <label for="message" class="block text-sm font-medium leading-6 text-gray-900">Menssagem</label>
          <textarea v-model="email.message" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Enviar
        </button>
      </form>
      <p v-if="message">{{ message }}</p>
    </div>
  </div>
</template>
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        email: {
          to: '',
          subject: '',
          message: ''
        },
        message: ''
      };
    },
    methods: {
      async sendEmail() {
        try {
          const response = await axios.post('http://localhost:8080/api/send-email', this.email);
          this.message = response.data.message;
        } catch (error) {
          this.message = 'Failed to send email.';
        }
      }
    }
  };
  </script>