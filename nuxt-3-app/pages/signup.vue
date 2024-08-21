<template>
    <div>
        <button @click="signup">Signup</button>
    </div> 
</template>

<script setup>
    const name = ref('admin')
    const email = ref('admin@admin.com')
    const password = ref('admin123')
    const confirm_password = ref('admin123')
    const cookie = useCookie('my_auth_token')

    definePageMeta({
        middleware: ['guest']
    })

    async function signup() {
        try {
            const result = await $fetch('http://localhost:8000/api/signup', {
                method: 'POST',
                body: {
                    name: name.value,
                    email: email.value,
                    password: password.value,
                    password_confirmation: confirm_password.value,
                }
            })
            console.log(result)

            cookie.value = result
            console.log(cookie.value)
        } catch(e) {
            console.log(e.data.message)
        }
    }
</script>