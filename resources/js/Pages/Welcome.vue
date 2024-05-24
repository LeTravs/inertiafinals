<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <div class="home">
        <div class="content">
            <img src="https://i.pinimg.com/originals/71/d3/65/71d365c6b3117191bcbf8def41219e45.gif" alt=""  class="center-image" width="500px" >
            <p class="text-center text-4xl font-bold text-white mb-5">Welcome to Avalan Music Hub!</p>
            <p class="text-center text-xl font-bold text-white mt-2">Discover and manage your favorite tunes</p>
            <p class="text-center text-xl font-bold text-white mt-2">all in one place. Don't miss a beat!</p>
            <p class="text-center text-xl font-bold text-blue-600 mt-5 mb-5">Start exploring now!</p>
            <div class="auth-links">
                <Link :href="route('login')" class="route-link">Log in</Link>
                <Link v-if="canRegister" :href="route('register')" class="route-link">Register</Link>
            </div>
        </div>
    </div>
</template>

<style>
.home {
    background-image: url('https://cdn.pixabay.com/photo/2017/11/15/09/28/music-player-2951399_640.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.content {
    text-align: center;
}

.auth-links {
    margin-bottom: 20px;
}

.route-link {
    font-weight: 600;
    margin: 0 10px;
    padding: 8px 16px;
    border: 2px solid transparent;
    border-radius: 4px;
    transition: all 0.3s ease;
    background-color: #4a90e2;
    color: #fff;
    text-decoration: none;
}

.route-link:hover {
    background-color: #fff;
    border-color: #4a90e2;
    color: #4a90e2;
}

.center-image {
    max-width: 100%;
    height: auto;
    margin-bottom: 50px;
    border-radius: 8px;
    box-shadow: 0 5px 6px rgba(0, 0, 0, 0.1);
}
</style>
