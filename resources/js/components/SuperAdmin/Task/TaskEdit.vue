<template>
    <div class="container">
        <h1 class="mb-4">Edit a task</h1>

        <div  v-if="errors.length !== 0">
            <template v-for="error in errors" :key="error">
                <p  class="alert alert-danger" role="alert">{{error}}</p>
            </template>
        </div>
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="" v-model="task.name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="" rows="3" v-model="task.description"></textarea>
        </div>
        <button class="btn btn-primary" @click="saveTask">ENREGISTER</button>
    </div>
</template>

<script>
import { onMounted } from 'vue';
import useTask from '../../../services/taskservices'
export default {
    props : {
        id : {
            required : true,
            type: String
        }
    },
    setup(props) {
        const { getTask, task, errors, updateTask} = useTask();

        onMounted(getTask(props.id))

        const saveTask = async () => {
             await updateTask(props.id)
        }

        return{
            task,
            errors,
            saveTask
        }
        
    }
}
</script>