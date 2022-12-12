<template>
    <template v-for="project in tasks['projects']" :key="project.id" >
        <header class="ml-10 mt-3  ml-4 py-2">
            <p class="alert alert-primary h3">{{project.name}} : </p>
            <p class="font-leight text-lg ml-4">{{project.description}}</p>
      </header>
      
    </template>

    <!-- <template v-for="task in tasks['tasks']" :key="task.id">
        <div class="md:grid lg:grid-cols-3 md:grid-cols-2 mlg:grid-cols-3 md:gap-10 space-y-6 md:space-y-0 px-10 md:px-0 mx-auto">
            <p class="alert alert-success h3">
                    {{task.task_id}} {{task.task_name}} 
                    <button class="btn btn-warning" @click="updateToValided(task.task_id)">VALIDER</button>
                    <button class="btn btn-danger" @click="updateToProcess(task.task_id)">A REFAIRE</button>
           </p>
        </div>
        

        <template v-for="user in tasks['users']" :key="user.id">
        <p v-if="task.task_id === user.task_id" class="h2">{{user.user_id}}-----{{user.user_name}}</p>
        </template>
    </template> -->


   
 
      <div class="mt-2 md:flex md:flex-wrap  ml-24 mt-4  ">
        <template v-for="task in tasks['tasks']" :key="task.id">
        <div class="bg-white p-6 ml-2 w-80 lg:w-96 mb-2 shadow-md rounded-md border">
            <div class="flex ">
          <!-- <h3 class="text-xl text-gray-800 font-semibold mb-3">N°{{task.task_id}}  : </h3> -->
          <h3 class="text-xl text-gray-800 font-semibold mb-1 font-mono"> {{task.task_name}} </h3>
        </div >

                <template v-for="user in tasks['users']" :key="user.id">
                        <p v-if="task.task_id === user.task_id" class="mb-4 " >By   {{user.user_name}} </p>
                </template>
          <!-- <button class="text-lg font-semibold text-gray-700 bg-indigo-100 px-4 py-1 block mx-auto rounded-md">Cook This</button> -->
            <div class="flex justify-center">
                <button class="btn flex px-8 py-1 block mx-auto rounded-md" @click="updateToValided(task.task_id)">
                    <p class="mr-2 mr-1 text-green-400">Validate</p> 
                    <img src="../../../../icons/check.svg" class="w-6" alt="">
                </button>
                <button class="btn  flex px-8 py-1 block mx-auto rounded-md border-none" @click="updateToProcess(task.task_id)">
                        <p class="text-red-400 mr-1  border-none">Restart</p> 
                    <img src="../../../../icons/restart.svg" class="w-5" alt="">
               </button>
            </div>
        </div>
    </template>
      </div>
   
   

</template>

<script>
import { onMounted } from 'vue';
import useAsssignment from '../../../services/assignmentServices.js';
import swal from "sweetalert";
import Swal from 'sweetalert2';
import useTask from '../../../services/taskservices.js';

export default {
    props : {
        id : {
            required : true
        }
    },
    setup (props) {
        const { updateStatus } = useAsssignment();
        const { getTaskAssigned, tasks} = useTask();
        onMounted(() => {
            getTaskAssigned(props.id, 2);
        });

        const updateToProcess = (task_id) => {
            const data = {
                society_id: localStorage.getItem('society'),
                project_id : props.id,
                task_id : task_id,
                status_id: 1
            }
      
            ///////////////Sweet alert///////////////////
            swal({
            title: "Are you sure?",
            text: "Once restart, the user will have to restart this task!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((update) => {
            if (update) {
                updateStatus(2, data);
              swal("Poof!The task is to be restart!", {
                icon: "success", 
                timer: 1000,
                buttons: false      
              });
              getTaskAssigned(props.id, 2);
             
            } else {
              swal("User is safe!");

            }
          });




         
          
        }  

        const updateToValided = (task_id) => {
            const data = {
                society_id: localStorage.getItem('society'),
                project_id : props.id,
                task_id : task_id,
                status_id: 3
            }
   ///////////////Sweet alert///////////////////
   swal({
            title: "Are you sure?",
            text: "Once valid, you will not be able to update this statut!",
            icon: 'info',
            buttons: true,
            dangerMode: true,
          })
          .then((update) => {
            if (update) {
                updateStatus(2, data);
              swal("Poof! It's valid!", {
                icon: "success", 
                timer: 1000,
                buttons: false      
              });
              getTaskAssigned(props.id, 2);
             
            } else {
              swal("User is safe!");

            }
          });
            
       
            

        }
        //  let project = { }

        return {
            tasks,
            updateToProcess,
            updateToValided

        }
    }

}
</script>