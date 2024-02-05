<template>
  <section class="row gy-5 mt-5">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form class="modal-body d-flex align-items-center" id="form-login2">
            <h1 class="modal-title fs-5" style="color: #fabd62" id="exampleModalLabel">
              Welcome to<span id="login-span"> FCfooDie </span>
            </h1>
            <img :src="require('../assets/logo.png')" id="logo" class="mb-3" />
            <div class="input-icons">
              <img :src="require('../assets/client-icon.png')" id="icon-input" class="mt-3 ms-4" />
              <input v-model="credentials.email" class="input-field shadow" type="text"
                placeholder="Enter your mail..." />
            </div>
            <div class="input-icons">
              <img :src="require('../assets/icons8-password-30.png')" id="icon-input" class="mt-3 ms-4" />
              <input v-model="credentials.password" class="input-field shadow" type="password"
                placeholder="Enter your  password.." />
            </div>
            <button type="button" class="btn btn-primary" @click="firelogin" id="login-btn" data-bs-dismiss="modal">
              LOGIN
            </button>
            <div>
              <span>
                Don't have an account ?
                <span data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                  id="signup">Sign-up</span>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="reload"></button>
          </div>
          <form class="modal-body d-flex align-items-center" id="form-login" @submit.prevent="SignUp()"
            enctype="multipart/form-data">
            <h1 class="modal-title fs-5" style="color: #fabd62" id="exampleModalLabel">
              Welcome to<span id="login-span"> FCfooDie2 </span>
            </h1>
            <img :src="require('../assets/logo.png')" id="logo" />
            <div class="input-icons">
              <img :src="require('../assets/client-icon.png')" id="icon-input" class="mt-3 ms-4" />
              <input class="input-field shadow" type="text" v-model="form.name" placeholder="Enter your First Name..." />
            </div>
            <div class="input-icons">
              <img :src="require('../assets/client-icon.png')" id="icon-input" class="mt-3 ms-4" />
              <input class="input-field shadow" type="text" v-model="form.lastname"
                placeholder="Enter your  Last Name.." />
            </div>
            <div class="input-icons">
              <img :src="require('../assets/orange-calendar.png')" id="icon-input" class="mt-3 ms-4 icons-update" />
              <input class="input-field shadow" type="date" v-model="form.date" placeholder="Enter your  Birth Date.." />
            </div>
            <div class="input-icons">
              <img :src="require('../assets/icons8-phone-50.png')" id="icon-input" class="mt-3 ms-4 icons-update" />
              <input class="input-field shadow" type="number" v-model="form.tel"
                placeholder="Enter your  telephone number.." />
            </div>
            <div class="input-icons">
              <img :src="require('../assets/icons8-home-30.png')" id="icon-input" class="mt-3 ms-4" />
              <input class="input-field shadow" type="text" v-model="form.adresse" placeholder="Enter your  addresse.." />
            </div>
            <div class="input-icons">
              <img :src="require('../assets/client-icon.png')" id="icon-input" class="mt-3 ms-4" />
              <input class="input-field shadow" type="text" v-model="form.email" placeholder="Enter your  e-mail.." />
            </div>
            <div class="input-icons">
              <img :src="require('../assets/client-icon.png')" id="icon-input" class="mt-3 ms-4" />
              <input class="input-field shadow" type="password" v-model="form.password"
                placeholder="Enter your password.." />
            </div>

            <div class="file-input">
              <input ref="photo" @change="uploadFile" type="file" name="file-input" id="file-input"
                class="file-input__input" />
              <label class="file-input__label" for="file-input">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload"
                  class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512">
                  <path fill="currentColor"
                    d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                  </path>
                </svg>
                <span>Upload Profile Picture</span></label>
            </div>
            <button type="submit" class="btn btn-primary" id="login">
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
        <span class="explore">Explore more <img :src="require('../assets/icon-explore.png')" /></span>
      </div>
      <div class="img-food">
        <img :src="require('../assets/steak.png')" />
        <span class="mt-3">steak set</span>
        <img :src="require('../assets/5-stars.png')" class="stars" />
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae,
          aperiam! Deleniti numquam dignissimos repellendus, obcaecati eligendi
        </p>
        <span class="explore">Explore more <img :src="require('../assets/icon-explore.png')" /></span>
      </div>
      <div class="img-food">
        <img :src="require('../assets/salad.png')" />
        <span class="mt-3">Salad</span>
        <img :src="require('../assets/5-stars.png')" class="stars" />
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae,
          aperiam! Deleniti numquam dignissimos repellendus, obcaecati eligendi
        </p>
        <span class="explore">Explore more <img :src="require('../assets/icon-explore.png')" /></span>
      </div>
    </div>
    <div class="container-fluid" id="bg" v-bind:style="{
      background: 'rgba(0, 0, 0, 0.2)',
      'background-image':
        'url(' + require('../assets/restaurant-vue.jpg') + ')',
      'background-size': '100% 100%',
      'background-position': 'center',
      'background-repeat': 'no-repeat',
    }">
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
          <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal3" :disabled="!store.user" >Order Now</button>
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
        <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal3" :disabled="!store.user">Order Now</button>
      </div>
      <div class="landing-2 mt-2">
        <img :src="require('../assets/chef.png')" id="chef-m" />
      </div>
    </div>
    <div class="map-container" height="350px">
      <h1 class="mb-5 location">Our Location</h1>
      <div id="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1700.2339010912276!2d10.268861150965995!3d36.84716212336433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd4aaddd5f6e33%3A0x9eb991e9eca3faab!2sST2i!5e0!3m2!1sfr!2stn!4v1706395839868!5m2!1sfr!2stn"
          width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>


    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="reload"></button>
          </div>
          <form class="modal-body d-flex align-items-center" id="form-reservation" @submit.prevent="SignUp()"
            enctype="multipart/form-data">
            <h1 class="modal-title fs-5" style="color: #fabd62" id="exampleModalLabel">
              Welcome to<span id="login-span"> FCfooDie2 </span>
            </h1>
            <h2>Book Now!!</h2>
            <img :src="require('../assets/logo.png')" id="logo" />
            <div class="input-icons">
              <img :src="require('../assets/client-icon.png')" id="icon-input" class="mt-3 ms-4" />
              <input class="input-field shadow" type="number" v-model="form.name"
                placeholder="Enter the number of persons.." />
            </div>
            <div class="input-icons">
              <img :src="require('../assets/orange-calendar.png')" id="icon-input" class="mt-3 ms-4 icons-update" />
              <input class="input-field shadow" type="date" v-model="form.date" placeholder="Enter your  Birth Date.." />
            </div>
            <div class="input-icons">
              
            <select class="form-select input-field shadow" aria-label="Default select example" @change="updateAvailableTables" aria-placeholder="choose your restaurant" v-model="reservation.num_restaurant">
              <option disabled selected value="">Select Your Restaurant</option>
              <option  v-for="(res, index) in  Res"  :key="index"  :value="res.role.id"  class="form-select input-field shadow">{{ res.role.nom_restaurant }}</option>
              
            </select>
            </div>
            <div class="input-icons">
              
              <select class="form-select input-field shadow" aria-label="Default select example" aria-placeholder="choose your Table" v-model="reservation.table">
                <option disabled selected value="">Select Your Table</option>
                <option  v-for="(table,index) in tables" :key="index"     :value="index+1" class="form-select input-field shadow">{{"Table :"+ table.id}}</option>
              </select>
              </div>


            <button type="submit" class="btn btn-primary" id="login_btn">
              SIGNUP
            </button>
          </form>
        </div>
      </div>
    </div>







    <Footer></Footer>
  </section>
</template>

<script>
import Footer from "@/components/Footer.vue"
import { AuthStore } from "@/store/auth.js"
import AuthService from "../services/Auth/authentification.js"
import Users from "../services/Users/Users"
import Livraison from "../services/reservations/reservations"

export default {
  name: "HelloWorld",
  components: { Footer },
  setup() {
    const store = AuthStore();
    return { store }
  },
  created()
  {
    this.Responsables();
  },
  data() {
    return {
      credentials: {
        email: "",
        password: "",
      },
      form: {
        name: "",
        photo: "",
        email: "",
        password: "",
        lastname: "",
        date: "",
        adresse: "",
        tel: ""
      },
      Res :{},
      reservation :{
        prix :  20  , 
        id_user : "",
        nbPersonne:0 ,
        Date : "",
        num_restaurant:"",
        table:"",
      },
      tables :[],
    };
  },
  props: {
    msg: String,
  },
  methods: {
    uploadFile() {
      this.form.photo = this.$refs.photo.files[0];
    },
    reload() {
      location.reload();
    },
    firelogin() {
      AuthService.login(this.credentials.email, this.credentials.password).then((res) => {
        if (this.store.role['role_number']) {
          this.$router.push({ name: "" })
        }
        location.reload();
      })
    },
    Responsables()
    {
      Users.GetResponsables().then((res)=>{
        this.Res  =  res.data.data ; 
        console.log(this.Res);
      })
    },
    SignUp() {
      console.log("image : " + this.form.photo);
      AuthService.signup({
        name: this.form.name,
        photo: this.form.photo,
        email: this.form.email,
        password: this.form.password,
        lastname: this.form.lastname,
        date: this.form.date,
        adresse: this.form.adresse,
        tel: this.form.tel
      }).then((res) => {
        console.log(res.data);
      })
      location.reload();
    },
    updateAvailableTables()
    {
      // use this.reservation. 
      console.log(this.reservation.num_restaurant);
      Livraison.GetSpecifiqueTables(this.reservation.num_restaurant).then((res)=>{
        this.tables =  res.data.data;
        console.log(res.data.data);
      })


    }

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

#map {
  border: 3px solid #ff9900;
}

.container-1 {
  display: flex;
  width: 80%;
  margin-bottom: 30px;
}

.location {
  font-family: "Poppins";
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
  transition: border-color 0.3s;
  /* Add transition for a smooth effect */
}

.input-field:focus {
  border: 1;
  border-color: orange;
  /* Change the border color when focused */
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


#signup {
  color: #ff9900;
  cursor: pointer;
}

#form-login {
  display: flex;
  align-content: space-between !important;
}
#form-login2 {
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
#login_btn {
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



body {
  font-family: sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 200px;
}

.file-input__input {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}

.file-input__label {
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  border-radius: 4px;
  font-size: 14px;
  font-weight: 600;
  color: #fff;
  font-size: 14px;
  padding: 10px 12px;
  background-color: #ff9900;
  box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25);
}

.file-input__label svg {
  height: 16px;
  margin-right: 4px;
}
</style>
