import axios from "axios"
import { reactive, ref } from "vue";
import { useRouter } from 'vue-router';
import swal from "sweetalert";
import Swal from 'sweetalert2';

export default function useProject () {
    const projects = ref([]);

    const errors = ref([]);

    const project = ref([]);

    const projectDone = ref([]);

    const router = useRouter();

  //-------FOR ADMIN

    /**
     * take on all the projects
     */
    const getProjects = async () => {
        let response = await axios.get('/api/project');
        projects.value = response.data.data;
    }

    /**
     * take on all the projects in a society
     */
    const getProjectsAdmin = async () => {
      let response = await axios.get('/api/admin/project');
      projects.value = response.data.data.projects;
  }

    /**
     * take the project to update
     * 
     * @param {String} id L'identifiant du  projet à modifier
     */
    const getProject = async (id) => {
      let response = await axios.get('/api/project/'+ id);
      project.value = response.data.data
    }
    
    /**
     * create a new project
     * 
     * @param {Object} data name, description
     */
    const createProject = async (data) => {
        errors.value = [];
        try {
          let response = await axios.post('/api/project', data);
          router.push({name : 'create.task.admin', params : { id : response.data.data.project.id }})

        } catch (error) {
          const errorsCreateProject = error.response.data.errors;
          console.log(errorsCreateProject)
          for(let key in errorsCreateProject){
            errors.value.push(errorsCreateProject[key][0]);
          }
        }
        
    }
    /**
     * Update a project
     * 
     * @param {String|Number} id id of the project to update
     */
    const updateProject = async (id) => {
      errors.value = [];
      try {
        await axios.put('/api/project/' + id, project.value);
      } catch (error) {
        const projectUpdateErrors = error.response.data.errors; 
        for(let key in projectUpdateErrors){
          errors.value.push(projectUpdateErrors[key][0]);
        }
      }
    }

    /**
     * Delete a project 
     * 
     * @param {String|Number} id id of the project to update
     */
    const destroyProject = async (id) => {
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this user!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
         axios.delete('/api/project/' + id);
          swal("Poof! User has been deleted!", {
            icon: "success", 
            timer: 1000,
            buttons: false      
          });
          getProjectsAdmin(localStorage.getItem("society"));
        } else {
          swal("User is safe!");

        }
      });
    } 

    /**
     * Get all project for a project
     */
    const getUserProject = async () => {
      let response = await axios.get('/api/user-project');
      projects.value = response.data.data;
    }

    /**
     * Search for one or more projects by name in a society
     * 
     * @param {string} name name of project to search
     * @param {string} society_id id of society 
     */
    const searchAdmin = async (name) => {
      let response = await axios.get('/api/admin/search-project/' + name);
      projects.value = response.data.data;
    }

    /**
     *  Takes the total of the projects done
     */
    const getCountProjectDone = async () => {
      let response = await axios.get('/api/total-project-done');
      projectDone.value = response.data.data;
    } 
    /**
     * Search project(s) for super admin
     * 
     * @param {String} toSearch 
     */
    const searchProjectSuper = async (toSearch) => {
        let response = await axios.get('/api/sa/search-project/' + toSearch);
        projects.value = response.data.data;
    }
    return {
      getProjects,
      getProjectsAdmin,
      projects,
      createProject,
      errors,
      getProject,
      project, 
      updateProject,
      destroyProject,
      getUserProject,
      searchAdmin,
      getCountProjectDone,
      projectDone,
      searchProjectSuper
    }
    
}