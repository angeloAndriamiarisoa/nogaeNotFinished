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
                <p v-for="user in usersFound" :key="user.id">
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
import useSearch from '../../../services/various/searchServices.js';
import useAsssignment from '../../../services/assignmentServices.js';
import router from '../../../router/index.js';  
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
            society_id: '',
            project_id: '',
            task_id: '',
            user_id: '',
            person:'',
        });   
        const { errors,  getTask, task } = useTask();

        const { createSPT, GetListTaskAssignmentsInProjectInSociety, assignments, error} = useAsssignment();

        const { searchUser, usersFound } = useSearch();

        onMounted(() => {
            GetListTaskAssignmentsInProjectInSociety(localStorage.getItem('society'), props.id, props.actuel_task_id)
            getTask(props.actuel_task_id);
        })

        const storeAssignment = async (id_user) => {
            form.society_id = localStorage.getItem('society');
            form.project_id = props.id;
            form.task_id = props.actuel_task_id;
            form.user_id = id_user;
            form.person = '';


            await createSPT({...form});
            await GetListTaskAssignmentsInProjectInSociety(localStorage.getItem('society'), props.id, props.actuel_task_id);
            usersFound.value = "";  
        }

        const searchPerson = async () => {
            if(form.person)
            {
                await searchUser(form.person, localStorage.getItem('society'));
                return;
            }
            usersFound.value = "";
        }

        const redirect = () => {
            router.push({name : 'admin'})
        }

        return {
            form,
            storeAssignment,
            errors,
            searchPerson,
            usersFound,
            assignments,
            task,
            error,
            redirect
        }
    }
}
</script>