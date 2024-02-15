<template>
    <div class="container main">
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
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-notifications"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Notifications</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-notifications"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Clients Reservations</button>

                </div>
            </nav>
        </div>


        <div class="container infos" v-if="store.user">
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
                                            class="me-2" />{{ "Name: " + store.user.name + " " + store.user.lastName
                                            }}</span>
                                </div>
                                <div><span><img :src="require('../assets/orange-calendar.png')" width="30px" height="30px"
                                            class="me-2" />{{ "BirthDate: " + store.user.Date }}</span></div>
                                <div><span><img :src="require('../assets/icons8-home-30.png')" width="30px" height="30px"
                                            class="me-2" />{{ "Addresse: " + store.user.addresse }}</span></div>
                                <div><span><img :src="require('../assets/icons8-phone-50.png')" width="30px" height="30px"
                                            class="me-2" />{{ "Tel : " + store.user.tel }}</span></div>
                            </div>
                            <div id="holder" class="mb-3"><button class="btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Update</button><button class="btn" onclick="exit">Log
                                    out</button></div>


                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <!-- plats -->
                    <div class="plats dash">
                        <h1 class="text-center">Reservations </h1>
                        <table class="dataTable">

                            <tr>
                                <td style="text-align: center">Reservation </td>
                                <td style="text-align: center">Date</td>
                                <td style="text-align: center">Personnes</td>
                                <td style="text-align: center">Price</td>
                                <td style="text-align: center">table</td>
                                <td style="text-align: center">restaurant</td>
                                <td style="text-align: center">status</td>

                            </tr>

                            <tr v-for="(reservation, index2) in reservations" :key="index2">
                                <td class="table-info">{{ reservation.id }}</td>
                                <td class="table-info">{{ reservation.Date }}</td>
                                <td class="table-info">{{ reservation.nbPersonne }}</td>
                                <td class="table-info">
                                    {{ reservation.prix }}
                                </td>
                                <td>{{ reservation.table_id }}</td>
                                <td>{{ reservation.nom_restaurant }}</td>
                                <td v-if="reservation.status == 1" style="color: green">Accepted</td>
                                <td v-if="reservation.status == 0" style="color: orange">In Line</td>
                                <td v-if="reservation.status == 2" style="color: red">Rejected</td>

                            </tr>

                        </table>
                    </div>
                    <table>

                    </table>
                </div>
                <div class="tab-pane fade" id="nav-clients" role="tabpanel" aria-labelledby="nav-clients-tab" tabindex="0">
                    <h1 class="text-center">Commandes</h1>
                    <div>
                        <table v-for="(com, index) in  commande" :key="index" class="dataTable">
                            <tr>
                                <td>N°Commande</td>
                                <td>Photo</td>
                                <td>Name</td>
                                <td>price</td>
                                <td>quantity</td>
                                <td>TotalPlat</td>
                            </tr>
                            <tr v-for="(plats, index2) in com.ligne_plats" :key="index2">
                                <td>{{ index + 1 }}</td>
                                <td><img class="mt-2 ms-2" :src="'http://localhost:8000/storage/' + plats.plat.photo"
                                        width="50px" /></td>
                                <td>{{ plats.plat.nom }}</td>
                                <td>{{ plats.plat.prix }}</td>
                                <td>{{ plats.quantity }}</td>
                                <td>{{ plats.prix_total }}</td>
                            </tr>
                            <tr>
                                <td>Total:</td>
                                <td>{{ com.prix }}</td>
                                <td>Status:</td>
                                <td v-if="com.status == 0" style="color: red;">in Line</td>
                                <td v-else style="color:green">Accepted</td>
                            </tr>
                        </table>


                    </div>
                </div>
                <div class="tab-pane fade" id="nav-notifications" role="tabpanel" aria-labelledby="nav-disabled-tab"
                    tabindex="0">

                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Notifications</h1>
                    <div class="container notifications mt-5">
                        <div v-for="(notif, index) in  notifs" :key="index">
                            <div v-if="notif.status == 1" class="alert alert-success d-flex align-items-center notif" role="alert">
                                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div  class="message">
                                    {{ notif.message }}
                                </div>
                                <button type="button" class="btn-close ms-2" aria-label="Close"></button>
                            </div>
                            <div v-else class="alert alert-danger d-flex align-items-center notif" role="alert">
                                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div class="message">
                                    {{notif.message}}
                                </div>
                                <button type="button" class="btn-close ms-2" aria-label="Close"></button>
                                </div>
                        </div>
                       
                    </div>
                </div>
            </div>
             <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                            <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
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
                            <form id="update-form" class="card shadow" @submit.prevent="update_user()"
                                enctype="multipart/form-data">
                                <label for="exampleInputEmail1" class="form-label"><img :src="require(`../assets/logo.png`)"
                                        width="50px" class="me-2 mt-2" /></label>
                                <div class="mb-3 container" width="500px">
                                    <label for="exampleInputEmail1" class="form-label">Name:</label>
                                    <input type="text" class="form-control" v-model="user.name" id="exampleInputEmail"
                                        placeholder="Enter the prodduct's name" aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3 container" width="500px">
                                    <label for="exampleInputEmail2" class="form-label">LastName:</label>
                                    <input type="text" class="form-control" v-model="user.lastName" id="exampleInputEmail"
                                        placeholder="Enter the prodduct's name" aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3 container" width="500px">
                                    <label for="exampleInputPassword1" class="form-label">Addresse:</label>
                                    <input type="text" class="form-control" v-model="user.addresse"
                                        id="exampleInputPassword" placeholder="Enter the prodduct's price">
                                </div>
                                <div class="mb-3 container" width="500px">
                                    <label for="exampleInputPassword2" class="form-label">e-mail:</label>
                                    <input type="mail" class="form-control" v-model="user.email" id="exampleInputPassword"
                                        placeholder="Enter the prodduct's price">
                                </div>
                                <div class="mb-3 container" width="500px">
                                    <label for="exampleInputPassword3" class="form-label">password:</label>
                                    <input type="password" class="form-control" v-model="user.password"
                                        id="exampleInputPassword" placeholder="Enter User password">
                                </div>
                                <div class="mb-3 container" width="500px">
                                    <label for="TEL" class="form-label">Tel:</label>
                                    <input type="number" class="form-control" v-model="user.tel" id="exampleInputPassword"
                                        min="0" placeholder="Enter Estimated Time..">
                                </div>


                                <div class="mb-3 container" width="500px">
                                    <label for="exampleInputPassword1" class="form-label">Photo:</label>
                                    <input class="form-control" type="file" id="formFile2" ref="UserPhoto"
                                        @change="uploadFile">
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
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
import reservation from "@/services/reservations/reservations";
import commande from "@/services/product_manipulation/commande";
import notifications from "@/services/notifications/notifications"
import { AuthStore } from "@/store/auth.js"

export default
    {
        setup() {
            const store = AuthStore();
            return { store }
        },
        mounted() {
            window.Echo.channel('public').listen('Notif', (e) => {
                this.getnotif();
            })
        },
        created() {
            this.COMMANDES();
            this.user = this.store.user;
            this.get_reservations();
            this.getnotif();

        },
        data() {
            return {

                commande: [],
                user: "",
                reservations: [],
                notifs: [],


            }
        },
        methods: {
            COMMANDES() {
                if (this.store.user.id) {

                    commande.get_commandes(this.store.user.id).then((res) => {
                        this.commande = res.data.data;
                        console.log(res.data.data);
                    });
                }
            },
            uploadFile() {
                this.user.photo = this.$refs.UserPhoto.files[0];
                console.log(this.user.photo);

            },
            update_user() {
                Users.UpdateUser(this.user).then((res) => {
                    this.user = (res.data.data);
                    this.store.user = this.user;
                    localStorage.setItem('user', JSON.stringify(this.store.user));
                })
            },
            exit() {
                this.store.logout();
            },
            get_reservations() {
                reservation.MyReservations(this.store.user.id).then((res) => {
                    this.reservations = res.data.data;
                    console.log(res.data.data);
                });
            },
            getnotif() {
                console.log("hhhh");
                notifications.Getnotifications(this.store.user.id).then((res) => {
                    console.log("hi");
                    console.log(res.data.data);
                    this.notifs = res.data.data;
                })
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

.table-info {
    text-align: center;
}
.message{
    display: flex;
    align-items: center;
}
.notifications {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    gap:15px;
}
.notif
{
    display: flex;
    align-items: flex-start;
    
}
.notifications div {
    height : 100px !important;
    display: flex;
}
.notifications svg {
    width: 50px;
    height: 50px;
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
#nav-notifications{
    height: auto;
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