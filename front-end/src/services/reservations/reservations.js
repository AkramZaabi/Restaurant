import Axios from "axios";



export default {

        GetSpecifiqueTables(resto)
        {
               
               
               
               
                let data = new FormData();
                data.append("id", resto.id);
                data.append("Date", resto.date);
               
                return Axios.post('GetSpecifiquesTables',data);
             
        },
        makereservation(reservation)
        {

                let data = new FormData();
                data.append("nbPersonne", reservation.nbPersonne);
                data.append("Date", reservation.Date);
                data.append("table_id",reservation.table_id);
                data.append("id_user",reservation.id_user);
        
                return  Axios.post('AddReservation',data);
        },
        GetReservationResponsable(id)
        {
                return  Axios.get('GetReservationResponsable/'+id);
        },
        Admin_reservations()
        {
                return  Axios.get('AllReservations');
        }


}


