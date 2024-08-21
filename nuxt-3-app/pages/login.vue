<template>
    <div>
        <button @click="login">login</button>
    </div> 
</template>

<script setup>
    const email = ref('admin@admin.com')
    const password = ref('admin123')
    const cookie = useCookie('my_auth_token')
    const data = ref(null)
    const isAuth = ref(false)

    definePageMeta({
        middleware: ['guest']
    })

    watchEffect(() => {
        if(cookie.value) {
            isAuth.value = true
        } else {
            isAuth.value = false
        }
    })

    async function login() {
        const result = await $fetch('http://localhost:8000/api/login', {
            method: 'POST',
            body: {
                email: email.value,
                password: password.value,
            }
        })
        console.log(result)
        cookie.value = result
        console.log(cookie.value)
    }

    async function user() {
        const result = await $fetch('http://localhost:8000/api/user', {
            headers: { 
                'Authorization': `Bearer ${cookie.value.token}` 
            }
        });
        data.value = result
    }

</script>