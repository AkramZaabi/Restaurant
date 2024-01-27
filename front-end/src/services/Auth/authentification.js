import Axios from "axios";
import {AuthStore} from "../../store/auth"
export default {
  
  
    async login(email,password){
        const store=AuthStore();
        const response=await Axios.post("/login",{email,password});
        if(response.status==200){
            store.login(response.data.data.token,response.data.data.user,response.data.data.user['role']);
        }else{
            store.logout();
        }

    },
    signup(user){

        let data=new FormData();
        data.append("name",user.name);
        data.append("photo",user.photo);
        data.append("email",user.email);
        data.append("password",user.password);
        data.append("lastname",user.Lastname);
        data.append("date",user.date);
        data.append("adresse",user.adresse);
        data.append("tel",user.tel);

        const config={
            Headers:{
                "content-Type":"multipart/form-data"
            }
        }

        return Axios.post("/SignUp",data,config);
 
    }
}