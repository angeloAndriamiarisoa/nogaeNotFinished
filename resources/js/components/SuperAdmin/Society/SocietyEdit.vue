<template>
    <h1>UPDATE {{society.id}}</h1>
    <template v-for="error in errors" :key="error">
        <p>{{error}}</p>
    </template>
    <form @submit.prevent="saveSociety">
        <div>
            <label for="name">Name</label><br>
            <input type="text" name="name" id="" v-model="society.name"><br>
        </div>
        <div>
            <label for="address">Address</label><br>
            <input type="text" name="address" id="" v-model="society.address"><br>
        </div>
        <button>ENREGISTER</button>
    </form>
</template>

<script>
import { onMounted } from 'vue';
import useSociety from '../../../services/societyservices'
export default {
    props : {
        id: {
            required: true,
            type: String
        }
    },
    setup(props){
        const { getSociety, society, updateSociety, errors } = useSociety();

        onMounted(getSociety(props.id));

        const saveSociety = async () => {
            await updateSociety(props.id);
        }
        return {
            society,
            saveSociety,
            errors
        }

    }
}
</script>