<template>
  <div class="flex justify-center items-center min-h-screen">
    <div class="w-1/2">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Entre em Contato</h2>
      </div>
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form @submit.prevent="sendEmail" class="space-y-6">
          <div>
            <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Assunto</label>
            <input type="text" v-model="email.subject" required class="border p-2 w-full rounded">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium leading-6 text-gray-900">Mensagem</label>
            <textarea v-model="email.message" required class="border p-2 w-full rounded"></textarea>
          </div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Enviar
          </button>
        </form>
        <p v-if="message">{{ message }}</p>
      </div>
    </div>
    <div class="w-1/2 flex justify-center items-center"> 
      <table>
        <tr>
          <td><i class="fas fa-envelope mr-2"></i></td>
          <td class="text-sm font-bold leading-6 text-gray-900">sistemaclinica@bol.com.br</td>
        </tr>
        <tr>
          <td><i class="fas fa-phone mr-2"></i></td>
          <td class="text-sm font-medium leading-6 text-gray-900">(11) 99999-9999</td>
        </tr>
      </table>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
import Layout from "../Shared/Layout.vue";

export default {
  layout: Layout,
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