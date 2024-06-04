<template>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-4 mb-4">
            <h1 class="mb-6 text-2xl font-bold text-center">Sistema Secretária</h1>
            <div class="mb-4">
                <a href="/add-patients" class="block bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-4 rounded text-center mb-3">Cadastro de Paciente</a>
                <a href="/manage-appointments" class="block bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-4 rounded text-center mb-3">Gerenciar Consultas</a>
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