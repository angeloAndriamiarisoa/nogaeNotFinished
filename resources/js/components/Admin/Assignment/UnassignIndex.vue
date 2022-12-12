<template>
    <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
      <router-link :to="{name: 'list.assignments.admin'}">Assigned Task</router-link>
    </button>
    <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  #
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Task
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Project
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Society
                </th>    
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
                  <template v-for="assignment in assignments" :key="assignment.id">
                      <tr class="bg-white border-b">
                          <td class="text-sm text-gray-900 font-light px-6 py-4">
                              {{i++}}
                          </td>
                          <td class="text-sm text-gray-900 font-light px-6 py-4">
                              {{assignment.task}}
                          </td>
                          <td class="text-sm text-gray-900 font-light px-6 py-4">
                              {{assignment.project}}
                          </td> 
                           <td class="text-sm text-gray-900 font-light px-6 py-4">
                              {{assignment.society}}
                          </td>
                          
                          <td class="text-sm text-gray-900 font-light px-6 py-4">
                              <router-link class="border-b text-red-500" :to="{name: 'update.assignment.admin', params : { id : assignment.project_id, actuel_task_id : assignment.task_id }}">Assign the task</router-link> 
                              <!-- <router-link :to="{name: 'edit.project.admin', params:{ id : project.id }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Edit</router-link><br> -->
                              <!-- <button @click="deleteProject(project.id)" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Delete</button> -->
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
import { onMounted } from 'vue';
import useAsssignment from '../../../services/assignmentServices'
export default {
    setup () {
        let i = 1;
        const { getUnassignedTasks, assignments } = useAsssignment();

        onMounted(getUnassignedTasks());

        return {
            i,
            assignments
        }
    }
}
</script>