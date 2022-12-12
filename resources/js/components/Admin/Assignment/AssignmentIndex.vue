  <template>
    
<div class="dropdown dropend border-none">
    <img src="../../../../icons/category.svg" class="w-14 dropdown-toggle relative mt-3 ml-6" alt="" id="dropdownMenuButton1" data-bs-toggle="dropdown"  aria-expanded="false">
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <button @click="getAssignments()" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
      ASSIGNED TASK
    </button>
    <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
      <router-link :to="{name: 'list.unassigned.admin'}">Unassigned Task</router-link>
    </button>
    <button @click="assignmentstatus(0)" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
      STATUS NOT START
    </button>
    <button @click="assignmentstatus(1)" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
      STATUS IN PROGRESS
    </button>
    <button @click="assignmentstatus(2)" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
      STATUS FINISHED
    </button>
    <button @click="assignmentstatus(3)" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
      STATUS Validate
    </button>
  </div>
</div>
  <!-- <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown button
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
	</div> -->
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
                  User
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
              </tr>
            </thead>
            <tbody>
                  <template v-for="assignment in assignments" :key="assignment.id">
                      <tr class="bg-white border-b">
                          <td class="text-sm text-gray-900 font-light px-6 py-4">
                              {{i++}}
                          </td>
                          <td class="text-sm text-gray-900 font-light px-6 py-4">
                              {{assignment.user}}
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
                          
                          <!-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                              <router-link :to="{name: 'create.task.admin', params : { id : project.id }}">Create</router-link> 
                              <router-link :to="{name: 'edit.project.admin', params:{ id : project.id }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Edit</router-link><br>
                              <button @click="deleteProject(project.id)" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Delete</button>
                          </td> -->
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
import { onMounted } from '@vue/runtime-core';
import useAsssignment from '../../../services/assignmentServices'
export default {
    setup () {
        const i = 1;
        const { getAssignments, assignments, getAssignmentsFiltered } = useAsssignment();

        onMounted(getAssignments()); 

        const assignmentstatus = async (status) => {
          getAssignmentsFiltered(status);
        }

        return {
            i,
            assignments,
            assignmentstatus,
            getAssignments
        }
    }
}
</script>