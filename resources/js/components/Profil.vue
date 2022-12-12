<template>
    <div class="container mt-4">
        <h1 class="h1">Profil de l'utilisateur {{user.id}}</h1>
        <h2 class="h2">Name : {{user.name}}</h2>
        <h2 class="h2"> <span v-if="(user.role === 0)">Employee</span><span v-if="(user.role === 1)">Admin</span> to {{society.name}}</h2>
        <h2 class="h4">Address : {{user.address}}</h2>
        <h2 class="h4">Mail : {{user.email}}</h2>
        <h2 class="h4">Password : ***********************{{user.role}}</h2>
        <!-- <router-link :to="{name : 'update.profile.admin'}" style="text-decoration:underline">Change Password</router-link> -->
        <router-link v-if="(user.role == 0)" :to="{name : 'update.profile.user', params : { id : user.id }}" style="text-decoration:underline">Change Password</router-link>
        <router-link v-if="(user.role == 1)" :to="{name : 'update.profile.admin', params : { id : user.id }}" style="text-decoration:underline">Change Password</router-link>
    </div>
    

</template>

<script>
import { onMounted } from '@vue/runtime-core'
import useUser from '../services/usersServices';
import useSociety from '../services/societyservices';

export default {
    setup() {
        const { getUser, user, getCurrentUser} = useUser();
        const { getSociety, society} = useSociety();
        onMounted(() => {
            // getUser(localStorage.getItem('userid'))
            getCurrentUser();
            getSociety(localStorage.society);
        } );

        return {
            user,
            society
        }
    },
}
</script>