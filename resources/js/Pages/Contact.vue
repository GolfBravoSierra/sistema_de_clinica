<template>
  <div>
    <h1>Nos de um feedback</h1>
      <form @submit.prevent="sendEmail">
        <div>
          <!-- <label for="to">Para:</label>
          <input type="email" v-model="email.to" value="irineu0078@gmail.com" required> -->
        </div>
        <div>
          <label for="subject">Assunto:</label>
          <input type="text" v-model="email.subject" required>
        </div>
        <div>
          <label for="message">Menssagem:</label>
          <textarea v-model="email.message" required></textarea>
        </div>
        <button type="submit">Enviar</button>
      </form>
    <p v-if="message">{{ message }}</p>
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