<template>
    <div>
        <Head title="Profile" />
        
        <MyLayout> 
            <main class="container">
                <div class="profile-details">
                    <div class="profile-card">
                        <div class="profile-picture">
                            <img src="https://www.icegif.com/wp-content/uploads/2024/01/icegif-110.gif" alt="Profile Picture">
                        </div>
                        <div class="user-info">
                            <h2>{{ $page.props.auth.user.name }}</h2>
                            <p>{{ $page.props.auth.user.email }}</p>
                        </div>
                    </div>
                </div>
                <section class="card-section">
                    <div class="card" v-for="(card, index) in 5" :key="index">
                        <div class="card-content">
                            <img :src="cardImages[index]" alt="Card Image">
                            <h3>{{ cardNames[index] }}</h3> 
                        </div>
                    </div>
                </section>
                <div class="music-player-message">
            <p>Enjoying the vibes? Check out our music player for more tunes!</p>
        </div>
            </main>
        </MyLayout>
    </div>
</template>

<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head } from '@inertiajs/vue3';

const cardImages = [
    "https://i.ytimg.com/vi/wQfgzKtajvw/maxresdefault.jpg",
    "https://i.ytimg.com/vi/U07XbTfHylQ/maxresdefault.jpg",
    "https://i.ytimg.com/vi/AdvRp-A0Trk/maxresdefault.jpg",
    "https://i.ytimg.com/vi/gmFVJAZsOAc/maxresdefault.jpg",
    "https://i.ytimg.com/vi/f3JROX9glZM/maxresdefault.jpg"
];

const cardNames = [
    "Bruno Mars",
    "Ariana Grande",
    "Maroon 5",
    "Ed Sheeran",
    "Lukas Graham"
];
</script>


<style scoped>
.container {
    background: linear-gradient(45deg, #6000DD, #7000AA);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4), 0 6px 20px rgba(0, 0, 0, 0.3);
    padding: 20px;
    max-width: 100%;
    height: 668px; 
}

.card-section {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    margin-top: 80px;
}

.card {
    width: 200px;
    height: 150px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 0 10px;
}

.card-content {
    padding: 20px;
    text-align: center; /* Center the content horizontally */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.card h3 {
    margin-bottom: 10px;
    font-size: 18px;
    color: #333;
    text-align: center; /* Center the text horizontally */
}

.card p {
    margin: 0;
    font-size: 14px;
    color: #666;
}

.profile-details {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
}

.profile-card {
    width: 300px;
    height: 200px;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    perspective: 1000px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.profile-picture {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    position: absolute;
    bottom: 1px;
    left: 50%;
    transform: translateX(-50%);
}

.profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-info {
    margin-bottom: 100px;
    padding: 20px;
    transform-style: preserve-3d;
    transition: transform 0.5s;
    text-align: center;
}

.user-info h2 {
    margin-bottom: 10px;
    font-size: 20px;
    color: #333;
}

.user-info p {
    margin: 0;
    font-size: 16px;
    color: #666;
}

.profile-card:hover .user-info {
    transform: rotateX(360deg);
}

.music-player-message {
    text-align: center;
    margin-top: 100px;

}

.music-player-message p {
    font-size: 35px;
    color: #000000;
}



</style>
