<template>
    <head
        type="description"
        content="Information for my app"
        head-key="description"
    >
    </head>
    <section class="p-6 bg-gray-200">
        <header class="flex-justify=between">
            <div class="flex-items-center">
                <h1 class="font-bold text-lg">
                    Sistema de Clinica
                </h1>
                <p class="text-sm ml-4">
                    Welcome Back, {{ name }}!
                </p>
            </div>
            <Nav />
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>
    </section>
</template>

<script>
import Nav from "./Nav";

export default {
    components: { Nav },

    computed: {
        name() {
            return $this.page.props.auth.user.name;
        }
    }
};
</script>