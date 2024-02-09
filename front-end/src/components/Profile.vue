<template>
    <div class="container main" >
        <div class="container navs shadow">
            <nav>
                <div class="nav nav-tabs links d-flex align-items-start" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">My Profile</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Reservations</button>
                    <button class="nav-link" id="nav-clients-tab" data-bs-toggle="tab" data-bs-target="#nav-clients"
                        type="button" role="tab" aria-controls="nav-clients" aria-selected="false">Commandes</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Favoris</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Notifications</button>

                </div>
            </nav>
        </div>


        <div class="container infos" v-if="store.user" >
            <!-- supplements-->
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                    tabindex="0">
                    <div class="supplments dash ">

                        <h1 class="text-center">My Profile </h1>
                        <div id="profile" class="card shadow">

                            <img :src="'http://localhost:8000' + store.user.photo" id="profile_picture" @click="menuToggle"
                                class="mt-3 ms-2" />
                            <div id="text-infos" class="informations">
                                <div><span><img :src="require('../assets/client-icon.png')" width="30px" height="30px"
                                            class="me-2" />{{ "Name: " + store.user.name + " " + store.user.lastName }}</span>
                                </div>
                                <div><span><img :src="require('../assets/orange-calendar.png')" width="30px" height="30px"
                                            class="me-2" />{{ "BirthDate: " + store.user.Date }}</span></div>
                                <div><span><img :src="require('../assets/icons8-home-30.png')" width="30px" height="30px"
                                            class="me-2" />{{ "Addresse: " + store.user.addresse }}</span></div>
                                <div><span><img :src="require('../assets/icons8-phone-50.png')" width="30px" height="30px"
                                            class="me-2" />{{ "Tel : " + store.user.tel }}</span></div>
                            </div>
                            <div id="holder" class="mb-3"><button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button><button class="btn">Log
                                    out</button></div>


                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <!-- plats -->
                    <div class="plats dash">
                        <h1 class="text-center">Reservations </h1>
                    </div>
                    <table>

                    </table>
                </div>
                <div class="tab-pane fade" id="nav-clients" role="tabpanel" aria-labelledby="nav-clients-tab" tabindex="0">
                    <h1 class="text-center">Commandes</h1>
                    <div>
                        <table v-for="(com,index) in  commande" :key="index" class="dataTable">
                            <tr>
                                <td>N°Commande</td>
                                <td>Photo</td>
                                <td>Name</td>
                                <td>price</td>
                                <td>quantity</td>
                                <td>TotalPlat</td>
                            </tr>
                            <tr v-for="(plats,index2) in com.ligne_plats" :key="index2">
                                <td>{{index + 1}}</td>
                     <td><img class="mt-2 ms-2" :src="'http://localhost:8000/storage/' + plats.plat.photo" width="50px" /></td>
                    <td>{{ plats.plat.nom }}</td>
                    <td>{{ plats.plat.prix }}</td>
                    <td>{{ plats.quantity }}</td>
                    <td>{{ plats.prix_total }}</td>
                            </tr>
                            <tr><td>Total:</td><td>{{ com.prix }}</td><td>Status:</td><td v-if="com.status==0" style="color: red;">in Line</td> <td v-else style="color:green">Accepted</td></tr>
                        </table>


                    </div>
                </div>
                <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab"
                    tabindex="0">

                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Notifications</h1>

                </div>
            </div>
            <!-- Button trigger modal -->

            <!-- Modal -->
           
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Update profile !</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="update-form" class="card shadow" @submit.prevent="update_user()" enctype="multipart/form-data">
                <label for="exampleInputEmail1" class="form-label"><img :src="require(`../assets/logo.png`)" width="50px"
                    class="me-2 mt-2" /></label>
                <div class="mb-3 container" width="500px">
                  <label for="exampleInputEmail1" class="form-label">Name:</label>
                  <input type="text" class="form-control"   v-model="user.name" id="exampleInputEmail" placeholder="Enter the prodduct's name"
                    aria-describedby="emailHelp">

                </div>
                <div class="mb-3 container" width="500px">
                  <label for="exampleInputEmail1" class="form-label">LastName:</label>
                  <input type="text" class="form-control"   v-model="user.lastName" id="exampleInputEmail" placeholder="Enter the prodduct's name"
                    aria-describedby="emailHelp">

                </div>
                <div class="mb-3 container" width="500px">
                  <label for="exampleInputPassword1" class="form-label">Addresse:</label>
                  <input type="text" class="form-control"   v-model="user.addresse" id="exampleInputPassword" 
                    placeholder="Enter the prodduct's price">
                </div>
                <div class="mb-3 container" width="500px">
                  <label for="exampleInputPassword1" class="form-label">e-mail:</label>
                  <input type="mail" class="form-control"   v-model="user.email" id="exampleInputPassword" 
                    placeholder="Enter the prodduct's price">
                </div>
                <div class="mb-3 container" width="500px">
                  <label for="exampleInputPassword1" class="form-label">password:</label>
                  <input type="password" class="form-control"   v-model="user.password" id="exampleInputPassword" 
                    placeholder="Enter User password">
                </div>
                <div class="mb-3 container" width="500px">
                  <label for="exampleInputPassword1" class="form-label">Tel:</label>
                  <input type="number" class="form-control"  v-model="user.tel" id="exampleInputPassword" min="0"
                    placeholder="Enter Estimated Time..">
                </div>


                <div class="mb-3 container" width="500px">
                  <label for="exampleInputPassword1" class="form-label">Photo:</label>
                  <input class="form-control" type="file"   id="formFile2" ref="UserPhoto" @change="uploadFile">
                </div>


                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>


        </div>

    </div>
</template>
  
  
  
<script>

import productService from "@/services/product_manipulation/product_add.js";
import Users from "@/services/Users/Users";
import commande from "@/services/product_manipulation/commande";
import { AuthStore } from "@/store/auth.js"

export default
    {
        setup() {
            const store = AuthStore();
            return { store }
        },
        created() {
                this.COMMANDES();
                this.user = this.store.user;
                console.log(this.user);
        },
        data() {
            return {


                    commande:[],
                    user:"",


            }
        },
        methods: {
                COMMANDES()
                {
                    if(this.store.user.id){

                        commande.get_commandes(this.store.user.id).then((res)=>{
                        this.commande=res.data.data;
                        console.log(res.data.data);
                    });
                    }
                },
                uploadFile()
                {
                    this.user.photo = this.$refs.UserPhoto.files[0];
                    console.log(this.user.photo);

                }
        },








    }

</script>
<style scoped>
h1 {
    font-weight: 500;
    font-family: "Poppins";
}

#holder {
    display: flex;
    justify-content: space-between;
    gap: 15px;
}

#text-infos {
    display: flex;
    gap: 25px;
    color: #473828;
    font-family: "Poppins";
    font-weight: 300;
    flex-direction: column;
    justify-content: space-between !important;
}

.infos {
    text-align: left !important;
    display: flex;
    justify-content: left !important;

    width: 100%;
}

#profile {
    border: 0;
    border-radius: 15px;
    width: 350px;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    gap: 2em;
}

.main {
    display: flex;
    justify-content: space-between;
    width: 80%;
}

form label {
    font-weight: bold;
    font-size: large;
}

#update-form {
    background-color: white;
}

.navs {
    width: 20% !important;
    height: 70%;
    position: absolute;
    left: 0;
    position: fixed;
    background-color: #ff9900;
    border-radius: 0% 5% 5% 0%;


}

.navs button {
    width: 50%;
}

.links {
    display: flex !important;
    align-content: center;
    justify-content: center;
    gap: 20px;
    height: 100% !important;
    color: black !important;
}

.img-supp {
    width: 10rem;
    border-radius: 50%;
    height: 8rem;
}

.links button {
    border-radius: 10%;
    color: black;
    width: 100%;
}

.infos {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

ul {
    color: black !important;
}

nav {
    height: 100%;
}

.form-check {
    display: flex;
    flex-direction: row;
    justify-content: left !important;
}

#supp-available {
    display: flex;
    flex-wrap: wrap;
    justify-content: left !important;
}

form button {
    background-color: #ff9900 !important;
}

.dataTable {
    display: block;
    width: 100%;
    margin: 1em 0;
}

.dataTable thead,
.dataTable tbody,
.dataTable thead tr,
.dataTable th {
    display: block;
}

.dataTable tbody {
    width: auto;
    position: relative;
    overflow-x: auto;
}

.dataTable td,
.dataTable th {
    padding: 0.625em;
    line-height: 1.5em;
    border-bottom: 1px dashed #ccc;
    box-sizing: border-box;
    overflow-x: hidden;
    overflow-y: auto;
}

.dataTable th {
    text-align: left;
    background: rgba(0, 0, 0, 0.14);
    border-bottom: 1px dashed #aaa;
}

thead tr th {
    display: flex;
    justify-content: center;
}

.dataTable tbody tr {
    display: table-cell;
}

.dataTable tbody td {
    display: block;
}

.dataTable tr:nth-child(odd) {
    background: rgba(0, 0, 0, 0.07);
}

.img-profile {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    cursor: pointer;
    border: 1px solid black;
}

form {
    border-radius: 15px;
    background-color: #FABD62;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    border: 2px solid #F9F0E4;
    align-items: center;
}

form div:not(:last-child) {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}


form input {
    width: 80%;
}

input[type="checkbox"] {
    width: 15px;
}

.check-area {
    display: flex;
    justify-content: left;
}

button {
    border: 0;
}

@media screen and (max-width: 768px) {
    body {
        font-size: 14px;
    }

    .main {
        display: block;
    }

    .navs {
        position: static;
        width: 100% !important;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5%;
    }

    .links {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    nav button {
        width: 50%;
        font-size: smaller;
    }

}</style>