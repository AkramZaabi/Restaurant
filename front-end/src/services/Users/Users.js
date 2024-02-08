import Axios from "axios";


export default {
    GetUsers()
    {
        return  Axios.get("/GetUsers");
    },
    DeleteUser(id)
    {
       return  Axios.delete("/DeleteUser/"+id);
    },
    GetResponsables()
    {
        return Axios.get("/GetResponsables");
    },


}