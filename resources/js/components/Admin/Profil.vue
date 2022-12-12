<template>
    <h1 class="h1">Profil de l'utilisateur {{user.id}}</h1>
    <h2 class="h2">Name : {{user.name}}</h2>
    <h2 class="h2"> <span v-if="(user.role === 0)">Employee</span><span v-if="(user.role === 1)">Admin</span> to {{society.name}}</h2>
    <h2 class="h4">Address : {{user.address}}</h2>
    <h2 class="h4">Mail : {{user.email}}</h2>
    <h2 class="h4">Password : ***********************</h2>
    <p style="text-decoration:underline">Change Password</p>

</template>

<script>
import { onMounted } from '@vue/runtime-core'
import useUser from '../../services/usersServices'
import useSociety from '../../services/societyservices';
export default {
    setup() {
        const { getUser, user } = useUser();
        const { getSociety, society} = useSociety();
        onMounted(() => {
            getUser(localStorage.getItem('userid'))
            getSociety(localStorage.society);
        } );

        return {
            user,
            society
        }
    },
}
</script>