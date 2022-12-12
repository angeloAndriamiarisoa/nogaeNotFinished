<template>
    <h1 class="font-bold relative top-2 text-xl ml-6">List of projects</h1><br>
    <!-- <template v-for="project in projects" :key="project.id">
        <button @click="toTask(project.id)" class="btn btn-primary">{{project.id}}--{{project.name}}</button><br><br>
    </template> -->
    <div class="grid mb-8 md:mb-12 md:grid-cols-3">
        <template  v-for="project in projects" :key="project.id">
            <figure class="flex flex-col items-center justify-center ml-2 p-2 text-center bg-white  border-gray-200 mb-2 dark:bg-gray-800 dark:border-gray-700 shadow cursor-pointer" @click="toTask(project.id)">
              
            <blockquote class="max-w-2xl mx-auto mb-2 text-gray-500 lg:mb-8 dark:text-gray-400">
              
                <!-- <img src="../../../icons/folder.svg" class="h-10 w-10 " alt=""> -->
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white h-10">{{project.name}}</h3>
            
                    <p class="my-2 font-light w-1/2 mx-auto ">{{project.description}}</p>                  
                    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_afs4kbqm.json"  background="transparent"  speed="1"  style="width: 200px; height: 50px; " class="relative mx-auto my-1 "   autoplay v-if="(project.percentage === '100%')"></lottie-player>            
                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_tiuij39a.json"  background="transparent"  speed="1"  style="width: 200px; height: 60px;" class="relative mx-auto my-1 " loop  autoplay v-else ></lottie-player>
            </blockquote>
            </figure>
        </template>
        
  </div>
</template>

<script>
import { onMounted,ref } from 'vue';
import useProject from '../../services/projectServices'
import router from '../../router';
export default {
    setup () {
        const { getUserProject, projects } = useProject();

        onMounted(getUserProject())

        const toTask = (id) => router.push({name : 'drag.user', params : {project : id}})

        return {
            projects,
            toTask
        }
      

    }
}
</script>
<!-- <style>
   #progressbar{
width: ;
   }
</style> -->
