<template>
    <nav class="mt-6">
        <ul class="list-disc">
            <li>
                <Link 
                    href="/" 
                    class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3"
                    :class="{'font-bold bg-blue-800': $page.component === 'Index'}"
                >
                    Home
                </Link>
            </li>
            <li>
                <Link 
                    href="/login" 
                    class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3"
                    :class="{'font-bold bg-blue-800': $page.component === 'Login'}"
                >
                    Login
                </Link>
            </li>
            <li>
                <Link 
                    href="/contact" 
                    class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3"
                    :class="{'font-bold bg-blue-800': $page.component === 'Contact'}"
                >
                    Contato
                </Link>
            </li>
            <li>
                <Link 
                    href="/patients" 
                    class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3"
                    :class="{'font-bold bg-blue-800': $page.component === 'Patients'}"
                >
                    Nossos Pacientes
                </Link>
            </li>
            <li>
                <Link 
                    href="/about" 
                    class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3"
                    :class="{'font-bold bg-blue-800': $page.component === 'About'}"
                >
                    Sobre Nós
                </Link>
            </li>
        </ul>
    <nav/>
</template>

<script>
import { NavLink } from "./NavLink";

export default {
    components: { NavLink },
}
</script>