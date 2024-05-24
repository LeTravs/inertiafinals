<template>
  <div class="container mx-auto flex justify-center items-center h-screen">
    <div class="card border border-gray-300 rounded-lg bg-gray-200 shadow-2xl transform transition-transform hover:scale-105 hover:shadow-3xl">
      <h1 class="card-header text-2xl text-primary font-weight-bold py-4 px-6 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-t-lg">Playlist Profile</h1>
      <div class="card-body p-6">
        <div class="row">
          <table class="col-md-6 table-auto w-full">
            <tr class="border-b">
              <th class="text-left py-2">Title:</th>
              <td class="py-2">{{ playlist.title }}</td>
            </tr>
            <tr class="border-b">
              <th class="text-left py-2">Artist:</th>
              <td class="py-2">{{ playlist.artist_name }}</td>
            </tr>
            <tr>
              <th class="text-left py-2">Genre:</th>
              <td class="py-2">{{ playlist.genre }}</td>
            </tr>
          </table>
        </div>
        <div class="col-12 flex justify-center mt-4">
          <button onclick="window.history.back()" class="btn btn-primary bg-green-700 text-white py-2 px-4 rounded shadow-lg hover:bg-green-800">Back</button>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import { ref } from 'vue';
import MyLayout from '@/Layouts/MyLayout.vue'; 

export default {
  layout: MyLayout, 
  props: {
    playlist: Object
  },
  setup(props) {
    return {};
  }
}
</script>



<style scoped>
.container {
  background: linear-gradient(45deg, #6000DD, #7000AA);
  max-width: 100%;
}

.card {
  background: linear-gradient(145deg, #e6e6e6, #ffffff);
  box-shadow: 10px 10px 20px #cbcbcb, -10px -10px 20px #ffffff;
}

.card-header {
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

.card-body {
  box-shadow: inset 5px 5px 10px #cbcbcb, inset -5px -5px 10px #ffffff;
}

input[type="text"], select {
  background: linear-gradient(145deg, #f0f0f0, #ffffff);
  box-shadow: inset 5px 5px 10px #cbcbcb, inset -5px -5px 10px #ffffff;
}

button {
  transition: transform 0.2s;
}

button:hover {
  transform: translateY(-2px);
}
</style>
