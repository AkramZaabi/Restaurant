<template>
  <div class="home"></div>
  <homeComponent />
</template>

<script>
// @ is an alias to /src

import homeComponent from "@/components/HomeComponent.vue";
export default {
  name: "HomeView",
  components: { homeComponent },
};
</script>

<style>
.activ {
  color: #ff7400 !important;
  font-weight: 30px !important; /* Change this to the desired color */
}
</style>
