<template>
    <div class="container">
        <h1 class="mb-4">Create a User</h1>

        <div  v-if="errors.length !== 0">
            <template v-for="error in errors" :key="error">
                <p  class="alert alert-danger" role="alert">{{error}}</p>
            </template>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control"  v-model="form.name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control"  v-model="form.email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control"  v-model="form.password">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" v-model="form.address">
        </div>
        <button class="btn btn-primary" @click="storeUser">ENREGISTER</button>

    </div>



</template>

<script>
import { reactive } from 'vue';
import useUser from '../../../services/usersServices.js';
export default {
    setup () {
        const form = reactive({
            name: '',
            email: '',
            address: '',
            password: '',
            role: '',
            society_id: ''
        });

        const { createUser, errors } = useUser();
        const storeUser = async () => {
            form.role = 0;
            form.society_id = localStorage.getItem('society');
            await createUser({...form});    
        };

        return {
            form,
            storeUser,
            errors,
        }
    }

}
</script>
