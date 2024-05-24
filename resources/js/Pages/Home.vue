<template>
  <div class="music-player">
    <div class="middle-section">
      <img src="https://contents.pep.ph/images2/images2/2023/04/29/bruno-mars-1682752363.jpg" alt="Music Player Image" />
      <div class="image-text">
        You can have easy access to every <span class="highlight">Listen Now</span> button. You can also <span class="highlight">follow him</span> too for supporting.
      </div>
      <div class="button-group">
        <button class="listen-now" onclick="redirectToSong()">Listen Now</button>
        <button class="follow" onclick="redirectToPage()">Follow</button>
      </div>
    </div>
    <div class="bottom-section">
      <h2>Trending</h2>
      <div class="video-grid">
        <iframe width="350" height="250" src="https://www.youtube.com/embed/FCAcb6Yd8uY" title="[Playlist] vibe songs that i sure 100% feel good" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe width="350" height="250" src="https://www.youtube.com/embed/CL3lKzIpOv4" title="Shawn Mendes, The Weeknd, Bruno Mars, Dua Lipa, Adele, Maroon 5, Ed Sheeran - Popular Songs 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe width="350" height="250" src="https://www.youtube.com/embed/B5NxL8iniaI" title="Most Old Beautiful Love Songs 70s 80s 90s 💌 Love Songs Rmatic Ever💌  Oldies But Goodies" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import MyLayout from '@/Layouts/MyLayout.vue';
import axios from 'axios';

defineOptions({
  layout: MyLayout
});

const songs = ref([]);

const fetchSongs = async () => {
  try {
    const response = await axios.get('/songs');
    songs.value = response.data;
  } catch (error) {
    console.error('Error fetching songs:', error);
  }
};

onMounted(() => {
  fetchSongs();
});


</script>

<style scoped>
.music-player {
  max-width: 100%;
  margin: 0 auto;
  padding: 20px;
  box-sizing: border-box;
  font-family: Arial, sans-serif;
  background: linear-gradient(45deg, #6000DD, #7000AA);
  box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3);
  max-height: 100%;
}

.middle-section {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  margin-bottom: 20px;
}

.middle-section img {
  width: 50%;
  max-width: 500px;
  height: auto;
  border-radius: 10px;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
}

.image-text {
  color: #ebdfdf;
  font-size: 15px;
  font-weight: bold;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  margin-top: 10px;
}

.image-text .highlight {
  color: blue;
}

.button-group {
  margin-top: 20px;
}

.listen-now, .follow {
  padding: 10px 20px;
  margin: 5px;
  background-color: transparent;
  color: #fff;
  border: 2px solid;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.listen-now {
  border-color: #007bff;
}

.follow {
  border-color: #0ce00c;
}

.listen-now:hover {
  background-color: #0056b3;
}

.follow:hover {
  background-color: #0ce00c;
}

.bottom-section {
  text-align: center;
}

h2 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.video-grid {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
}

iframe {
  border: none;
  border-radius: 10px;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
}

</style>
