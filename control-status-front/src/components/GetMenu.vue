<template>
  <div>
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li v-for="route in routes">
            <router-link :to="route.path ? route.path : '/'" v-if="route.menu">
              <i :class="route.icon"></i>
              <span>{{route.title}}</span>
            </router-link>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
  </div>
</template>
<script>
import { routes } from "../router/index.js";

export default {
  name: "GetMenu",
  data() {
    return { routes };
  }
};
</script>
