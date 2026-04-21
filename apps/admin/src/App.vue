<template>
  <div id="admin">
    <AdminSidebar />
    <div class="admin-content">
      <AdminHeader />
      <main class="admin-main">
        <router-view />
      </main>
    </div>
  </div>
</template>

<script setup lang="ts">
import AdminSidebar from './components/layout/AdminSidebar.vue'
import AdminHeader from './components/layout/AdminHeader.vue'
</script>

<style scoped>
#admin {
  display: flex;
  min-height: 100vh;
}

.admin-content {
  flex: 1;
  display: flex;
  flex-direction: column;
}

.admin-main {
  flex: 1;
  padding: 20px;
  background-color: #f5f5f5;
}
</style>