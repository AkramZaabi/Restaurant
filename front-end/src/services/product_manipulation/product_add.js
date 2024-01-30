import Axios from "axios";


export default {
    add_product(product) {
        let data = new FormData();
        data.append("name", product.name);
        data.append("photo", product.photos);
        data.append("prix", product.prix);

        const config = {
            Headers: {
                "content-Type": "multipart/form-data"
            }
        }

        return Axios.post("/AddSupplement", data, config);
    },
     getSupplements() {
         return  Axios.get("/GetSupplement"); // Wait for the promise to resolve
      },
    add_plat(plat)
    {
        console.log("talel");
        console.log(plat);
        let data  = new FormData();
        data.append("name", plat.name);
        data.append("prix",plat.prix);
        data.append("photo",plat.photo);
        data.append("selected_supplements",plat.selected_supplements);

        const config = {
            Headers: {
                "content-Type": "multipart/form-data"
            }
        }

        return Axios.post("/AddPlat",data,config)
    }
      
}

