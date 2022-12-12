<template>

    <!-- <div id="form">
        <div v-if="errors !== ''">
                    <p>{{errors[0]}}</p>
                    <p>{{errors[1]}}</p>
            </div> -->
        <!-- <form @submit.prevent="storeTask">
            <div>
                <label for="wording">Name of the task : </label>
                <input type="text" name="name" id="" v-model="form.name"> 
            </div>
            <div>
                <label for="wording">Name of the task : </label>
                <textarea name="description" id="" cols="30" rows="4" v-model="form.description"></textarea>     
            </div>
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                    SAVE
            </button>
        </form> -->
    <div class="container">
        <h1 class="mb-4">Create a task</h1>
        <div  v-if="errors.length !== 0">
            <template v-for="error in errors" :key="error">
                <p  class="alert alert-danger" role="alert">{{error}}</p>
            </template>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="" v-model="form.name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="" rows="3" v-model="form.description"></textarea>
        </div>
        <button class="btn btn-primary" @click="storeTask">ENREGISTER</button>
    </div>
    <!-- </div> -->
</template>

<script>
import { reactive } from 'vue';
import useTask from '../../../services/taskservices';
export default {
    props: {
        idProject : {
            required: false
        }
    },
    setup(props) {
        const form = reactive({
            name : '',
            description : ''
        });   
        console.log(props);
        const {createTask, errors} = useTask();
        const storeTask = async () => {
            await createTask({...form});
        }

        return {
            form,
            storeTask,
            errors
        }
    }
}
</script>