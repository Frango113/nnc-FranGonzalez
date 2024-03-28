<template>
  <div class="bg-gray-900 text-white p-6 rounded-lg">
    <form @submit.prevent="registerUser" id="user-registration-form">
      <div class="mb-4">
        <label for="name" class="block mb-2">Name:</label>
        <input type="text" v-model="formData.name" id="name" required class="w-full px-3 py-2 rounded-md bg-gray-800 text-white">
      </div>
      <div class="mb-4">
        <label for="email" class="block mb-2">Email:</label>
        <input type="email" v-model="formData.email" id="email" required class="w-full px-3 py-2 rounded-md bg-gray-800 text-white">
      </div>
      <div class="mb-4">
        <label for="password" class="block mb-2">Password:</label>
        <input type="password" v-model="formData.password" id="password" required class="w-full px-3 py-2 rounded-md bg-gray-800 text-white">
      </div>
      <div class="mb-4">
        <label for="role" class="block mb-2">Role:</label>
        <select v-model="formData.role" id="role" required class="w-full px-3 py-2 rounded-md bg-gray-800 text-white">
          <option value="super_admin">Super Admin</option>
          <option value="employee">Employee</option>
        </select>
      </div>
      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Submit</button>
      <div v-if="successMessage" id="success-message" class="mt-4 bg-green-500 p-3 rounded">Registration Successful!</div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formData: {
        name: '',
        email: '',
        password: '',
        role: 'user'
      },
      successMessage: ''
    };
  },
  methods: {
    async registerUser() {
      try {
        // Assuming you have an API endpoint for user registration
        const response = await axios.post('/register', this.formData); // Adjust the endpoint accordingly
        if (response.status === 200) {
          this.successMessage = 'Registration Successful!';
        }
      } catch (error) {
        console.error('Error occurred while registering user:', error);
      }
    }
  }
};
</script>