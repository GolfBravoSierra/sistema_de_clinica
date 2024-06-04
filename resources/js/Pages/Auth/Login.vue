<template>
    <main v-if="$page.props.auth === null" class="grid place-items-center min-h-screen">
        <section class="bg-white p-8 rounded-xl max-w-md mx-auto border w-full">
            <h1 class="text-3xl mb-6 font-bold leading-9 tracking-tight text-gray-900">Log In</h1>

            <form @submit.prevent="submit">
                <div class="mb-6">
                    <label
                        class="block text-sm font-medium leading-6 text-gray-900"
                        for="name"
                    >
                        Username
                    </label>

                    <input
                        v-model="form.name"
                        class="border p-2 w-full rounded"
                        type="name"
                        name="name"
                        id="name"
                        required
                    />

                    <div
                        v-if="form.errors.name"
                        v-text="form.errors.name"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>

                <div class="mb-6">
                    <label
                        class="block text-sm font-medium leading-6 text-gray-900"
                        for="password"

                    >
                        Password
                    </label>

                    <input
                        v-model="form.password"
                        class="border p-2 w-full rounded"
                        type="password"
                        name="password"
                        id="password"
                        required
                    />

                    <div
                        v-if="form.errors.password"
                        v-text="form.errors.password"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>

                <div>
                    <button
                        type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        :disabled="form.processing"
                    >
                        Log In
                    </button>
                </div>
            </form>
        </section>
    </main>
    <div v-else class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-4 mb-4">
            <h1 class="mb-6 text-2xl font-bold text-center">Você já está logado</h1>
            <div class="mb-4">
                <a href="/" class="block bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-4 rounded text-center mb-3">Voltar</a>
                <a class="block bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-4 rounded text-center mb-3" href="/logout" method="post" as="button" >Logout</a>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
let form = useForm({
    name: "",
    password: "",
});
let submit = () => {
    form.post("login");
};
</script>

<script>
export default {
    layout: null,
};
</script>
