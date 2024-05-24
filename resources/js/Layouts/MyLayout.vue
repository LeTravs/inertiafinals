<script setup>
import { Link } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
</script>

<template>
    <div class="flex">
        <div class="navbar w-[250px] bg-gradient-to-r from-indigo-600 to-purple-700 text-white shadow-lg">
            <img src="https://i.pinimg.com/originals/64/53/24/645324641a0555cc55cea87787fc0bcb.gif" alt="Profile Image" class="profile-img">
            <nav class="item-center mt-6">
                <h1 class="text-center text-3xl mb-4">AvaLan</h1>
                <Link href="/home" class="nav-link">Home</Link>
                <Link href="/songs" class="nav-link">Song List</Link>
                <Link href="/playlist" class="nav-link">Playlist</Link>
                <img src="https://i.redd.it/znmusigf9dga1.gif" alt="gif Image" class="gif-img" style="margin-top: 50px;">
                <p class="text-center text-sm mt-4">
    Your ultimate music companion. AvaLan: Explore, organize, and enjoy your favorite tunes like never before. With intuitive controls and stunning visuals, let the music take center stage.
            </p>
            </nav>
        </div>
        <div class="content flex-grow">
            <div class="min-h-screen bg-gray-100">
    <nav class="bg-gradient-to-r from-indigo-600 to-purple-700 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 ">
                <div class="flex items-center">
                    <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        <img src="https://cdn.dribbble.com/users/1242979/screenshots/7099165/media/e521bd143bf1e795af3ec725a68e273f.gif" alt="Profile Image" class="circular-image" width="60px" height="60px"/>
                    </NavLink>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="ml-3 relative">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ $page.props.auth.user.name }}
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>
                            <template #content>
                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ hidden: showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ hidden: !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </ResponsiveNavLink>
            </div>
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">
                        {{ $page.props.auth.user.name }}
                    </div>
                    <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                        Log Out
                    </ResponsiveNavLink>
                </div>
            </div>
        </div>
    </nav>
    <header class="bg-white shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <slot name="header" />
        </div>
    </header>
    <main>
        <Transition name="page-trans" mode="out-in">
            <slot />
        </Transition>
    </main>
</div>

        </div>
    </div>
</template>

<style scoped>
.circular-image {
    border-radius: 50%;
    width: 60px;
    height: 60px;
    border: 2px solid #4B5563;
}

.profile-img {
    margin-top: 15px;
    height: 100px;
    width: 100px;
    border-radius: 50%;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
    border: 2px solid #6366F1; /* Indigo-500 */
}
.profile-img:hover {
    transform: scale(1.05);
}
.nav-link {
    display: block;
    background: linear-gradient(145deg, #4F46E5, #6D28D9); 
    color: #ffffff;
    text-align: center;
    padding: 10px 20px;
    margin: 10px auto;
    border-radius: 10px;
    width: 180px;
    transition: background 0.3s, transform 0.3s;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Add shadow */
}
.nav-link:hover {
    background: linear-gradient(145deg, #6D28D9, #4F46E5); /* Purple-700 to Indigo-600 */
    transform: translateY(-3px);
}
h1 {
    text-shadow: 0 0 5px #000, 0 0 10px #000, 0 0 15px #000;
    color: #E0E7FF; /* Indigo-100 */
    font-size: 2.5rem;
    font-weight: bold;
}
.navbar {
  width: 250px;
  background: linear-gradient(to right, #4F46E5, #6D28D9);
  color: #ffffff;
  box-shadow: 5px 0 15px rgba(0, 0, 0, 0.3); /* 3D shadow effect */
  position: fixed;
  left: 0;
  top: 0;
  bottom: 0;
  overflow-y: auto;
  border-right: 2px solid rgba(255, 255, 255, 0.1); /* Border for a more realistic look */
}
.navbar nav {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: auto; /* Push content to the top */
}
.navbar p {
    position: absolute;
    bottom: 0;
    width: 100%; 
    text-align: center; 
    margin-bottom: 20px; 
}
.navbar a {
    text-decoration: none;
    color: inherit;
}

/* Content Styles */
.content {
    flex-grow: 1;
    padding-left: 250px; 
    transition: padding-left 0.3s ease; /* Smooth transition for content when sidebar expands/collapses */
}

.max-w-7xl {
  padding-left: 0;
  padding-right: 0;
}
</style>
