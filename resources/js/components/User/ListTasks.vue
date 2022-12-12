<template>
<!-- search -->
 <!-- create button -->
 <!-- <div class="">
    <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow-md mt-3 ">
      <router-link :to="{name: 'create.user.admin'}">Create</router-link>
    </button> -->
    
    <!-- /create button -->

<!-- search -->
  <div class="flex justify-end ">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
</svg>

			<input type="text" @keyup="search" v-model="userToSearch" name="" id="" class=" bg-transparent border-l-0 border-r-0 border-t-0 border-b-0 border-gray-300 appearance-none focus:outline-none focus:ring-0  focus:border-blue-600 peer w-40  " placeholder="Search...  ">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
</svg>

  </div>
    <!-- </div> -->

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
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Description
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Project
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Statuts
              </th>
            </tr>
          </thead>
          <tbody>
                <template v-for="task in tasks" :key="task.id">
                    <tr class="bg-white border-b " v-if="task.status=='validated'">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                            {{task.id}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                            {{task.name}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{task.description}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{task.project}}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                          <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-400 opacity-50 rounded-full">
                                          </span>
									            <span class="relative">{{task.status}}</span>
								      	  </span>
                         
                        </td>
                    </tr>
                    <tr class="bg-white border-b " v-else-if="task.status=='in progress'">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                            {{task.id}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                            {{task.name}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{task.description}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{task.project}}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                          <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-orange-400 opacity-50 rounded-full">
                                          </span>
									            <span class="relative">{{task.status}}</span>
								      	  </span>
                        </td>
                    </tr>
                    <tr class="bg-white border-b " v-else-if="task.status=='finished'">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                            {{task.id}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                            {{task.name}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{task.description}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{task.project}}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                          <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                          </span>
									            <span class="relative">{{task.status}}</span>
								      	  </span>
                        </td>
                    </tr>
                    <tr class="bg-white border-b ">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                            {{task.id}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 ">
                            {{task.name}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{task.description}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{task.project}}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                          <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-red-600 opacity-70 rounded-full">
                                          </span>
									            <span class="relative">{{task.status}}</span>
								      	  </span>
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
import useTask from '../../services/taskservices';
export default {
    setup() {
        const userToSearch = ref('');
        const {getTasksUser, tasks, searchTaskUser} = useTask();
       
        onMounted(getTasksUser());

        const search = async () => {
            if(userToSearch.value.trim() !== ''){
                await searchTaskUser(userToSearch.value.trim());
            }
            else {
                await getTasksUser();
            }
        }

        const total = () => {
          return taskUser.value;
        }

        
        return {
            tasks,
            userToSearch,
            search
        }
    },
}
</script>