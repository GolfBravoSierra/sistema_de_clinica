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
                <Nav />
            </div>
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>
    </section>
</template>

<script>
import Nav from "./Nav.vue";

export default {
    name: 'Layout',

    components: { Nav },
};
</script>