<template>
  <div class="bg-gray-100 container mx-auto py-8 px-4 flex flex-col items-center">
    <div class="mt-8">
      <h2 class="text-2xl font-bold mb-4">Favorite Playlists</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center">
        <div v-for="playlist in favoritePlaylists" :key="playlist.id" class="card bg-white shadow-2xl rounded-2xl overflow-hidden transform transition-transform hover:scale-105 hover:shadow-2xl" style="width: 300px; height: 350px;">
          <div class="p-6 relative h-full flex flex-col justify-center items-center">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 opacity-50 rounded-2xl"></div>
            <div class="relative z-10 flex flex-col justify-center items-center">
              <h2 class="text-2xl font-semibold text-white">{{ playlist.title }}</h2>
              <h3 class="text-lg font-semibold text-gray-800">{{ playlist.artist_name }}</h3>
              <p class="text-black-300">{{ playlist.genre }}</p>
            </div>
          </div>

          <!-- Button to remove from favorites -->
          <button @click="removeFromFavorites(playlist)" class="btn btn-red flex items-center justify-center w-12 h-12 rounded-full absolute top-4 right-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 14s-6-3.5-6-7a4-4 0 0 1 6-3.464A4 4 0 0 1 14 7c0 3.5-6 7-6 7z"/>
            </svg>
          </button>

          <!-- Link to playlist detail -->
          <Link :href="'/playlists/' + playlist.id" class="btn btn-blue flex items-center justify-center w-12 h-12 rounded-full absolute bottom-4 right-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a.5.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
              <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
            </svg>
          </Link>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center mt-8">
      <div v-for="playlist in playlists" :key="playlist.id" class="card bg-white shadow-2xl rounded-2xl overflow-hidden transform transition-transform hover:scale-105 hover:shadow-2xl" style="width: 300px; height: 350px;">
        <div class="p-6 relative h-full flex flex-col justify-center items-center">
          <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 opacity-50 rounded-2xl"></div>
          <div class="relative z-10 flex flex-col justify-center items-center">
            <h2 class="text-2xl font-semibold text-white">{{ playlist.title }}</h2>
            <h3 class="text-lg font-semibold text-gray-800">{{ playlist.artist_name }}</h3>
            <p class="text-black-300">{{ playlist.genre }}</p>
          </div>
        </div>

        <!-- Button to add to favorites -->
        <button @click="addToFavorites(playlist)" :class="{ 'text-yellow-400': playlist.favorite }" class="btn btn-blue flex items-center justify-center w-12 h-12 rounded-full absolute top-4 right-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-heart-fill" viewBox="0 0 16 16">
            <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9 9 0 0 0 8 15m0-9.007c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
          </svg>
        </button>

        <!-- Link to playlist detail -->
        <Link :href="'/playlists/' + playlist.id" class="btn btn-blue flex items-center justify-center w-12 h-12 rounded-full absolute bottom-4 left-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a.5.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
          </svg>
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, defineProps } from 'vue';
import MyLayout from '@/Layouts/MyLayout.vue';

defineOptions({
  layout: MyLayout
});

const props = defineProps({
  playlists: Array
});

// Store favorite playlists
const favoritePlaylists = ref([]);

// Function to add playlist to favorites
const addToFavorites = (playlist) => {
  if (!playlist.favorite) {
    playlist.favorite = true; // Set favorite flag
    favoritePlaylists.value.push(playlist); // Add to favoritePlaylists array
  }
}

// Function to remove playlist from favorites
const removeFromFavorites = (playlist) => {
  playlist.favorite = false; // Unset favorite flag
  const index = favoritePlaylists.value.findIndex(item => item.id === playlist.id);
  if (index !== -1) {
    favoritePlaylists.value.splice(index, 1); // Remove from favoritePlaylists array
  }
}
</script>

<style scoped>
.container {
  background: linear-gradient(45deg, #6000DD, #7000AA);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4), 0 6px 20px rgba(0, 0, 0, 0.3);
  padding: 20px;
  max-width: 100%;
}

.btn {
  padding: 8px 12px;
  border-radius: 4px;
  color: white;
  text-decoration: none;
  transition: background-color 0.3s ease, transform 0.3s ease;
}



.btn-blue:hover {
  background-color: #2563EB;
}


</style>
