<template>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1 class="mb-4">Create a task</h1>
                <template v-if="error !== ''">
                    <p class="alert alert-danger" role="alert">{{error}}</p>
                </template>
                <div  v-if="errors.length !== 0">
                    <template v-for="error in errors" :key="error">
                        <p  class="alert alert-danger" role="alert">{{error}}</p>
                    </template>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" v-model="task.name" disabled>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="" rows="3" v-model="task.description" disabled></textarea>
                </div>
                <div class="mb-3">
                    <label for="person" class="form-label">Person for the task</label>
                    <input type="text" class="form-control" id="" @keyup="searchPerson" v-model="form.person"> 
                </div>
                <p v-for="user in users" :key="user.id">
                    {{user.name}}
                    <button class="btn btn-primary" @click="storeAssignment(user.id)">ENREGISTER</button>
                </p>
                <!-- <button class="btn btn-primary" @click="storeAssignment">ENREGISTER</button> -->
            </div>
            <div class="col-sm">
                <h1 class="mb-4">Assignment</h1>
                    <template v-for="assignment in assignments" :key="assignment.id">
                        <p class="alert alert-success" role="alert">Project: {{assignment.project}} ---- Task: {{assignment.task}} ---- Person : {{assignment.user}}</p>
                        <hr>
                    </template>
                <button class="btn btn-primary" @click="redirect    ">TERMINER</button>
            </div>
        </div>
    </div>
</template>

<script>
import { onMounted, reactive } from 'vue';
import useTask from '../../../services/taskservices.js';
import useAsssignment from '../../../services/assignmentServices.js';
import router from '../../../router/index.js';  
import useUser from '../../../services/usersServices.js';
export default {
    props: {
        id : {
            required: true
        },
        actuel_task_id : {
            required : true
        },
    },
    setup(props) {
        const form = reactive({
            project_id: '',
            task_id: '',
            user_id: '',
            person: ''
        });  

        const { errors,  getTask, task } = useTask();

        const { createSPT, getUserAssignedTask, assignments, error} = useAsssignment();

        const { searchUser, users} = useUser();

        onMounted(() => {
            getUserAssignedTask(props.actuel_task_id)
            getTask(props.actuel_task_id);
        });

        const storeAssignment = async (id_user) => {
            form.society_id = localStorage.getItem('society');
            form.project_id = props.id;
            form.task_id = props.actuel_task_id;
            form.user_id = id_user;


            await createSPT({...form});
            await getUserAssignedTask(props.actuel_task_id);
            users.value = '';  
            form.person = '';
        }

        const searchPerson = async () => {
            if(form.person)
            {
                await searchUser(form.person);
                return;
            }
            users.value = "";
        }

        const redirect = () => {
            router.push({name : 'admin'})
        }

        return {
            form,
            storeAssignment,
            errors,
            searchPerson,
            users,
            assignments,
            task,
            error,
            redirect
        }
    }
}
</script>