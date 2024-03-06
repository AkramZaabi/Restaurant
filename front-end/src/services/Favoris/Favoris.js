import Axios from "axios";


export default{

    GetFavrois(id)
    {
        return Axios.get('/Get_favoris/'+id);
    }


}