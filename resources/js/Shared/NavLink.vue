<template>
    <Link 
        class="text-black hover:font-bold"
        :class="{'font-bold underline': active}"
    >
        <slot />
    </Link>
</template>

<script>
import { Link } from "@inertiajs/vue3"

export default {
    name: 'NavLink',
    components: { Link },
    props: {
        active: Boolean
    }
};
</script>
