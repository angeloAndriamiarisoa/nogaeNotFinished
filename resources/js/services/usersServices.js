import { ref } from "vue";
import { useRouter } from "vue-router";
import 'flowbite';
import swal from "sweetalert";
import Swal from 'sweetalert2';

export default function useUser(){
    const users = ref([]);

    const user = ref([]);

    const errors = ref([]);

    const router = useRouter();

    /**
     * take on all the users
     */
    const  getUsers = async () => {
        let response = await axios.get('/api/user');
        users.value = response.data.data;
    }

    /**
     * take on all the users in a society
     * 
     */
    const getUsersAdmin =  async () => {
        let response = await axios.get('/api/admin/user');
        users.value = response.data.data.users;
    }

    /**
     * take the user to update
     * 
     * @param {String} id 
     */
    const getUser = async (id) => {
        let response = await axios.get('/api/user/' + id);
        user.value = response.data.data
    }

    /**
     * take the current user 
     * 
     */
    const getCurrentUser = async () => {
            let response = await axios.get('/api/current-user');
            user.value = response.data.data
    }
    
    const createUser = async (data) => {
        errors.value = [];
        try{
            await axios.post('/api/user', data);
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              });
         
            setTimeout(()=>{router.push({name:'list.users.admin'})},1000)
        }
        catch(error)
        {
            const errorCreateUser = error.response.data.errors
            for(let key in errorCreateUser)
            {
                errors.value.push(errorCreateUser[key][0]);
            }
        }
    }

    const updateUser = async (id) => {
        errors.value = [];
        try{
            await axios.put('/api/user/' + id, user.value);
            router.push({ name: 'list.users.admin'});
        }
        catch(error)
        {
            const errorUpdateUser = error.response.data.errors
            for(let key in errorUpdateUser)
            {
                errors.value.push(errorUpdateUser[key][0]);
            }
        }
    }

    const destroyUser = async (id) => {
        // await axios.delete('/api/user/' + id);
        // await getUsers();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this user!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
             axios.delete('/api/user/' + id);
              swal("Poof! User has been deleted!", {
                icon: "success", 
                timer: 1000,
                buttons: false      
              });
              getUsersAdmin(localStorage.getItem("society"));
             
            } else {
              swal("User is safe!");

            }
          });
    }
    /**
     * Search for a user in a society
     * 
     * @param {String} toSearch 
     */
    const searchUser = async (toSearch) => {
        let response = await axios.get('/api/admin/search-user/' + toSearch);
        users.value = response.data.data;
    }

    /**
     * Search user for super admin
     * 
     * @param {String} toSearch 
     */
    const searchUserSuper = async (toSearch) => {
        let response = await axios.get('/api/sa/search-user/' + toSearch);
        users.value = response.data.data;
        console.log(response.data.data)
    }
    
    return {
        getUsers,
        getUsersAdmin,
        getUser,
        users,
        user,
        createUser,
        updateUser,
        destroyUser,
        errors,
        searchUser,
        searchUserSuper,
        getCurrentUser
    }

}