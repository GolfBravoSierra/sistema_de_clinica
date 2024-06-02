<template>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-4 mb-4">
            <h1 class="mb-6 text-2xl font-bold text-center">Sistema de Clinicas</h1>
            <div class="mb-4">
                <a href="/" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center mb-3">Home</a>
                <a v-if="$page.props.auth === null" href="/login" :active="$page.component === 'Login'" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center mb-3">Login</a>
                <a v-else href="#"></a>
                <a href="/contact" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center mb-3">Contato</a>
                <a href="/patients" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center mb-3">Nossos Pacientes</a>
                <a href="/about" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center mb-3">Sobre Nós</a>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "../Shared/Layout.vue";

export default {
  layout: Layout,
};
</script>