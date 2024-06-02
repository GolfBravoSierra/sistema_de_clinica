<template>
    <main class="grid place-items-center min-h-screen">
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
