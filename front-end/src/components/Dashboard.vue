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
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
            role="tab" aria-controls="nav-profile" aria-selected="false">Commandes</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
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
            <form enctype="multipart/form-data">
              <div class="mb-3 container" width="500px">
                <label for="exampleInputEmail1" class="form-label">Name:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                  v-model="supplement.name">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="number" class="form-control" id="exampleInputPassword1" v-model="supplement.prix">
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile" ref="photo" @change="uploadFile">
              </div>
              <button type="submit" class="btn btn-primary" @click="submit_supp">Submit</button>
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
            <form @submit.prevent="submit_Prod()" enctype="multipart/form-data">
              <div class="mb-3 container" width="500px">
                <label for="exampleInputEmail1" class="form-label">Name:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                  v-model="product.name">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="number" class="form-control" id="exampleInputPassword1" v-model="product.prix">
              </div>


              <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile" ref="photo" @change="uploadFileProduct">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
              <div id="supp-available">
              <div v-for="(options,index2) in supps" :key="index2">
                <div class="form-check ms-3">
                  <input class="form-check-input" type="checkbox" :value="options.id" v-model="product.selected_supplements">
                  <label class="form-check-label" for="flexCheckDefault">
                   {{options.name}}
                  </label>
                </div>
              </div>

              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-clients" role="tabpanel" aria-labelledby="nav-clients-tab" tabindex="0">
          <h1 class="text-center">Clients</h1>
          <table
      class="dataTable"
     
    >
    
        <tr>
          <td style="text-align: center">Photo </td>
          <td style="text-align: center">Name</td>
          <td style="text-align: center">Mail</td>
          <td style="text-align: center">Lieu</td>
          <td style="text-align: center">Telephone</td>
          <td style="text-align: center">Operations</td>
        </tr>
    
      <tr  v-for="(user, index2) in users"
      :key="index2">
        <td class="table-info"><img :src="'http://localhost:8000'+user.photo" class="img-profile"/></td>
        <td class="table-info">{{ user.name+" "+user.lastName }}</td>
        <td class="table-info">{{ user.email }}</td>
        <td class="table-info">
          {{ user.addresse }}
        </td>
        <td>{{ user.tel }}</td>
        <td><button class="btn btn-danger me-2">update</button><button class="btn btn-danger">Delete</button></td>
      </tr>
      
    </table>
        </div>
        <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">


        </div>
      </div>





    </div>
  </div>
</template>



<script>

import productService from "@/services/product_manipulation/product_add.js";
import Users from "@/services/Users/Users";
export default
  {

    created() {
      this.GetSupplements();
      this.GetALLUsers();
      this.Getresponsables();
    },
    data() {
      return {
        supplement: {
          prix: 0,
          name: "",
          photos: "",
        },
        supps: [],
        product:{
          prix:0,
          name:"",
          photo:"",
          selected_supplements: [],
        
        },
        users:[],
        Responsables:[],

        



      }
    },
    methods: {
      GetSupplements() {
        productService.getSupplements().then((response) => {

          this.supps = response.data.data;
        })
      },
      Getresponsables()
      {
        Users.GetResponsables().then((res)=>{
          this.Responsables=res.data.data;

        })
      },
      GetALLUsers()
      {
        Users.GetUsers().then((res)=>{
          this.users=res.data.data;
          console.log(this.users);
        })
      },
      uploadFile() {
        this.supplement.photos = this.$refs.photo.files[0];
      },
      uploadFileProduct()
      {
          this.product.photo=this.$refs.photo.files[0];
          console.log(this.product.photo);
      },
      submit_supp() {
        console.log("product " + this.supplement);
        console.log("product " + this.supplement.prix);
        console.log("product " + this.supplement.name);
        console.log("product photo " + this.supplement.photos);
        console.log(this.supplement);
        productService.add_product(this.supplement);
      },
      submit_Prod()
      {
        console.log(this.product);
        
      }
    },








  }

</script>
<style>
.main {
  display: flex;
  justify-content: space-between;
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

#supp-available {
  display: flex;
  flex-wrap: wrap;
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
.img-profile{
  width: 60px;
  height:60px;
  border-radius: 50%;
  cursor: pointer;
  border:1px solid black;
}
</style>