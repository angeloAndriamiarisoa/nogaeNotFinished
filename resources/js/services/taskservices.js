import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";
import useAsssignment from "./assignmentServices";
import swal from "sweetalert";
import Swal from 'sweetalert2';

export default function useTask () {

    const tasks = ref([]);

    const errors = ref([]);

    const task = ref([]);

    const lastTask = ref('');

    const dataChart = ref([]);


    const router = useRouter();


    /**
     * take on all the tasks
     */
    const  getTasks = async () => {
        let response = await axios.get('/api/task');
        tasks.value = response.data.data;
    }

    /**
     * take on all the tasks in a society

     */
    const getTasksAdmin = async () => {
        let response = await axios.get('/api/admin/task');
        tasks.value = response.data.data.tasks;
    }

    /**
     * take the project to update
     * 
     * @param {String} id L'identifiant du  projet à modifier
     */
    const getTask = async (id) => {
        let response = await axios.get('/api/task/' + id);
        task.value = response.data.data;
    }
    /**
     *  Store/Create task and assignment of the task created
     * 
     * @param {Object} data name, description, project_id
     */
    const createTask = async (data) => {
        errors.value = [];
        try{
            let response = await axios.post('/api/task', data);  
            lastTask.value = response.data.data.task.id 
        }
        catch(error)
        {
            const errorCreateTask = error.response.data.errors;
            for(let key in errorCreateTask)
            {
                errors.value.push(errorCreateTask[key][0]);
            }
        }
    }

    const updateTask = async (id) => {
        errors.value = [];
        try{
            await axios.put('/api/task/' + id, task.value);
        }
        catch(error)
        {
            const errorUpdateTask = error.response.data.errors;
            for(let key in errorUpdateTask)
            {
                errors.value.push(errorUpdateTask[key][0]);
            }
        }
    }

    const destroyTask = async (id) => {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this user!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                axios.delete('/api/task/' + id);
              swal("Poof! User has been deleted!", {
                icon: "success", 
                timer: 1000,
                buttons: false      
              });
              getTasksAdmin(localStorage.getItem("society"));
             
            } else {
              swal("User is safe!");

            }
          });
    }

    /**
     * Search for one or more projects by name in a society
     * 
     * @param {string} name name of project to search
     */
    const searchAdmin = async (name) => {
        let response = await axios.get('/api/admin/search-task/' + name);
        tasks.value = response.data.data;
    }

    /**
     * Get pourcentage done per user in society
     * 
     * @param {String} society_id 
     */
    const getDataUserChart = async () => {
        let response = await axios.get('/api/data-user-chart');
        dataChart.value = response.data.data
    }
    /**
     * Get all tasks for one user
     */
    const getTasksUser = async () => {
        let response = await axios.get('/api/one-user/tasks');
        tasks.value = response.data.data;
    }

    /**
     * Search task(s) for one user
     *
     * @param {String|Number} toSearch 
     */
    const searchTaskUser = async (toSearch) => {
        let response = await axios.get('/api/user/search-task/'+ toSearch);
        tasks.value = response.data.data;
    }

    /**
     *  Get list of tasks for a user into project
     * 
     * @param {String|Number} project_id
     */
    const getTasksIntoProject = async (project_id) => {
        let response = await axios.get('/api/user-task-project/' + project_id);
        tasks.value = response.data.data;
    }
    /**
     * Search a task(s) for super admin
     * @param {String} toSearch 
     */
    const searchSuper = async (toSearch) => {
        let response = await axios.get('/api/sa/search-task/' + toSearch);
        tasks.value = response.data.data;
    }

    /**
     * Get list the tasks assigned to employees in a project
     * 
     * @param {String} society_id 
     * @param {String} project_id 
     */
    const getTaskAssigned = async (project_id, status_id) => {
        let response = await axios.get('/api/task-assigned-project/' + project_id + '/' + status_id);
        tasks.value = response.data.data;
    }



    return {
        getTasks,
        getTasksAdmin,
        tasks,
        createTask,
        lastTask,
        errors,
        getTask,
        task,
        updateTask,
        destroyTask,
        searchAdmin,
        getDataUserChart,
        dataChart,
        getTasksUser,
        searchTaskUser,
        getTasksIntoProject,
        searchSuper,
        getTaskAssigned 
    }
}