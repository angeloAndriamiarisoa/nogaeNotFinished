<template>

 <!-- create button -->
 <div class="">
  <button class="bg-white font-semibold py-2 px-4 border border-gray-400 relative rounded hover:shadow-lg hover:shadow-blue-500/50 shadow-md mt-3 ml-4 ">
      <router-link  class="flex text-blue-500 hover:text-blue-600" :to="{name: 'create.project.admin'}">
        <p class="my-auto ml-2">
          New project
        </p>
        <lottie-player src="https://assets1.lottiefiles.com/temp/lf20_e5HyuA.json"  background="transparent"  speed="1"  style="width: 50px; height: 50px;"  loop   autoplay></lottie-player>
      </router-link>
      
    </button>
    
    <!-- /create button -->

  <!-- search -->
  <div class="flex justify-end ">
      <img src="../../../../icons/search.svg" alt="">
			<input type="text" @keyup="searchProject" v-model="projectToSearch"  name="search" id="" class=" bg-transparent border-l-0 border-r-0 border-t-0 border-b-0 border-gray-300 appearance-none focus:outline-none focus:ring-0  focus:border-blue-600 peer w-40  " placeholder="Search...  ">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
</svg>


  </div>
    </div>

  <!-- /search -->
  <div class="flex flex-col">
  <div class="overflow-x-auto">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  #
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Name
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-2 py-2 text-left">
                  Description
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                 
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
               
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
                  <template v-for="project in projects" :key="project.id">
                      <tr class="bg-white border-b">
                          <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                              {{project.id}}
                          </td>
                          <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                              {{project.name}}
                          </td>
                          <td class="text-sm text-gray-900 font-light px-2 py-2">
                              {{project.description}}
                          </td>
                          <td class="text-sm text-gray-900 font-light px-2 py-4 w-6">
                            <router-link :to="{name: 'create.task.admin', params : { id : project.id }}" class="flex" title="Add task">
                              <!-- <img src="../../../../icons/task-list.svg" class="w-6" alt=""> -->
                              <img src="../../../../icons/addd.svg" class="w-6" alt="">
                            </router-link>                                                   
                          </td> 
                          <td class="text-sm text-gray-900 font-light px-2 py-4 w-6">
                            <router-link :to="{name: 'description.project.admin', params : { id : project.id }}" class="flex" title="Task list">
                             
                             <img src="../../../../icons/task-list.svg" class="w-6" alt="">
                            </router-link>                                                   
                          </td>   
                        
                            <td class="text-sm text-gray-900 font-light px-4 py-6 flex">
                              <router-link :to="{name: 'edit.project.admin', params:{ id : project.id}}" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                  </router-link>  
                              <svg @click="deleteProject(project.id)" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400 cursor-pointer" fill="none"  viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        title="Delete"   d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                            </td>
                      </tr>
                  </template>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import { onMounted, ref } from 'vue';
import useProject from '../../../services/projectServices';

export default {
    name: 'ProjectIndex',
    setup() {
        const projectToSearch = ref('');
        const { destroyProject, getProjectsAdmin, projects, searchAdmin } = useProject();

        onMounted(getProjectsAdmin());
        
        const deleteProject = async (id) => {
          await destroyProject(id);
          await getProjectsAdmin();
        }

        const searchProject = async () => {
          if(projectToSearch.value.trim() !== ''){
            await searchAdmin(projectToSearch.value.trim());
          }
          else {
            getProjectsAdmin();
          }

        }
        return {
            projects,
            deleteProject,
            projectToSearch,
            searchProject
        }
    }

}
</script>