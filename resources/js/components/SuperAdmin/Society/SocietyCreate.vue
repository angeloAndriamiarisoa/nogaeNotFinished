<template>
    <template v-for="error in errors" :key="error">
        <p>{{error}}</p>
    </template>
    <form @submit.prevent="storeSociety">
        <div>
            <label for="name">Name</label><br>
            <input type="text" name="name" id="" v-model="form.name"><br>
        </div>
        <div>
            <label for="address">Address</label><br>
            <input type="text" name="address" id="" v-model="form.address"><br>
        </div>
        <button>ENREGISTER</button>
    </form>
</template>

<script>
import { reactive } from 'vue';
import useSociety from '../../../services/societyservices'
export default {
    setup(){
        const form = reactive({
            name: '',
            address: ''
        })
        const { createSociety, errors } = useSociety();

        const storeSociety = async () => {
            createSociety({...form});
        }  
        
        return {
            form,
            storeSociety,
            errors
        }
    }
}
</script>