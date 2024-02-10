<template>
    <section>
        <div class="header">
            <h1 >Our Menu</h1>
    <div id="description"><p >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit sit laborum incidunt. Dolorum accusamus rem non exercitationem quam quis molestias sapiente adipisci necessitatibus maiores, commodi magnam, vel, beatae ipsa dolore.</p>
        </div>

        </div>
        <div class="body container">
            <button class="btn">Sort by</button>
            <div class="plats">
                <div class="plates card shadow" v-for="(plat,index) in  plats"  :key="index">
                   <div class="card-plat"> 
                    <div class="header-plat"> 
                         <img class="mt-2 ms-2" :src="'http://localhost:8000/storage/' + plat.photo" width="50px" />
                         <h2>{{ plat.nom }}</h2>
                    </div>
                  <div class="img-holder mt-3 me-1">
                 <img :src="require('../assets/icons8-heart-50.png')" class="img-icon"/>
                    </div>
                    </div>
                   <div class="price">
                    <span class="mt-1">{{ '$'+ plat.prix  }}</span>
                    <button class="btn buy" @click="ChangeSelected(plat)" data-bs-toggle="modal" data-bs-target="#exampleModal">add to cart</button>
                   </div>
                </div>
            </div>
        </div>
      

<div   class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Add Plat !</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="update-form" class="card shadow" @submit.prevent="SaveCart(selected_plat)" enctype="multipart/form-data">
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
                <div id="supp-available">
                <div v-for="(supp, index2) in selected_plat.supplements" :key="index2" class="check-area ">
                  <div class="form-check ms-3">
                    <input class="form-check-input" type="checkbox" :value="supp.id" v-model="selected_supplements">
                    <label class="form-check-label" for="flexCheckDefault">
                      {{ supp.name }}
                    </label>
                  </div>
                </div>

              </div>
              </div>

             
              <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
            </form>
      </div>
      
    </div>
  </div>
</div>

    </section>
</template>




<script>



import productService from "@/services/product_manipulation/product_add.js";

export default {

    created()
    {
        this.getplats(); 
        console.log(this.plats);

    },
    data()
    {
        return  {

            plats:[],
            selected_plat:{},
            selected_supplements: [],
          
        }

    }, 
    methods : {

        getplats()
        {
            productService.GetPlats().then((res)=>{
                this.plats =  res.data.data ;
                console.log(this.plats);
            })

        },
        ChangeSelected(plat)
        {
            this.selected_plat=plat;
            console.log("hhhh");
            console.log(this.selected_plat
            );
        },
        SaveCart(plat)
        {
          plat.supplements=this.selected_supplements;
          const list = localStorage.getItem("plats");
      let productList = JSON.parse(list) || [];
      const index = productList.findIndex((p) => p.id === plat.id);
      if (index === -1) {
        productList.push(plat);
        alert("product added to cart");
      } else {
        alert("product already in cart");
      }
      localStorage.setItem("plats", JSON.stringify(productList));
      console.log("Cart length:", productList.length);
      this.selected_supplements=[];
        }
      

            

    }


}

</script>

<style scoped>
input[type="checkbox"] {
  width: 15px;
}
.check-area {
  display: flex;
  justify-content: left;
}

.form-check {
  display: flex;
  flex-direction: row;
  justify-content: left !important;
}

.form-check-input {
  width: 15px;
  height: 15px;
  margin-right: 5px; /* Adjust this value as needed */
}

.form-check-label {
  color: #707070;
}
.price{
    display: flex;
    gap:25px;
    justify-content: center;
}
.buy{
    font-size: small;
    background-color: #707070 !important;
    color: #FABD62 !important;
    border-radius: 15px;
}
span{
    font-weight: bold;
    color: #707070;
}
.img-holder {
  background-color: #707070;
  width: 50px !important; /* Removed !important */
  z-index: 2;
  border-radius: 15px;
  height: 30px;
  position: relative;
  right: 10px;
}
.img-icon{
    
    width: 25px !important;
    height:25px !important;
}
.header {
    width: 100%;
   /* Updated to align items in the center */
}


p,
h1 {
    font-weight: bold;
    color: #707070;
    font-family: "Sofia Pro";
}
input{
    width: 100%;
}
form{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
p {
    width: 30%;
    text-align: center;
    
}
#description{
    display: flex;
    justify-content: center;
}
.btn{
    justify-self: right;
}
.body{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.plates{
    z-index: 0;
    width: 220px;
    height:200px;
    background-color: #FABD62;
    border-radius: 25px;
    border: 0;
  
}
.plats{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
     gap:30px;
}
.plates img {
    border-radius: 50%;
    width: 120px;
    height:100px;
}
.header-plat{
    display: flex;
    flex-direction:column ;
    justify-content: center;
    gap:10px;
   align-content: center;
   align-items: center;


}
.body{
    gap:30px;
}
.card-plat{
    display: flex;
    gap:30px;
}
.plates h2{
    font-size: small;
    text-align: left;
    font-size: 18px;
    font-weight: bold;
    color: #707070;
}
</style>