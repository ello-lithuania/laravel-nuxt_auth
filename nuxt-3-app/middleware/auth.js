export default defineNuxtRouteMiddleware((to, from) => {
    const cookie = useCookie('my_auth_token');
    if(!cookie.value) {
        return navigateTo('/login')
    }
  })
  