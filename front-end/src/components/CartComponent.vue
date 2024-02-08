<template>
  <section class="h-100 h-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5" v-if="cart">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">Restaurant Cart</h1>
                      <h6 class="mb-0 text-muted">
                        {{ cartLength + " items" }}
                      </h6>
                    </div>
                    <hr class="my-4" />

                    <div class="row mb-4 d-flex justify-content-between align-items-center"
                      v-for="(plat, index) in cart.plats" :key="index">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <img class="mt-2 ms-2" :src="'http://localhost:8000/storage/' + plat.photo" width="50px" />

                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-muted">{{ plat.nom }}</h6>
                        <h6 class="text-black mb-0">

                        </h6>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button class="btn btn-link px-2 quantity" id="increase"  @click="decrementquantity(index)">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-dash-square" viewBox="0 0 16 16">
                            <path
                              d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                          </svg>
                        </button>

                        <input :id="plat.id" min="0" name="quantity" :value="plat.quantite" type="number"
                          class="form-control form-control-sm" />

                        <button class="btn btn-link px-2 quantity" @click="incrementquantity(index)">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path
                              d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path
                              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                          </svg>
                        </button>
                      </div>

                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1" style="
                            display: flex;
                            justify-content: space-between;
                            align-content: center;
                          ">
                        <h6 class="mt-2">{{ "€ " + plat.prix }}</h6>
                        <button class="ms-2 btn btn-danger px-2" id="delete" @click="deletefromcart(index)">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                              d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                            <path
                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                          </svg>
                        </button>
                      </div>
                      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      </div>
                    </div>
                    <hr class="my-4" />
                    <hr class="my-4" />

                    <div class="pt-5">
                      <h6 class="mb-0">
                        <router-link to="/product"><a href="#!" class="text-body"><i
                              class="fas fa-long-arrow-alt-left me-2"></i>Back
                            to shop</a></router-link>
                      </h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4" />

                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">items {{ cartLength }}</h5>
                      <h5></h5>
                    </div>

                    <h5 class="text-uppercase mb-3">Shipping</h5>

                    <div class="mb-4 pb-2">
                      <select class="select">
                        <option value="1">Standard-Delivery- €5.00</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                      </select>
                    </div>

                    <h5 class="text-uppercase mb-3">Give code</h5>

                    <div class="mb-5">
                      <div class="form-outline">
                        <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplea2">Enter your code</label>
                      </div>
                    </div>

                    <hr class="my-4" />

                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      <h5>0</h5>
                    </div>

                    <button @click="checkout()" type="button" id="checkout" class="btn btn-dark btn-block btn-lg"
                      data-mdb-ripple-color="dark">
                      Checkout
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
  
<script>
import { AuthStore } from "@/store/auth.js"
import commande from "@/services/product_manipulation/commande"
import ProductServices from "@/services/product_manipulation/product_add";
export default {
  name: "CartPurchase",
  created() {
    this.getplats();
  },
  setup() {
    const store = AuthStore();
    return { store }
  },
  data() {
    return {
      cart:{
        plats:[],
      },
    };
  },

  computed: {
    cartLength() {
      return this.cart.plats.length;
    },
    prixtotal() {
      let total = 0;

      this.cart.forEach((product) => {
        total += product.colors[product.selected].inStock * product.price;
      });

      // Return the formatted total price
      return "€ " + total.toFixed(2);
    },
  },
  methods: {
    getplats() {
      const list = localStorage.getItem("plats");
      let productList = JSON.parse(list) || [];
      this.cart.plats = productList;
      console.log(this.cart);
    },
    show(plat) {
      console.log(plat);
    },
    checkout() {
      let user = this.store.user;
      this.cart.user = user;
      console.log(this.cart.plats);
      let confirm = 1 ;
      for (let i = 0; i < this.cart.plats.length; i++) {
       if((this.cart.plats[i].quantite==0)){
          alert("check  quantity please !!") ; 
          confirm = 0;
        }
      }
      if(confirm)
      {
        commande.add_commande(this.cart).then((res) => {
            console.log(res.data.data);
          })
          localStorage.removeItem('plats');
          this.$router.push({ name: "home" });
      }
    },
    decrementquantity(index) {

      if (this.cart.plats[index].quantite) this.cart.plats[index].quantite--;
      console.log(this.cart.plats);
    },
    incrementquantity(index) {

      if (this.cart.plats[index].quantite<30) this.cart.plats[index].quantite++;
    },
    deletefromcart(index)
    {
      this.cart.plats.splice(index,1);
    }

  },
};
</script>
<style>
#increase {
  width: 30px;
  height: 30px;
}
#checkout{
  width: 120px;
  font-size: smaller;
}
#delete {
  width: 50px;
  height: 50px;
}

.quantity {
  width: 50px;
  height: 50px !important;
}

@media (min-width: 1025px) {
  .h-custom {
    height: 100vh !important;
  }
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
  font-size: 1rem;
  line-height: 2.15;
  padding-left: 0.75em;
  padding-right: 0.75em;
}

.card-registration .select-arrow {
  top: 13px;
}

.bg-grey {
  background-color: #eae8e8;
}

.quantity {
  width: 50px;
  height: 50px !important;
}

@media (min-width: 992px) {
  .card-registration-2 .bg-grey {
    border-top-right-radius: 16px;
    border-bottom-right-radius: 16px;
  }
}

@media (max-width: 991px) {
  .card-registration-2 .bg-grey {
    border-bottom-left-radius: 16px;
    border-bottom-right-radius: 16px;
  }
}
</style>
  