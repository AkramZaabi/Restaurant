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
                    <button class="btn buy">add to cart</button>
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

    },
    data()
    {
        return  {

            plats:[],

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

    }


}

</script>

<style scoped>
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