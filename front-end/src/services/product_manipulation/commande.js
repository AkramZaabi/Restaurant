import Axios from "axios";



export default {

    add_commande(commande) {



        let data = new FormData();
        data.append("id_user", commande.user.id);
        data.append("Lieu", commande.user.addresse);
        data.append("plats", JSON.stringify(commande.plats));

        return Axios.post("/AddCommande", data);

    }



}