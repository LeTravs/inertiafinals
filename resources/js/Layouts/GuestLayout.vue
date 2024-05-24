<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div class="min-h-screen flex flex-col justify-center items-center pt-6" style="background-image: url('https://i.pinimg.com/originals/ec/59/f2/ec59f2f5cfbe75e212eb89d477ccf8d2.gif'); background-size: cover; background-position: center;">
    <div class="w-full max-w-md mt-6 px-6 py-4 bg-white shadow-lg rounded-lg mb-5">
      <slot />
    </div>
    <Link href="/" class="py-2 px-4 border border-white text-white bg-transparent rounded-full mb-4 hover:bg-white hover:text-blue-600 transition duration-300 ease-in-out">← Return</Link>
  </div>
</template>

<style scoped>
a {
  text-decoration: none;
}
</style>
