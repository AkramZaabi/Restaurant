<template>
  <section class="row gy-5 mt-5">
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form class="modal-body d-flex align-items-center" id="form-login">
            <h1
              class="modal-title fs-5"
              style="color: #fabd62"
              id="exampleModalLabel"
            >
              Welcome to<span id="login-span"> FCfooDie </span>
            </h1>
            <img :src="require('../assets/logo.png')" id="logo" class="mb-3" />
            <div class="input-icons">
              <img
                :src="require('../assets/client-icon.png')"
                id="icon-input"
                class="mt-3 ms-4"
              />
              <input
                class="input-field shadow"
                type="text"
                placeholder="Enter your mail..."
              />
            </div>
            <div class="input-icons">
              <img
                :src="require('../assets/icons8-password-30.png')"
                id="icon-input"
                class="mt-3 ms-4"
              />
              <input
                class="input-field shadow"
                type="text"
                placeholder="Enter your  password.."
              />
            </div>
            <button type="button" class="btn btn-primary" id="login">
              LOGIN
            </button>
            <div>
              <span>
                Don't have an account ?
                <span
                  data-bs-dismiss="modal"
                  aria-label="Close"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal2"
                  >SIGN-UP</span
                >
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="exampleModal2"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              @click="reload"
            ></button>
          </div>
          <form class="modal-body d-flex align-items-center" id="form-login">
            <h1
              class="modal-title fs-5"
              style="color: #fabd62"
              id="exampleModalLabel"
            >
              Welcome to<span id="login-span"> FCfooDie2 </span>
            </h1>
            <img :src="require('../assets/logo.png')" id="logo" />
            <div class="input-icons">
              <img
                :src="require('../assets/client-icon.png')"
                id="icon-input"
                class="mt-3 ms-4"
              />
              <input
                class="input-field shadow"
                type="text"
                placeholder="Enter your First Name..."
              />
            </div>
            <div class="input-icons">
              <img
                :src="require('../assets/client-icon.png')"
                id="icon-input"
                class="mt-3 ms-4"
              />
              <input
                class="input-field shadow"
                type="text"
                placeholder="Enter your  Last Name.."
              />
            </div>
            <div class="input-icons">
              <img
                :src="require('../assets/orange-calendar.png')"
                id="icon-input"
                class="mt-3 ms-4 icons-update"
              />
              <input
                class="input-field shadow"
                type="date"
                placeholder="Enter your  Birth Date.."
              />
            </div>
            <div class="input-icons">
              <img
                :src="require('../assets/icons8-phone-50.png')"
                id="icon-input"
                class="mt-3 ms-4 icons-update"
              />
              <input
                class="input-field shadow"
                type="number"
                placeholder="Enter your  telephone number.."
              />
            </div>
            <div class="input-icons">
              <img
                :src="require('../assets/icons8-home-30.png')"
                id="icon-input"
                class="mt-3 ms-4"
              />
              <input
                class="input-field shadow"
                type="text"
                placeholder="Enter your  addresse.."
              />
            </div>
            <div class="input-icons">
              <img
                :src="require('../assets/client-icon.png')"
                id="icon-input"
                class="mt-3 ms-4"
              />
              <input
                class="input-field shadow"
                type="text"
                placeholder="Enter your  e-mail.."
              />
            </div>
            <button type="button" class="btn btn-primary" id="login">
              SIGNUP
            </button>
          </form>
        </div>
      </div>
    </div>
    <div class="container-1 container col-2">
      <div class="landing-1 container mt-5">
        <h1>Food you will Love to <span style="color: #ff9900">Eat</span></h1>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate
          sunt doloribus corporis blanditiis similique expedita error delectus
        </p>
        <button class="btn">Order Now</button>
      </div>
      <div class="landing-2">
        <img :src="require('../assets/img-home.jpg')" id="img-home" />
      </div>
    </div>
    <div class="container-1-2 container col-2 mt-5">
      <div class="landing-2">
        <img :src="require('../assets/chef-w.png')" id="img-chef-w" />
      </div>
      <div class="landing-1-2 mt-5">
        <h1>
          Welcome to <span style="color: #ff9900">FCFooDie</span> Restaurant
        </h1>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate
          sunt doloribus corporis
        </p>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate
          sunt doloribus corporis
        </p>
        <button class="btn">Order Now</button>
      </div>
    </div>
    <div id="title-pop">
      <h1>Our Popular Dishes</h1>
      <span>Eat Smart for a healthy heart</span>
    </div>

    <div class="container food">
      <div class="img-food">
        <img :src="require('../assets/pizza.png')" />
        <span class="mt-3">Italian Pizza</span>
        <img :src="require('../assets/5-stars.png')" class="stars" />
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae,
          aperiam! Deleniti numquam dignissimos repellendus, obcaecati eligendi
        </p>
        <span class="explore"
          >Explore more <img :src="require('../assets/icon-explore.png')"
        /></span>
      </div>
      <div class="img-food">
        <img :src="require('../assets/steak.png')" />
        <span class="mt-3">steak set</span>
        <img :src="require('../assets/5-stars.png')" class="stars" />
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae,
          aperiam! Deleniti numquam dignissimos repellendus, obcaecati eligendi
        </p>
        <span class="explore"
          >Explore more <img :src="require('../assets/icon-explore.png')"
        /></span>
      </div>
      <div class="img-food">
        <img :src="require('../assets/salad.png')" />
        <span class="mt-3">Salad</span>
        <img :src="require('../assets/5-stars.png')" class="stars" />
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae,
          aperiam! Deleniti numquam dignissimos repellendus, obcaecati eligendi
        </p>
        <span class="explore"
          >Explore more <img :src="require('../assets/icon-explore.png')"
        /></span>
      </div>
    </div>
    <div
      class="container-fluid"
      id="bg"
      v-bind:style="{
        background: 'rgba(0, 0, 0, 0.2)',
        'background-image':
          'url(' + require('../assets/restaurant-vue.jpg') + ')',
        'background-size': '100% 100%',
        'background-position': 'center',
        'background-repeat': 'no-repeat',
      }"
    >
      <div class="container-1-3 container col-2 mt-5 lower-home">
        <div class="landing-2">
          <img :src="require('../assets/seafood.jpg')" id="seafood" />
        </div>
        <div class="landing-1-2">
          <h1>
            Do you have any Dinner Plan tonight Plan to eat
            <span style="color: #ff9900">Sea food !</span>
          </h1>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate
            sunt doloribus corporis
          </p>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate
            sunt doloribus corporis
          </p>
          <button class="btn">Order Now</button>
        </div>
      </div>
    </div>
    <div class="container-1 container col-2 mt-5">
      <div class="landing-1 container mt-5">
        <h1>
          The best

          <span style="color: #ff9900">FCFooDie</span>Chefs!
        </h1>
        <p>
          Well-experienced chefs ready to embark an amazing Journey filled with
          passion in order to satisfy our clients !.
        </p>
        <p>Welcome again you can find our Menu right below !</p>
        <button class="btn">Order Now</button>
      </div>
      <div class="landing-2 mt-2">
        <img :src="require('../assets/chef.png')" id="chef-m" />
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "HelloWorld",
  props: {
    msg: String,
  },
  methods: {
    reload() {
      location.reload();
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
section {
  display: flex;
  align-items: start !important;
  gap: 50px;
}

.container-1 {
  display: flex;
  width: 80%;
  margin-bottom: 30px;
}

.container-1-2 {
  justify-content: space-around;
  display: flex;
  width: 80%;
  margin-bottom: 40px;
}

.food {
  width: 80%;
  display: flex;
  justify-content: center;
}

.landing-2 {
  width: 40%;
  display: flex;
  justify-content: center;
  align-content: center;
}

p {
  color: #707070;
  font-weight: bold;
}

.landing-1 {
  align-content: left;
  justify-content: left;
  text-align: left;
  width: 40%;
}

.landing-1-2 {
  align-content: left;
  justify-self: center;
  text-align: left;
  width: 40%;
}

.landing-1-2 h1 {
  width: 100%;
}

.stars {
  width: 40% !important;
  height: 10% !important;
}

.landing-1-2 p {
  width: 80%;
}

.landing-1 p {
  width: 70%;
}

.landing-1 h1 {
  font-weight: bold;
  width: 60%;
}

.landing-1-2 h1 {
  width: 100%;
  font-weight: bold;
}

.landing-1-2 h1 span {
  font-family: "Monotype Corsiva";
  font-weight: 100;
}

.explore img {
  width: 30px !important;
  height: 20px;
}

.explore {
  font-size: 15px !important;
  color: #fabd62;
}

#img-home {
  width: 80%;
  height: 100%;
  border: 6px solid #ff9900;
  border-radius: 50%;
}

#title-pop {
  text-align: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
  font-family: "Poppins";
  font-weight: bold;
}

#title-pop span {
  width: 100%;
  font-size: 15px;
  text-align: center;
}

.img-food {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.img-food span {
  font-weight: bold;
  font-size: 30px;
}

.img-food p {
  width: 80%;
  text-align: center;
}

.img-food img {
  width: 80%;
  height: 60%;
}

.btn {
  width: 120px;
  height: 40px;
}

h3 {
  margin: 40px 0 0;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}

#img-chef-w {
  display: flex;
  justify-self: right;
  width: 100%;
  margin-left: 100px;
}

#seafood {
  border: 5px solid #ff9900;
  width: 100%;
  height: 80%;
}

.lower-home {
  width: 100%;
}

.container-1-3 {
  display: flex;
  justify-content: center;
  gap: 100px;
}

.container-1-3 h1 {
  color: lightgrey;
}
#icon-input {
  position: absolute;
}
#icon-input img {
  height: 10px;
  width: 10px;
}
.input-field {
  border-radius: 35px;
  border: 0;
  height: 60px;
  width: 350px;
  padding-left: 60px;
  transition: border-color 0.3s; /* Add transition for a smooth effect */
}

.input-field:focus {
  border: 1;
  border-color: orange; /* Change the border color when focused */
}

.container-1-3 p {
  color: lightgrey;
}

#chef-m {
  width: 100%;
  height: 100%;
  border-radius: 7%;
  border: 3px solid #fabd62;
}

#exampleModal #login {
  height: 50px;
  width: 150px;
  font-size: smaller;
}

.modal-content {
  background-color: #f9f0e4;
}

.modal-content button {
  border: 0px;
}

.modal-body {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-content: space-around;
  gap: 30px;
  width: 100%;
}

#form-login {
  display: flex;
  align-content: space-between !important;
}
input {
  padding-left: 60px;
}
input:focus {
  border: 1px solid #f9f0e4 !important;
}

#login {
  border-radius: 50px;
}
#login-span {
  color: #473828;
  font-size: 30px;
  font-family: "Monotype Corsiva";
}
form h1 {
  font-size: 30px !important;
}
.modal-body button {
  font-size: smaller;
  font-weight: 300;
}
.icons-update {
  width: 25px;
  height: 25px;
}
</style>
