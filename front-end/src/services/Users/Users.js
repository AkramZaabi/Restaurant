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
    UpdateUser(user)
    {


        let data = new FormData();
        data.append("id",user.id);
        data.append("name", user.name);
        data.append("photo", user.photo);
        data.append("lastName", user.lastName);
        data.append("password", user.password);
        data.append("email", user.email);
        data.append("tel", user.tel);
        data.append("addresse", user.addresse);



        const config = {
            Headers: {
                "content-Type": "multipart/form-data"
            }
        }






        return Axios.post("/Update_User",data,config);
    }


}