<template>
    <Link 
        href="/" 
        class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3"
        :class="{'font-bold bg-blue-800': $page.component === 'Index'}"
    >
        Home
    </Link>
</template>

<script>
export default {
    props: {
        active: Boolean
    }
}
</script>
