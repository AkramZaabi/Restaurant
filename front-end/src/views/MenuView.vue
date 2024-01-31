<template>


<MenuComponent/>

</template>

<script>

import MenuComponent from '@/components/MenuComponent.vue';
export default {

  components: { MenuComponent },
  methods: {
    checkexist() {
      const doc = document.querySelector("button");
      console.log(doc);
    },
  },
};
</script>

<style>
#nav-menu {
  color: #ff7400;
}
.activ {
  color: #ff7400 !important;
  font-weight: 30px !important; /* Change this to the desired color */
}
body {
  background-color: #f9f0e4;
}
</style>
