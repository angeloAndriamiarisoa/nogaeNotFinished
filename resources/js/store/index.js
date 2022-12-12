import { createStore } from "vuex";
import axios from "axios";
import router from "../router";
import axiosClient from "../axios/index.js";


const store = createStore({
        state: {
            user: {
                data: localStorage.getItem('user'),
                token: localStorage.getItem('token'),
                role: localStorage.getItem('role'),
                errors: {}
            }
        },
        getters:{
            token(state){
                return state.user.token
            },
            userData(state){
                return state.user.data
            },
            role(state){
                return state.user.role
            },
            errors(state){
                return state.user.errors
            }
        },
        mutations: {
            SET_ERRORS(state, data){
                state.user.errors= data;
            }
        },
        actions: {     
             getToken({ commit, store }, data){
                // axiosClient.post('/api/login',data);
                axios.get('/sanctum/csrf-cookie');
                axiosClient.post('/api/login',data)
                // await axios.post('/api/login',data)
                .then( response => {
                    if(typeof(response.data.error) === 'undefined') {
                        localStorage.setItem('token', response.data.token);
                        localStorage.setItem('role', response.data.userData.role);
                        localStorage.setItem('userid', response.data.userData.id);
                        localStorage.setItem('username', response.data.userData.name);
                        localStorage.setItem('usermail', response.data.userData.email);

                        // localStorage.setItem('user', JSON.stringify(response.data.userData));   
                        localStorage.setItem('society', response.data.userData.society_id);
                        if(response.data.userData.role === 0){
                            router.push({name: 'user'});
                        }
                        if(response.data.userData.role === 1){
                            router.push({name: 'admin'});
                        }   
                        if(response.data.userData.role === 2){
                            router.push({name: 'superadmin'});
                        }
                    }   
                    else{
                        commit('SET_ERRORS', response.data.error);      
                    }
                });
            },
    
            async logOut(){
                await axios.post('/api/logout')
                .then( response => {
                    localStorage.removeItem('token');
                    localStorage.removeItem('role');
                    localStorage.removeItem('society');
                    router.push({name: 'login'});
                })
                .catch(error => console.log(error));
            }
        }

    
});

export default store;