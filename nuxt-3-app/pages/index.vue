<template>
    <div>
        <h1>Welcome</h1>
    </div>
</template>

<script setup>
    definePageMeta({
        middleware: ['auth']
    })
</script>