import Axios from "axios";


export default{

    GetFavrois(id)
    {
        return Axios.get('/Get_favoris/'+id);
    },
    Add_favorite(favoris)
    {
        let data = new FormData();
        data.append("user_id", favoris.user_id);
        data.append("plat_id", favoris.plat_id);
        return Axios.post("/Add_favoris", data);
    }


}