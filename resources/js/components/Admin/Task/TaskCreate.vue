<template>
    <div class="container">
        <div class="row">
            <div class="col-sm">
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
                <!-- <div class="mb-3">
                    <label for="person" class="form-label">Person for the task</label>
                    <div style="display: flex;">
                        <input type="text" class="form-control" id="" @keyup="searchPerson" v-model="form.person"> 
                        <button @click="storeTaskWithAssign"><h1>+</h1></button>
                    </div>  

                </div> -->
                <!-- <p v-for="user in usersFound" :key="user.id">
                    {{user.name}}
                </p> -->
                <button class="btn btn-primary" @click="storeTaskWithoutAssign">ENREGISTER sans</button>
                <button class="btn btn-primary" @click="storeTaskWithAssign">ENREGISTER avec utilisateur</button>
            </div>
            <!-- <div class="col-sm">
                <h1 class="mb-4">Assignment</h1>
                    <template v-for="assignment in assignments" :key="assignment.id">
                        <p class="alert alert-success" role="alert">Project: {{assignment.project}} ---- Task: {{assignment.task}} ---- Person : {{assignment.user}}</p>
                        <hr>
                    </template>
            </div> -->
        </div>
    </div>
</template>

<script>
import { reactive } from 'vue';
import useTask from '../../../services/taskservices.js';
import useAsssignment from '../../../services/assignmentServices.js';
import router from '../../../router/index.js';
export default {
    props: {
        id : {
            required: false
        }
    },
    setup(props) {
        const form = reactive({
            name : '',
            description : '',
            project_id: '',
            task_id: ''
        });   
        const {createTask, errors, lastTask } = useTask();
        
        const { assignments, createSPT } = useAsssignment();
        
        const clear = () => {
            form.name = '';
            form.description = '';
        }

        const storeTaskWithoutAssign = async () => {
            form.project_id = props.id;
            await createTask({...form});
            form.task_id = lastTask.value;
            await createSPT({...form});
            clear();
            if(errors.length === 0){
                 router.push({name : 'list.tasks.admin'});
            }
        }

        const storeTaskWithAssign = async () => {
            form.project_id = props.id;
            await createTask({...form});
            clear();
            router.push({name : 'create.assignment.admin', params : {id : props.id, actuel_task_id: lastTask.value }})
        }

        return {
            form,
            storeTaskWithoutAssign,
            errors,
            // searchPerson,
            // usersFound,
            assignments,
            storeTaskWithAssign,
        }
    }
}
</script>