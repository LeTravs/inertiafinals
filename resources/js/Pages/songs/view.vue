<template>
  <div class="container mx-auto flex justify-center items-center h-screen">
    <div class="card border border-gray-300 rounded-lg bg-gray-200 shadow-2xl">
      <h1 class="card-header text-2xl text-primary font-weight-bold">Song Profile</h1>
      <div class="card-body">
        <div v-if="showEdit">
          <form @submit.prevent="submit">
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" id="title" class="form-control" v-model="form.title">
            </div>
            <div class="mb-3">
              <label for="artist" class="form-label">Artist</label>
              <input type="text" id="artist" class="form-control" v-model="form.artist">
            </div>
            <div class="mb-3">
              <label for="image_url" class="form-label">Image URL</label>
              <input type="text" id="image_url" class="form-control" v-model="form.image_url">
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded ms-2 mb-3">Save</button>
          </form>
        </div>
        <div class="row" v-else>
          <table class="col-md-6">
            <tr>
              <th>Image:</th>
              <td>
                <img :src="song.image_url" alt="Song Image" class="w-64 h-auto">
              </td>
            </tr>
            <tr><th>Title:</th><td>{{ song.title }}</td></tr>
            <tr><th>Artist:</th><td>{{ song.artist }}</td></tr>
          </table>
        </div>
        <div class="col-12 flex justify-center">
          <button onclick="window.history.back()" class="btn btn-primary bg-green-700">Back</button>
          <button class="px-4 py-2 bg-blue-700 text-white rounded ms-2" @click="toggleEdit">{{ showEdit ? 'Cancel' : 'Edit' }}</button>
          <button class="px-4 py-2 bg-red-700 text-white rounded ms-2" @click="delSong">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import MyLayout from '@/Layouts/MyLayout.vue';

export default {
  layout: MyLayout,
  props: {
    song: Object
  },
  setup(props) {
    const showEdit = ref(false);

    const form = useForm({
      title: props.song.title,
      artist: props.song.artist,
      image_url: props.song.image_url,
    });

    const submit = async () => {
      await form.put(`/songs/${props.song.id}`);
    };

    const toggleEdit = () => {
      showEdit.value = !showEdit.value;
    };

    const delSong = () => {
      const del = confirm('Are you sure you want to delete this song?');
      if (del) {
        form.submit('delete', `/songs/${props.song.id}`);
      }
    };

    return { showEdit, form, submit, toggleEdit, delSong };
  }
}
</script>

<style scoped>
.container {
  max-width: 100%;
  max-height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(45deg, #6000DD, #7000AA);
  color: rgb(14, 12, 12); /* White text */
}

.card {
  width: 80%;
  max-width: 600px;
  padding: 20px;
  background: linear-gradient(145deg, #f3f4f6, #d1d5db);
  border-radius: 20px;
  box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.1);
}

.card-header {
  background-color: #4a5568;
  color: white;
  padding: 10px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.card-body {
  padding: 20px;
}

.form-label {
  font-weight: bold;
}

.form-control {
  width: 100%;
  padding: 10px;
  border: 1px solid #a0aec0;
  border-radius: 10px;
}

.btn {
  cursor: pointer;
  padding: 10px 20px;
  border: none;
  border-radius: 10px;
  transition: background-color 0.3s;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.btn:hover {
  filter: brightness(90%);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.bg-blue-600 {
  background-color: #3182ce;
}

.bg-green-700 {
  background-color: #2f855a;
}

.bg-red-700 {
  background-color: #c53030;
}

.text-primary {
  color: #3182ce;
}

.text-white {
  color: white;
}

.text-2xl {
  font-size: 1.5rem;
}

.rounded {
  border-radius: 0.25rem;
}

.table {
  width: 100%;
}

.table th,
.table td {
  padding: 10px;
  border-bottom: 1px solid #cbd5e0;
}

.table th {
  text-align: left;
}
</style>
