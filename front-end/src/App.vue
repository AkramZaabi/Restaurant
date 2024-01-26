<template>
  <nav>
    <div class="container">
      <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom"
      >
        <a
          href="/"
          class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none justify-content-center"
        >
          <img :src="require(`./assets/logo.png`)" id="logo" class="me-2" />
          <span id="logo-titre">FCfooDie</span>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li class="me-3">
            <router-link
              to="/"
              class="nav-link px-2 activ"
              @click="changeclass('nav-link-1')"
              id="nav-link-1"
              >Home</router-link
            >
          </li>
          <li class="me-3">
            <a
              href="#"
              class="nav-link px-2 link-dark"
              id="nav-link-2"
              @click="changeclass('nav-link-2')"
              >Contact</a
            >
          </li>
          <li class="me-3">
            <a
              href="#"
              class="nav-link px-2 link-dark"
              id="nav-link-3"
              @click="changeclass('nav-link-3')"
              >About</a
            >
          </li>
          <li class="me-3">
            <router-link
              to="/Menu"
              class="nav-link px-2 link-dark"
              id="nav-link-4"
              @click="changeclass('nav-link-4')"
              >Menu</router-link
            >
          </li>
          <li class="me-3">
            <a
              href="#"
              class="nav-link px-2 link-dark"
              id="nav-link-5"
              @click="changeclass('nav-link-5')"
              >Reservation</a
            >
          </li>
        </ul>

        <div class="col-md-3 text-end">
          <img :src="require(`./assets/cart-icon.png`)" id="cart" />
          <button
            type="button"
            class="btn ms-3"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
          >
            Log in
          </button>
        </div>
      </header>
    </div>
  </nav>
  <router-view />
</template>

<script>
export default {
  methods: {
    changeclass(id) {
      const doc = document.getElementById(id);
      doc.classList.add("activ");
      console.log(doc.className);
    },
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
  font-weight: bold;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
  font-family: "Mona Sans";
}

nav a.router-link-exact-active {
  color: #42b983;
}
#logo {
  width: 50px;
  height: 50px;
}
#logo-titre {
  font-family: "Monotype Corsiva";
  font-size: large;
}
#cart {
  width: 30px;
  height: 30px;
}
.btn {
  background-color: #fabd62 !important;
  border: 0 0 0 0 !important;
  font-weight: bold !important;
  width: 100px;
  color: #473828 !important;
}
</style>
