<template>
    <!-- <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
        <router-link :to="{name: 'list.project.admin'}">Create new task</router-link>
    </button> -->
       <!-- /search -->
 <!-- create button -->
 <div class="z-20  w-full">
   
    <button class="bg-white text-gray-800 font-semibold py-2 px-4 border border-gray-400 relative rounded hover:shadow-lg hover:shadow-blue-500/50 shadow-md mt-3 ml-4 ">
      <router-link  class="flex hover:text-red" :to="{name: 'list.project.admin'}">
        <p class="my-auto ml-2">
          Create a new Task
        </p>
        <lottie-player src="https://assets1.lottiefiles.com/temp/lf20_e5HyuA.json"  background="transparent"  speed="1"  style="width: 50px; height: 50px;"  loop   autoplay></lottie-player>
      </router-link>
      
    </button>
    
    <!-- /create button -->

  <!-- search -->
  <div class="flex  md:justify-end ">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
</svg>

			<input type="text" @keyup="searchTask" v-model="taskToSearch" name="" id="" class=" bg-transparent border-l-0 border-r-0 border-t-0 border-b-0 border-gray-300 appearance-none focus:outline-none focus:ring-0  focus:border-blue-600 peer w-40  " placeholder="Search...  ">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
</svg>

  </div>
    </div>

  <!-- /search -->
<div class="flex flex-col">
  <div class="overflow-x-auto ">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8 ">
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
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Description
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Action
              </th>
            </tr>
          </thead>
          <tbody class="divide-y bg-red-100 ">
                <template v-for="task in tasks" :key="task.id">
                    <tr class="bg-white border-b">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                            {{task.id}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                            {{task.name}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{task.description}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 flex">
                            <router-link :to="{name: 'edit.task.admin', params : {id : task.id}}" >
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                            </router-link>
                           
                            <svg @click="deleteTask(task.id)" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400 cursor-pointer" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
import useTask from '../../../services/taskservices';
export default {
    setup() {
        const taskToSearch = ref('');

        const { destroyTask, getTasksAdmin, tasks, searchAdmin } = useTask();

        onMounted(getTasksAdmin());
        
        const deleteTask = async (id) => {
          destroyTask(id);
        }

        const searchTask = async () => {
          if(taskToSearch.value.trim() !== ''){
            await searchAdmin(taskToSearch.value.trim())
          }
          else {
            getTasksAdmin();
          }
        }

        return {
            tasks,
            deleteTask,
            taskToSearch,
            searchTask
        }
    }
}
</script>