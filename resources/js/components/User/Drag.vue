<template>
  <h1 class="font-bold relative top-2 text-xl ml-6 ">Move elements in the box</h1>
  <div class="flex items-stretch">
      <div class="bg-white rounded shadow p-4 m-4 w-50  "
          @drop="drop($event, 0);"
          @dragover="dragover($event);" 
          @dragenter.prevent
   
      ><h1 class="text-gray-400 mb-2 font-bold text-lg  font-sans mt-0 relative ">To Do
        
      </h1>
          <div v-for="task in getList(0)" 
              :key="task.task" 
              ghost-class="ghost"
              class="drag-el text-base border-gray-500 bg-red-400 text-white py-2 text-center mb-2 cursor-pointer rounded"
              draggable="true"
              @dragstart="startDrag($event, task)"
              >
              {{ task.task }}
             
          </div>
      </div>

      <div class="bg-white rounded shadow p-4 m-4 w-50 "
					@drop="drop($event, 1);"
					@dragover="dragover($event);"
					@dragenter.prevent
				><h1 class="text-gray-400 mb-2 font-bold text-lg  font-sans mt-0 relative ">In progress</h1>
					<div v-for="task in getList(1)" 
						:key="task.id" 
            ghost-class="ghost"
						class="drag-el  text-base border-gray-500 bg-blue-400 text-white p-2 text-center mb-2 cursor-pointer rounded"
						draggable="true"  
							@dragstart="startDrag($event, task)"
					>
						{{ task.task }}
					</div>
				</div>
  

      <div class="bg-white rounded shadow p-4 m-4 w-50 "
          @drop="drop($event, 2);"
          @dragover="dragover($event);"
          @dragenter.prevent
      ><h1 class="text-gray-400 mb-2 font-bold text-lg  font-sans mt-0 relative ">Done</h1>
          <div v-for="task in getList(2)" 
              :key="task.id" 
              ghost-class="ghost"
              class="drag-el  text-base border-gray-500 bg-green-400 text-white p-2 text-center mb-2 cursor-pointer rounded"
              draggable="true"  
              @dragstart="startDrag($event, task)"
          >
              {{ task.task }}
          </div>
      </div>
  </div>
</template>

<script>
import { onMounted } from 'vue'
import useAsssignment from '../../services/assignmentServices';
import useTask from '../../services/taskservices';
export default {
  props : {
    project : {
      required: true
    }
  },
  setup(props) {

      const { updateStatus } = useAsssignment();
      const { getTasksIntoProject, tasks} = useTask();

      const getList = (status) => {
          return tasks.value.filter(task => task.status_id === status);
        }
      onMounted(getTasksIntoProject(props.project))
      
      const startDrag = (ev, task) => {
          ev.dataTransfer.setData("task_id", task.id);
          ev.dataTransfer.setData("status_id", task.status_id);
          ev.dataTransfer.effectAllowed = "move";
      }

      const  drop = async (ev, status) => {
          ev.preventDefault();
          const task_id = ev.dataTransfer.getData("task_id");
          const currentStatus =  ev.dataTransfer.getData("status_id");
          const data = {
            project_id : props.project,
            task_id : task_id,
            status_id : status
          }
          const task = tasks.value.find((task) => task.id == task_id)
          task.status_id = status;
          await updateStatus(currentStatus, data);
      }

      const dragover = (ev) => {
      ev.preventDefault();
      ev.dataTransfer.dropEffect = "move"
      }


      return {
          getList,
          startDrag,
          drop,
          dragover,

      }
  },
}


</script>
