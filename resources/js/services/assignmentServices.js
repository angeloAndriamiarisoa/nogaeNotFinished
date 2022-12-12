import axios from "axios"
import { get } from "lodash";
import { ref } from "vue";
import swal from "sweetalert";
import Swal from 'sweetalert2';

export default function useAsssignment () {
    const error = ref('');

    const assignments = ref([]);

    

    /**
     * Assigns a task in a project that is in a society,
     * S for society,
     * P for project,
     * T for task
     * @param {Object} data 
     */
    const createSPT = async (data) => {
        try {
            await axios.post('/api/assignment', data);
        } catch (e) {
            error.value = e.response.data.error;
        }
        
    }

    /***
     * Assign a task without user to a user
     * 
     * @param {Object} data
     * 
     */
    const assigntaskWtoUser =  async (data) => {
            await axios.put('/api/assign-user', data);
    }

    /**
     * Update status 
     * 
     * @param {string} status_id current status
     * @param {Objet} data 
     */
    const updateStatus = async (status_id = 0, data) => {
        await axios.put('/api/update-status/' + status_id, data);
    }

    /**
     * Get list of task assigned to a user in a project in a society
     * 
     * @param {String|int} society_id 
     * @param {String|int} project_id 
     * @param {String|int} task_id 
     */
    const getUserAssignedTask = async (task_id) =>  {
        let response = await axios.get('/api/userAssignedTask/' + task_id);    
        assignments.value = response.data.data;
    }
    /**
     * Get list of assigned task in society
     * 
     */
    const getAssignments = async () => {
        let response = await axios.get('/api/list-assignments');
        assignments.value = response.data.data;
    }
    /**
     * Get list of unassigned task in society
     * 
     */
    const getUnassignedTasks = async () => {
        let response = await axios.get('/api/unassigned-task');
        assignments.value = response.data.data
    }

    /**
     * Get list assignments filtered per status
     * 
     * @param {String|number} status 
     */
    const getAssignmentsFiltered = async (status) => {
        let response = await axios.get('/api/assign-filter/' + status);
        assignments.value = response.data.data
    }
    



    return {
        createSPT, 
        updateStatus,
        getUserAssignedTask,
        getAssignments,
        getUnassignedTasks,
        assignments,
        error,
        assigntaskWtoUser,
        getAssignmentsFiltered,

    }
}