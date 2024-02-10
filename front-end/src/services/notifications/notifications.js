import Axios from "axios";

export default{

            Getnotifications(id)
            {

                return  Axios.get("MyNotifications/"+id);
            }


}