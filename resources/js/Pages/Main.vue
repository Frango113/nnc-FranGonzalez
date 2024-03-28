<script setup>
import { Head, Link } from '@inertiajs/vue3';
import UsersList from '@/Components/UsersList.vue';
</script>
<template>

  <Head title="Welcome" />

  <div class="flex justify-center items-center h-screen bg-gray-900 text-white">
    <div class="container text-center">
      <h1 class="text-3xl font-bold mb-4">Bienvenido</h1>
      <div class="content">
        <p>Aquí se encuentra una lista de usuarios</p>
        <UsersList/>
        <p>En el Dashboard se encuentra el formulario para agregar usuarios</p>
      </div>

      <div v-if="canLogin" class="mt-8">
        <template v-if="$page.props.auth.user">
          <Link
            :href="route('dashboard')"
            class="font-semibold text-gray-200 hover:text-gray-400 focus:outline-none focus:ring focus:ring-gray-500"
            >Dashboard</Link
          >
        </template>

        <template v-else>
          <Link
            :href="route('login')"
            class="font-semibold text-gray-200 hover:text-gray-400 focus:outline-none focus:ring focus:ring-gray-500"
            >Log in</Link
          >

          <Link
            v-if="canRegister"
            :href="route('register')"
            class="ml-4 font-semibold text-gray-200 hover:text-gray-400 focus:outline-none focus:ring focus:ring-gray-500"
            >Register</Link
          >
        </template>
      </div>
    </div>
  </div>
</template>

