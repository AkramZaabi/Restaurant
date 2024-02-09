<template>
  <nav>
    <div class="container">
      <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/"
          class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none justify-content-center">
          <img :src="require(`./assets/logo.png`)" id="logo" class="me-2" />
          <span id="logo-titre">FCfooDie</span>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li class="me-3">
            <router-link to="/" class="nav-link px-2 activ" @click="changeclass('nav-link-1')"
              id="nav-link-1">Home</router-link>
          </li>
          <li class="me-3">
            <a href="#" class="nav-link px-2 link-dark" id="nav-link-2" @click="changeclass('nav-link-2')">Contact</a>
          </li>
          <li class="me-3">
            <a href="#" class="nav-link px-2 link-dark" id="nav-link-3" @click="changeclass('nav-link-3')">About</a>
          </li>
          <li class="me-3">
            <router-link to="/Menu" class="nav-link px-2 link-dark" id="nav-link-4"
              @click="changeclass('nav-link-4')">Menu</router-link>
          </li>
          <li class="me-3">
            <a href="#" class="nav-link px-2 link-dark" id="nav-link-5" @click="changeclass('nav-link-5')">Reservation</a>
          </li>
          <li class="me-3" v-if="role==3">
            <router-link to="/Dashboard"  class="nav-link px-2 link-dark" id="nav-link-5" @click="changeclass('nav-link-5')">Dashboard</router-link>
          </li>
          <li class="me-3" v-if="role==1 || role == 2 ">
            <router-link to="/Profile" class="nav-link px-2 link-dark" id="nav-link-5" @click="changeclass('nav-link-5')">Profile</router-link>
          </li>
        </ul>

        <div class="col-md-3 text-end">
          <router-link  v-if="role" to="/Cart"
            > <img :src="require(`./assets/cart-icon.png`)" id="cart" class="me-3" /></router-link>
          <button v-if="!user" type="button" class="btn ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Log in
          </button>
          <div class="action ms-4 " v-else>
        
           <img :src="'http://localhost:8000'+user.photo"  id="profile_picture"  @click="menuToggle"  class="mt-3 ms-2"/>
 
           
        
          <div class="menu">
        <h3>{{user.name+" "+user.lastName}}<br /><span>Client</span></h3>
        <ul>
          <li>
            <img :src="require('../src/assets/client-icon.png')" class="me-2" /><a href="#">My profile</a>
          </li>
          <li>
            <img :src="require('../src/assets/edit.png')"  class="me-2"/><a href="#">Edit profile</a>
          </li>
          <li>
            <img :src="require('../src/assets/message.png')" class="me-2" /><a href="#">Inbox</a>
          </li>
          <li>
            <img :src="require('../src/assets/client-icon.png')" class="me-2" /><a href="#">Setting</a>
          </li>
          <li><img :src="require('../src/assets/icons8-heart-50.png')"  class="me-2"/><a href="#">Favoris</a></li>
          <li>
            <img :src="require('../src/assets/logout.png')"  class="me-2"/><a href="#" @click="store.logout()">Logout</a>
          </li>
        </ul>
      </div>
    </div>

        </div>
      </header>
    </div>
  </nav>
  <router-view />
</template>

<script>
import { AuthStore } from "@/store/auth.js"
export default {
   setup() {
    const store = AuthStore();
    return { store }
  },
  data()
  {
    return {

    }
  },
  computed: {
    user() {

      let x = localStorage.getItem("user")
        ? JSON.parse(localStorage.getItem("user"))
        : "";
        console.log(x);
      return x;
    },
    role()
    {
      let x = localStorage.getItem("role")
        ? JSON.parse(localStorage.getItem("role"))
        : "";
        console.log(x);
        return x.role_number;
    }
  },
  methods: {
    changeclass(id) {
      const doc = document.getElementById(id);
      doc.classList.add("activ");
      console.log(doc.className);
    },
    menuToggle() {
        const toggleMenu = document.querySelector(".menu");
        toggleMenu.classList.toggle("active");
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
#profile_picture{
  width: 60px;
  height:60px;
  border-radius: 50%;
  cursor: pointer;
  border:1px solid black;
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

#profile{
  width: 120px;
}


.action {
  position: fixed;
  top: 20px;
  right: 30px;
}

.action .profile {
  position: relative;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}

.action .profile img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.action .menu {
  position: absolute;
  top: 120px;
  right: -10px;
  padding: 10px 20px;
  background: #fff;
  width: 200px;
  box-sizing: 0 5px 25px rgba(0, 0, 0, 0.1);
  border-radius: 15px;
  transition: 0.5s;
  visibility: hidden;
  opacity: 0;
}

.action .menu.active {
  top: 80px;
  visibility: visible;
  opacity: 1;
}

.action .menu::before {
  content: "";
  position: absolute;
  top: -5px;
  right: 28px;
  width: 20px;
  height: 20px;
  background: #fff;
  transform: rotate(45deg);
}

.action .menu h3 {
  width: 100%;
  text-align: center;
  font-size: 18px;
  padding: 20px 0;
  font-weight: 500;
  color: #555;
  line-height: 1.5em;
}

.action .menu h3 span {
  font-size: 14px;
  color: #cecece;
  font-weight: 300;
}

.action .menu ul li {
  list-style: none;
  padding: 16px 0;
  border-top: 1px solid rgba(0, 0, 0, 0.05);
  display: flex;
  align-items: center;
}

.action .menu ul li img {
  max-width: 20px;
  margin-right: 10px;
  opacity: 0.5;
  transition: 0.5s;
}

.action .menu ul li:hover img {
  opacity: 1;
}

.action .menu ul li a {
  display: inline-block;
  text-decoration: none;
  color: #555;
  font-weight: 500;
  transition: 0.5s;
}

.action .menu ul li:hover a {
  color: #ff5d94;
}

</style>
