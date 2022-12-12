<template>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="container"> 
                <p>Name : {{user.name}}</p>
                <p>Password : *********************************</p>
            </div>
        </div>
        <div class="col">
            <div class="container">
                <div class="mb-3">
                    <label for="" >Name:</label><br>
                    <input type="text" v-model="form.user">
                </div>
                <div class="mb-3">
                    <label for="" >New Password:</label><br>
                    <input type="text" v-model="form.newpassword">
                </div>
                <div class="mb-3">
                    <label for="">Confirm Password:</label><br>
                    <input type="password" v-model="form.confirmpassword">
                </div>
                <div class="mb-3">
                    <label for="">Confirm Password:</label><br>
                    <input type="password" v-model="form.currentpassword">
                </div>
                <button class="btn btn-primary" @click="storeAssignment()">ENREGISTER</button>
            </div>
        </div>
    </div>
</div>
        {{user}}
</template>

<script>
import { onMounted } from '@vue/runtime-core';
import useUser from '../services/usersServices'
export default {
    setup() {
        const form = {
            user : 'sd',
            newpassword : '',
            confirmpassword : '',
            currentpassword : '',
        }
        const { getCurrentUser, user} = useUser();
        onMounted(getCurrentUser());

        return {
            form,
            user
        }
    },
}
</script>

