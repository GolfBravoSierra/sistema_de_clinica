<template>
    <nav>
        <h1 class="font-bold text-lg">
            <NavLink href="/" :active="$page.component === 'Index'"  >Sistema de Clinica</NavLink>
        </h1>
        <p v-if="$page.props.auth !== null" class="text-sm ml-4">
            Welcome Back, {{ $page.props.auth.user.name }}!
        </p>
        <ul class="flex space-x-6">
            <li>
                <NavLink href="/" :active="$page.component === 'Index'"  >Home</NavLink>
            </li>
            <li>
                <NavLink v-if="$page.props.auth === null" href="/login" :active="$page.component === 'Login'"  >Login</NavLink>
                <NavLink v-else href="/logout" method="post" as="button" >Logout</NavLink>
            </li>
            <li>
                <NavLink href="/contact" :active="$page.component === 'Contact'"  >Contato</NavLink>
            </li>
            <li>
                <NavLink href="/patients" :active="$page.component === 'Patients'"  >Nossos Pacientes</NavLink>
            </li>
            <li>
                <NavLink href="/about" :active="$page.component === 'About'"  >Sobre nós</NavLink>
            </li>
        </ul>
    </nav>
</template>

<script>
import NavLink from "./NavLink.vue";

export default {
    name: 'Nav',
    components: { NavLink },
}
</script>