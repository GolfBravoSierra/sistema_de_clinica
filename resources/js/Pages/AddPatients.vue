<template>
    <div v-if="$page.props.auth.user.permicao = 3" class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-4 mb-4">
            <h1 class="mb-6 text-2xl font-bold text-center">Cadastro de Pacientes</h1>
            <div class="mb-4">
            </div>
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

export default {
  layout: Layout,
};
</script>