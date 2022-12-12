<template>
    <div class="container">
        <h1 class="h1">her mail please</h1>
        <input type="mail" v-model="data.email"><br><br> 
        <button class="btn btn-danger" @click="reset()">Send</button>
    </div>
</template>
<script>
import { reactive, ref } from '@vue/reactivity'
export default {
    setup() {
        // const email = ref('');
        const data = reactive({
            email : ''
        })
        const reset = () => {
            axios.post('/api/reset-and-mail',data);
        }

        return {
            data,
            reset
        }
    },
}
</script>