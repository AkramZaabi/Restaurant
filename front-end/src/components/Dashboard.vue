<template>
  <div class="container main">
    <div class="container navs shadow">
      <nav>
        <div class="nav nav-tabs links d-flex align-items-start" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
            role="tab" aria-controls="nav-home" aria-selected="true">Supplements</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
            role="tab" aria-controls="nav-profile" aria-selected="false">Products</button>
          <button class="nav-link" id="nav-clients-tab" data-bs-toggle="tab" data-bs-target="#nav-clients" type="button"
            role="tab" aria-controls="nav-clients" aria-selected="false">Clients</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-commandes" type="button"
            role="tab" aria-controls="nav-profile" aria-selected="false">Commandes</button>
          <button class="nav-link" id="nav-reservation-tab" data-bs-toggle="tab" data-bs-target="#nav-reservations" type="button"
            role="tab" aria-controls="nav-profile" aria-selected="false">Reservations</button>

        </div>
      </nav>
    </div>


    <div class="container infos">
      <!-- supplements-->
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
          <div class="supplments dash " id="supplements">

            <h1 class="text-center">Add supplment </h1>
            <form class="card shadow" @submit.prevent="submit_supp()" enctype="multipart/form-data">
              <label for="exampleInputEmail1" class="form-label"><img :src="require(`../assets/logo.png`)" width="50px"
                  class="me-2 mt-2" /></label>

              <div class="mb-3 container mt-2" width="500px">
                <label for="exampleInputEmail1" class="form-label">Name:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter the name.."
                  aria-describedby="emailHelp" v-model="supplement.name">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price:</label>
                <input type="number" class="form-control" id="exampleInputPassword1" v-model="supplement.prix">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Photo:</label>
                <input class="form-control" type="file" id="formFile" ref="photoSupp" @change="uploadFile">
              </div>
              <button type="submit" class="btn btn-primary mb-3 mt-1">Submit</button>
            </form>
            <div id="supp-available">
              <div v-for="(supp, index) in supps" :key="index">
                <img :src="'http://localhost:8000/storage/' + supp.photo" class="img-supp">
                <div>{{ supp.name + " : " + '$' + supp.prix }}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
          <!-- plats -->
          <div class="plats dash">
            <h1 class="text-center mt-5">Add Plat </h1>
            <form class="card shadow" @submit.prevent="submit_Prod()" enctype="multipart/form-data">
              <label for="exampleInputEmail1" class="form-label"><img :src="require(`../assets/logo.png`)" width="50px"
                  class="me-2 mt-2" /></label>
              <div class="mb-3 container" width="500px">
                <label for="exampleInputEmail1" class="form-label">Name:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter the prodduct's name"
                  aria-describedby="emailHelp" v-model="product.name">

              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price:</label>
                <input type="number" class="form-control" id="exampleInputPassword1" min="0"
                  placeholder="Enter the prodduct's price" v-model="product.prix">
              </div>


              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Photo:</label>
                <input class="form-control" type="file" id="formFile" ref="photo" @change="uploadFileProduct">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
              <div id="supp-available" class="mt-3 mb-3">
                <div v-for="(options, index2) in supps" :key="index2" class="check-area ">
                  <div class="form-check ms-3">
                    <input class="form-check-input" type="checkbox" :value="options.id"
                      v-model="product.selected_supplements">
                    <label class="form-check-label ms-1" for="flexCheckDefault">
                      {{ options.name }}
                    </label>
                  </div>
                </div>

              </div>
            </form>
          </div>
          <h1 class="mt-5">All plats</h1>
          <table class="dataTable">

            <tr>
              <td style="text-align: center">Photo </td>
              <td style="text-align: center">Name</td>
              <td style="text-align: center">Price</td>
              <td style="text-align: center">Time</td>
              <td style="text-align: center">Quantity</td>
              <td style="text-align: center">Operations</td>
            </tr>

            <tr v-for="(plat, index2) in Plats" :key="index2">
              <td class="table-info"> <img :src="'http://localhost:8000/storage/' + plat.photo" width="50px" /></td>
              <td class="table-info">{{ plat.nom }}</td>
              <td class="table-info">{{ plat.prix }}</td>
              <td class="table-info">
                {{ plat.temps }}
              </td>
              <td>{{ plat.quantite }}</td>
              <td><button class="btn btn-danger me-2" @click="ChangeSelected(plat)" data-bs-toggle="modal"
                  data-bs-target="#exampleModal">update</button><button class="btn btn-danger"
                  @click="deletePlat(plat.id)" id="liveToastBtn">Delete</button></td>
            </tr>

          </table>
        </div>
        <div class="tab-pane fade" id="nav-clients" role="tabpanel" aria-labelledby="nav-clients-tab" tabindex="0">
          <h1 class="text-center">Clients</h1>
          <table class="dataTable">

            <tr>
              <td style="text-align: center">Photo </td>
              <td style="text-align: center">commande</td>
              <td style="text-align: center">Mail</td>
              <td style="text-align: center">Lieu</td>
              <td style="text-align: center">Telephone</td>
              <td style="text-align: center">Operations</td>
            </tr>

            <tr v-for="(user, index2) in users" :key="index2">
              <td class="table-info"><img :src="'http://localhost:8000' + user.photo" class="img-profile" /></td>
              <td class="table-info">{{ user.name + " " + user.lastName }}</td>
              <td class="table-info">{{ user.email }}</td>
              <td class="table-info">
                {{ user.addresse }}
              </td>
              <td>{{ user.tel }}</td>
              <td><button class="btn btn-danger" @click="deleteclient(user.id)">Delete</button></td>
            </tr>

          </table>
        </div>
        <div class="tab-pane fade" id="nav-commandes" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
          <h2>Commandes</h2>
          <table v-for="(com, index) in  commandes" :key="index" class="dataTable">
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
              <td><img class="mt-2 ms-2" :src="'http://localhost:8000/storage/' + plats.plat.photo" width="50px" /></td>
              <td>{{ plats.plat.nom }}</td>
              <td>{{ plats.plat.prix }}</td>
              <td>{{ plats.quantity }}</td>
              <td>{{ plats.prix_total }}</td>
            </tr>
            <tr>
              <td>Total:</td>
              <td>{{ com.prix }}</td>
              <td>Status:</td>
              <td v-if="com.status == 0" style="color: orange;">in Line</td>
              <td v-else-if="com.status==2" style="color:red">Rejected</td>
              <td v-else style="color:green" >Accepted</td>
              <td v-if="com.status==0" @click="acceptcommande(com.id)"><button class="btn btn-outline-success">confirm</button></td>
              <td v-if="com.status==0"><button class="btn btn-outline-success" @click="rejectCommande(com.id)">Annuler</button></td>

            </tr>
          </table>

        </div>
        <div class="tab-pane fade" id="nav-reservations" role="tabpanel" aria-labelledby="nav-clients-tab" tabindex="0">
          <h1 class="text-center">Reservations</h1>
          <table class="dataTable">

            <tr>
              <td style="text-align: center">Reservation </td>
              <td style="text-align: center">Date</td>
              <td style="text-align: center">Personnes</td>
              <td style="text-align: center">Price</td>
              <td style="text-align: center">table</td>
              <td style="text-align: center">restaurant</td>
              <td style="text-align: center">Status</td>
            </tr>

            <tr v-for="(reservation, index2) in Reservations" :key="index2">
              <td class="table-info">{{reservation.id}}</td>
              <td class="table-info">{{ reservation.Date }}</td>
              <td class="table-info">{{ reservation.nbPersonne }}</td>
              <td class="table-info">
                {{ reservation.prix }}
              </td>
              <td>{{ reservation.table_id }}</td>
              <td>{{ reservation.nom_restaurant }}</td>
              <td v-if="reservation.status == 0"><button  class="btn" @click="accept_reservation(reservation.id)">Accept</button> <button class="btn" @click="reject_reservation(reservation.id)">Reject</button></td>
              <td v-if="reservation.status==1" style="color:green">Accepted</td>
              <td v-if="reservation.status==2" style="color:red">Rejected</td>

              

              
            </tr>

          </table>
        </div>
      </div>
      <!-- Button trigger modal -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Update Plat !</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="update-form" class="card shadow" @submit.prevent="update_prod()" enctype="multipart/form-data">
                <label for="exampleInputEmail1" class="form-label"><img :src="require(`../assets/logo.png`)" width="50px"
                    class="me-2 mt-2" /></label>
                <div class="mb-3 container" width="500px">
                  <label for="exampleInputEmail1" class="form-label">Name:</label>
                  <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter the prodduct's name"
                    aria-describedby="emailHelp" v-model="selected_plat.nom">

                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Price:</label>
                  <input type="number" class="form-control" id="exampleInputPassword" min="0"
                    placeholder="Enter the prodduct's price" v-model="selected_plat.prix">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Time:</label>
                  <input type="number" class="form-control" id="exampleInputPassword" min="0"
                    placeholder="Enter Estimated Time.." v-model="selected_plat.temps">
                </div>


                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Photo:</label>
                  <input class="form-control" type="file" id="formFile2" ref="photoProd" @change="uploadFilePlat">
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
import CommadeService from "@/services/product_manipulation/commande.js";
import reservations from "@/services/reservations/reservations";
import Users from "@/services/Users/Users";
import { AuthStore } from "@/store/auth.js"

export default
  {
    setup() {
    const store = AuthStore();
    return { store }
  },
    created() {
      this.GetSupplements();
      this.GetALLUsers();
      this.Getresponsables();
      this.getplats();
      this.GetCommandes();
      this.Getreservations();
    },
    data() {
      return {
        supplement: {
          prix: 0,
          name: "",
          photos: "",
        },
        supps: [],
        product: {
          prix: 0,
          name: "",
          photo: "",
          selected_supplements: [],

        },
        users: [],
        Responsables: [],
        Plats: [],
        msg: "",
        selected_plat: {
        },
        image: "",
        commandes: [],
        Reservations:[],
        
      }
    },
    methods: {
      GetSupplements() {
        productService.getSupplements().then((response) => {

          this.supps = response.data.data;
        })
      },
      Getresponsables() {
        Users.GetResponsables().then((res) => {
          this.Responsables = res.data.data;

        })
      },
      GetALLUsers() {
        Users.GetUsers().then((res) => {
          this.users = res.data.data;
          console.log(this.users);
        })
      },
      uploadFile() {
        this.supplement.photos = this.$refs.photoSupp.files[0];
      },
      uploadFileProduct() {
        this.product.photo = this.$refs.photo.files[0];
        console.log(this.product.photo);
      },
      uploadFilePlat() {
        this.selected_plat.photo = this.$refs.photoProd.files[0];
        console.log(this.selected_plat.photo);
      },
      submit_supp() {
        console.log("product " + this.supplement);
        console.log("product " + this.supplement.prix);
        console.log("product " + this.supplement.name);
        console.log("product photo " + this.supplement.photos);
        console.log(this.supplement);
        productService.add_product(this.supplement).then((res) => {
          console.log(res.data.data);
        });
      this.GetSupplements();

      },
      submit_Prod() {
        console.log("akram");
        console.log(this.product);
        this.product.selected_supplements = JSON.stringify(this.product.selected_supplements);
        console.log("suppps");
        console.log(this.product.selected_supplements);
        productService.add_plat(this.product).then((res) => {
          console.log(res.data.data);
          this.product.selected_supplements = JSON.parse(this.product.selected_supplements);
        });
      this.getplats();


      },
      Getreservations(){
        reservations.Admin_reservations().then((res)=>{
          this.Reservations=res.data.data;
        })
        
      },
      closeModal() {
        // Get the close button element
        const closeButton = document.querySelector('.modal .btn-close');

        // Trigger a click on the close button
        if (closeButton) {
          closeButton.click();
        }
      },
      getplats() {
        productService.GetPlats().then((res) => {
          this.Plats = res.data.data;
        });
        /*  productService.GetPlats.then((res)=>{
          this.Plats=res.data.data;
          
        });*/
      },
      ChangeSelected(plat) {
        this.selected_plat = plat;
      },
      deletePlat(id) {

        productService.DeletePlat(id).then((res) => {
          this.msg = res.data.data;
        });

      },
      update_prod() {
        console.log("ahla");
        console.log(this.selected_plat);
        productService.UpdatePlat(this.selected_plat).then((res) => {
          this.closeModal();
          this.getplats();
        }).catch(error => {
          console.log(error);
        })

      },
      GetCommandes() {
        CommadeService.get_all_commandes().then((res) => {
          this.commandes = res.data.data;
        });
      },
      acceptcommande(id)
      {
          CommadeService.update_commande(id).then((res)=>{
            console.log(res.data.data);
          })
      },
      accept_reservation(id)
      {
        reservations.AcceptReservation(id).then((res)=>{
          console.log(res.data.data);
        });
      this.Getreservations();

      },
      reject_reservation(id)
      {
        reservations.RejectReservation(id).then((res)=>{
          console.log(res.data.data);
        });
      this.Getreservations();

      },

      deleteclient(id)
      {
        console.log(id);
        Users.DeleteUser(id)
        .then((res) => {
            console.log(res.data.data);
            return res.data.data; // You can return the result if needed
        })
        .catch((error) => {
            console.error('Error in deleteclient:', error);
            throw error; // Rethrow the error to propagate it
        });
      },
      rejectCommande(id)
      {
        CommadeService.reject_commande(id).then((res)=>{
            console.log(res.data.data);
          })
      }
    },








  }

</script>
<style scoped>
.main {
  display: flex;
  justify-content: space-between;
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