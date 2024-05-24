<template>
  <div class="container flex justify-center items-center h-screen bg-gradient">
    <div class="flex max-w-2xl mx-auto p-8 bg-gradient-to-br from-blue-300 to-blue-500 rounded-lg shadow-3d transform hover:scale-105 transition duration-300 relative">
      <div class="w-1/2 pr-8 flex items-center">
        <img src="https://cdn.dribbble.com/users/1242979/screenshots/7099165/media/e521bd143bf1e795af3ec725a68e273f.gif" alt="Description" class="w-full h-auto rounded-lg shadow-md" />
        <button onclick="window.history.back()" class="btn-back">Back</button>
      </div>
      <div class="w-1/2">
        <h1 class="text-3xl text-white font-bold mb-6 text-shadow">Create Playlist</h1>
        <!-- Conditionally render success message -->
        <div v-if="successMessage" class="text-green-600 mb-4">{{ successMessage }}</div>
        <form @submit.prevent="submit">
          <div class="mb-4">
              <label for="artist" class="form-label text-lg">Artist</label>
              <input type="text" id="artist" class="form-control w-full px-3 py-2 border border-gray-300 rounded shadow-inner" v-model="form.artist_name">
            </div>
            <div class="mb-4">
              <label for="title" class="form-label text-lg">Title</label>
              <input type="text" id="title" class="form-control w-full px-3 py-2 border border-gray-300 rounded shadow-inner" v-model="form.title">
            </div>
            <div class="mb-4">
              <label for="genre" class="form-label text-lg">Genre</label>
              <select id="genre" class="form-control w-full px-3 py-2 border border-gray-300 rounded shadow-inner" v-model="form.genre">
                <option value="">Select Genre</option>
                <option value="Rock">Rock</option>
                <option value="Pop">Pop</option>
                <option value="Country music">Country music</option>
                <option value="Jazz">Jazz</option>
                <option value="Hip Hop">Hip Hop</option>
                <option value="R&B">R&B</option>
                <option value="Electronic">Electronic</option>
                <option value="Classical">Classical</option>
                <option value="Folk">Folk</option>
                <option value="Reggae">Reggae</option>
              </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700 button-shadow">Save Playlist</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import MyLayout from '@/Layouts/MyLayout.vue';

export default {
  layout: MyLayout,
  setup() {
    const form = useForm({
      title: '',
      artist: '',
      genre: '',
    });

    const submit = async () => {
      form.post('/playlist');
    };

    return { form, submit };
  }
};
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: linear-gradient(45deg, #6000DD, #7000AA);
}

.max-w-2xl {
  max-width: 42rem; /* Adjust as needed */
}

.p-8 {
  padding: 2rem;
}

.bg-gradient-to-br {
  background-image: linear-gradient(to bottom right, #3182ce, #2b6cb0);
}

.border {
  border: 1px solid transparent;
}

.rounded-lg {
  border-radius: 0.75rem; /* Adjust as needed */
}

.shadow-3d {
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), inset 0 1px 3px rgba(255, 255, 255, 0.2);
}

.text-shadow {
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
}

.label-shadow {
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

.input-shadow {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 2px rgba(0, 0, 0, 0.1);
}

.button-shadow {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
}

.hover\:scale-105:hover {
  transform: scale(1.05);
}

.transition {
  transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
  transition-duration: 300ms;
}

.text-white {
  color: white;
}

.text-gray-700 {
  color: #4a5568;
}

.font-bold {
  font-weight: bold;
}

.mb-2 {
  margin-bottom: 0.5rem;
}

.w-full {
  width: 100%;
}

.px-3 {
  padding-left: 0.75rem;
  padding-right: 0.75rem;
}

.py-2 {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.focus\:outline-none:focus {
  outline: none;
}

.focus\:border-blue-500:focus {
  border-color: #3182ce;
}

.bg-blue-600 {
  background-color: #3182ce;
}

.hover\:bg-blue-700:hover {
  background-color: #2b6cb0;
}

.hover\:text-white:hover {
  color: white;
}

.rounded-md {
  border-radius: 0.375rem; /* Adjust as needed */
}

.pr-8 {
  padding-right: 2rem;
}

.h-auto {
  height: auto;
}

.shadow-md {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
}

/* Custom Button Style */
.btn-back {
  position: absolute;
  bottom: 1rem;
  left: 10%;
  transform: translateX(-50%);
  background-color: #48bb78; /* Green background color */
  color: white; /* White text color */
  padding: 0.5rem 1rem; /* Padding */
  border: none; /* No border */
  border-radius: 8.375rem; /* Rounded corners */
  cursor: pointer; /* Cursor style */
  transition: background-color 0.3s; /* Smooth background color transition */
}

.btn-back:hover {
  background-color: #38a169; /* Darker green background color on hover */
}
</style>
