<template>
  <div id="app" class="wrapper">
    <header class="main-header">
      <div class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
          <b>TCS</b>
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
          <b>TCS</b>
        </span>
      </div>
      <nav class="navbar navbar-static-top"></nav>
    </header>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <GetMenu></GetMenu>
      <router-view></router-view>
    </div>
    <Vfooter></Vfooter>
  </div>
</template>

<script>
import GetMenu from "./components/GetMenu.vue";
import Vfooter from "./components/shared/Vfooter.vue";
export default {
  name: "App",
  components: {
    GetMenu,
    Vfooter
  }
};
</script>

<style>
</style>