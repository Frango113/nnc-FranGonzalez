<template>
  <div class="bg-gray-800 shadow-md rounded px-4 py-4 mb-4 user-list text-white">
    <h2 class="text-xl font-semibold mb-4">Lista de Usuarios</h2>
    <ul>
      <li v-for="user in users" :key="user.id" class="border-b border-gray-700 py-3">
        <div class="flex justify-between items-center">
          <div class="flex flex-col">
            <span class="text-white">{{ user.name }}</span>
            <span class="text-gray-400">{{ user.role }}</span>
            <span class="text-gray-600">{{ user.email }}</span>
          </div>
        </div>
      </li>
    </ul>
    <!-- Added button to return to main page -->
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      users: []
    };
  },
  mounted() {
    this.fetchUsers(); // Fetch users when the component is mounted
  },
  methods: {
    fetchUsers() {
      axios.get('/users') // Make a GET request to the /users endpoint
        .then(response => {
          this.users = response.data; // Set the users data received from the API response
        })
        .catch(error => {
          console.error('Error fetching users:', error);
        });
    }
  }
};
</script>