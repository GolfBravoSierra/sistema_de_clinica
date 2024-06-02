<template>
    <main class="grid place-items-center min-h-screen">
        <section class="bg-white p-8 rounded-xl max-w-md mx-auto border w-full">
            <h1 class="text-3xl mb-6">Edite o Agendamento</h1>

            <form @submit.prevent="submit">

                <div>
                    <button
                        type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        :disabled="form.processing"
                    >
                        Atualizar
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
let form = useForm({
    date: "",
    time: "",
});
let submit = () => {
    form.post("login");
};
</script>

<script>
import Layout from "../../Shared/Layout.vue";

export default {
  layout: Layout,
};
</script>