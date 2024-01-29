import { ref,computed } from "vue"
import { defineStore } from "pinia";


export const AuthStore=defineStore('auth',()=>{

    const token=ref(localStorage.getItem('token')??null);
    const isauth=ref(localStorage.getItem('token')&&localStorage.getItem('user'));
    const user=ref(JSON.parse(localStorage.getItem('user'))??null);
    const role=ref(JSON.parse(localStorage.getItem("role"))??null);

    const getToken=computed(()=>token.value);
    const getisauth=computed(()=>isauth.value);
    const getuser=computed(()=>user.value);
    const getRole=computed(()=>role.value);

    function login(t,u,r){
        token.value=t;
        isauth.value=true;
        role.value=r;
        user.value=u;
        localStorage.setItem('token',t);
        localStorage.setItem('isauth',true);
        localStorage.setItem('role',JSON.stringify(r));
        localStorage.setItem('user',JSON.stringify(u));
        location.reload();
    }

    function logout(){
        token.value=null;
        isauth.value=false;
        role.value=null;
        user.value=null;
        localStorage.removeItem('token');
        localStorage.removeItem('isauth');
        localStorage.removeItem('role');
        localStorage.removeItem('user');
        location.reload();
    }

    return {login,logout,token,user,isauth,role,getToken,getRole,getisauth,getuser}
  
})

    