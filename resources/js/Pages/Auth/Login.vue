<script setup>
import {reactive} from "vue";

const data = reactive({
    email: '',
    password: '',
    error: ''
})
const handleLogin = async () => {
    const result = await fetch('/login', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            email: data.email,
            password: data.password,
        })
    })
        .then(data => data.json())
}
</script>

<template>
    <div class="login-wrapper">
        <form class="login-form" @submit.prevent="handleLogin">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Enter e-mail" v-model="data.email">

                <label for="password">Password:</label>
                <input type="password" id="password" placeholder="Enter password" v-model="data.password">
            </div>
            <button type="submit" @click="">Login</button>
        </form>
    </div>
</template>

<style scoped>
.login-wrapper {
    width: 100%;
    height: 100%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    .login-form {
        display: flex;
        flex-direction: column;
        .form-group {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
    }
}
</style>
