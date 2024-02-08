import Axios from "axios";



export default {

    add_commande(commande) {



        let data = new FormData();
        data.append("id_user", commande.user.id);
        data.append("Lieu", commande.user.addresse);
        data.append("plats", JSON.stringify(commande.plats));

        return Axios.post("/AddCommande", data);

    },
    get_commandes(id)
    {
        return Axios.get("/GetCommande/"+id);
    },
    get_all_commandes()
    {
        return  Axios.get("/GetLivraisons");
    },
    update_commande(id)
    {
        
        return Axios.put("/ConfirmCommande/"+id);
    },
    reject_commande(id)
    {
        
        return Axios.put("/AnnulerCommande/"+id);
    }



}