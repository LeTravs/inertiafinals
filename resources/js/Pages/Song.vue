<template>
  <div class="container mx-auto py-8 px-4 flex flex-col items-center">
    <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    </head>
    
    <h1 class="text-4xl my-6 text-white font-bold">Song Directory</h1>

    <Link :href="'/songs/create'" class="btn inline-block px-6 py-2 font-semibold leading-5 text-white bg-blue-600 hover:bg-blue-700 rounded-lg mb-6 shadow-lg transition-transform transform hover:scale-105">Create New</Link>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center">
      <div v-for="song in songs" :key="song.id" class="card-container">
        <div class="card bg-gray-800 shadow-2xl rounded-2xl overflow-hidden transform transition-transform hover:scale-105 hover:shadow-2xl" style="width: 300px; height: 350px;">
          <div class="p-6 relative h-full flex flex-col justify-center items-center">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 opacity-50 rounded-2xl"></div>
            <div class="relative z-10 flex flex-col justify-center items-center">
              <img :src="song.image_url" alt="Song Image" class="styled-image">
              <h2 class="text-2xl font-semibold text-white mt-4">{{ song.title }}</h2>
              <p class="text-gray-300">{{ song.artist }}</p>
              <Link :href="'/songs/' + song.id" class="view-song-btn mt-2">
                <i class="bi bi-music-note-list"></i>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import MyLayout from '@/Layouts/MyLayout.vue';

const props = defineProps({
  songs: Array
});

defineOptions({
  layout: MyLayout
});

const songs = ref(props.songs);

onMounted(async () => {
  try {
    // Fetch songs data or use the passed props
  } catch (error) {
    console.error('Error fetching songs:', error);
  }
});
</script>

<style scoped>
.container {
  background: linear-gradient(45deg, #6000DD, #7000AA);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4), 0 6px 20px rgba(0, 0, 0, 0.3);
  padding: 20px;
  max-width: 100%;
}

.styled-image {
  border: 2px solid #fff; 
  border-radius: 8px;
  width: 100px;
  height: 100px; 
  object-fit: cover; 
}

.btn {
  padding: 8px 12px;
  border-radius: 4px;
  color: white;
  text-decoration: none;
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-blue {
  background-color: #3B82F6;
}

.btn-blue:hover {
  background-color: #2563EB;
}

.card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-radius: 20px;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
}

.shadow-2xl {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 3px 6px rgba(0, 0, 0, 0.1);
}

.rounded-2xl {
  border-radius: 1.5rem;
}

.overflow-hidden {
  overflow: hidden;
}

.text-gray-300 {
  color: #D1D5DB;
}

.view-song-btn {
  padding: 8px 12px;
  border-radius: 4px;
  background-color: #3B82F6;
  color: white;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
  text-decoration: none;
  display: inline-block;
}

.view-song-btn:hover {
  background-color: #2563EB;
}

.card-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>
