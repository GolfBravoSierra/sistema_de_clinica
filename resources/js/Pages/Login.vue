<template>
    <div>
        <h1>Login</h1>
        <form @submit="login">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" v-model="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" v-model="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            username: '',
            password: ''
        };
    },
    methods: {
        login(event) {
            event.preventDefault();
            // Aqui você pode adicionar a lógica para autenticar o usuário
            // usando os valores de username e password
        }
    }
};
</script>

<style scoped>
/* Estilos específicos para esta página de login */
</style>