<template>
    <div class="container">
        <h1 class="mb-4">Edit a User</h1>

        <div  v-if="errors.length !== 0">
            <template v-for="error in errors" :key="error">
                <p  class="alert alert-danger" role="alert">{{error}}</p>
            </template>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control"  v-model="user.name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control"  v-model="user.email">
        </div>
        <!-- <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control"  v-model="user.password">
        </div> -->
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" v-model="user.address">
        </div>
        <button class="btn btn-primary" @click="saveUser">ENREGISTER</button>

    </div>
</template>

<script>
import { onMounted } from 'vue';
import useUser from '../../../services/usersServices.js';
export default {
    props:{
        id:{
            required: true,
            type: String
        }
    },
    setup (props) {
        const { getUser, user, updateUser, errors} = useUser();

        onMounted(getUser(props.id));
        
        const saveUser = async () => {
            await updateUser(props.id); 
            
        }

        return {
            saveUser,
            errors,
            user
        }
    }

}
</script>
