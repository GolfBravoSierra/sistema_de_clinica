<template>
    <div v-if="$page.props.auth.user.permicao = 3" class="mb-7">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Cadastre um Paciente</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form @submit.prevent="sendNewUser" class="space-y-6">
                <div>
                    <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                    <input type="text" v-model="patient.name" required class="border p-2 w-full rounded">
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <input type="email" v-model="patient.email" required class="border p-2 w-full rounded">
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
                    <input type="password" v-model="patient.password" required class="border p-2 w-full rounded">
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">CEP</label>
                    <input type="text" v-model="patient.cep" @input="getCepInfo" required class="border p-2 w-full rounded">
                </div>
                <div v-if="cepInfo">
                    <!-- logradouro -->
                    <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Logradouro</label>
                    <input type="text" v-model="cepInfo.logradouro" required class="border p-2 w-full rounded" readonly>
                    <!-- bairro -->
                    <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Bairro</label>
                    <input type="text" v-model="cepInfo.bairro" required class="border p-2 w-full rounded" readonly>
                    <!-- localidade -->
                    <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Localidade</label>
                    <input type="text" v-model="cepInfo.localidade" required class="border p-2 w-full rounded" readonly>
                    <!-- UF -->
                    <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Estado</label>
                    <input type="text" v-model="cepInfo.uf" required class="border p-2 w-full rounded" readonly>
                </div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Enviar
                </button>
                <p v-if="message" class="text-center">{{ message }}</p>
            </form>
        </div>
    </div>
    <div v-else class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-4 mb-4">
            <h1 class="mb-6 text-2xl font-bold text-center">Você não tem permissão para acessar essa página</h1>
            <div class="mb-4">
                <a href="/" class="block bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-4 rounded text-center mb-3">Volte para o início</a>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "../Shared/Layout.vue";
import axios from 'axios';

export default {
  layout: Layout,
  data() {
    return {
      patient: {
        name: '',
        email: '',
        password: '',
        cep: '',
      },
      message: '',
      cepInfo: null,
    };
  },
  methods: {
    async sendNewUser() {
        try {
            const response = await axios.post('/newPatient', this.patient);
            this.message = response.data.message;
        } catch (error) {
            console.log(error.message);
            this.message = 'Falha ao criar usuário';
        }
    },
    getCepInfo() {
        if (this.patient.cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${this.patient.cep}/json/`)
            .then(response => response.json())
            .then(data => {
            this.cepInfo = data;
            });
        }
    }
  }
};
</script>