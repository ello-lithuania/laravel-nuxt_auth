<template>
    <div>
        <NuxtLink to="/">Home</NuxtLink>
        <button v-if="isAuth" @click="signout">signout</button>
        <div v-else>
            <NuxtLink to="/login">Login</NuxtLink>
            <NuxtLink to="/signup">Register</NuxtLink>
        </div>
        
    </div> 
</template>

<script setup>
    const cookie = useCookie('my_auth_token')
    const isAuth = ref(false)

    watchEffect(() => {
        if(cookie.value) {
            isAuth.value = true
        } else {
            isAuth.value = false
        }
    })

    async function signout() {
        const result = await $fetch('http://localhost:8000/api/logout', {
            method: 'DELETE',
            headers: { 
                'Authorization': `Bearer ${cookie.value.token}` 
            }
        });
        cookie.value = null
        console.log(cookie.value)
    }

</script>