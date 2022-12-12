<template>
    <div class="container mt-5">
        <h1 class="mb-4">Assignment of task</h1>
        <div class="row">
        <div class="col">
                <div class="container">
            <div class="mb-3">
                <label for="name" class="form-label">Project</label>
                <input type="text" class="form-control" id="" v-model="form.idProject">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Task</label>
                <input type="text" class="form-control" id="" v-model="form.idTask">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Employee</label>
                <input type="text" class="form-control" id="" v-model="form.employee">
            </div>
            <button class="btn btn-primary" @click="storeAssignment()">ENREGISTER</button>
        </div>
        </div>
        <div class="col">
            <div class="container">
                ehll
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import axios from 'axios';
import { reactive } from 'vue';

export default {
    props : {
        idTask : {
            required : true
        }
    },
    setup (props) {
        const form = reactive({
            idProject: '',
            idTask: '',
            employee: ''
        });
        console.log(form);
        const storeAssignment = async () => {
            let response = await axios.post('/api/assignment', {...form});
            console.log(response)
        }
    return {
        storeAssignment,
        form
    }
    }
}
</script>