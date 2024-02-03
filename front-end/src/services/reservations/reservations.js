import Axios from "axios";



export default {

        GetSpecifiqueTables(id)
        {
                return Axios.get('GetSpecifiquesTables/'+id);
             
        }

}


