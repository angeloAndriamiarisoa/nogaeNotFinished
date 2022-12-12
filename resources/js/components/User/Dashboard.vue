<template>
  <!-- <div id="mySidenav" class="sidenav">
      <p class="closebtn" @click="closeNav()">&times;</p>
      <p><router-link class="router" :to="{name:'chart.user'}">Resume</router-link></p>
      <p><router-link class="router" :to="{name:'list.project.user'}">Project</router-link></p>
      <p><router-link class="router" :to="{name:'list.tasks.user'}">Task</router-link></p>
      <p><router-link class="router" :to="{name:'drag.user'}">Drag</router-link></p>
      <p @click="logOut()">LogOut</p>

  </div> -->

  <!-- <span class="justify-content-center" id="burger" style="font-size:30px;cursor:pointer" @click="openNav()">&#9776;</span>

  <div id="main">
      <h1 class="justify-content-center">USER <span class="badge bg-secondary">TaskManager</span></h1>
      <hr>
      <router-view></router-view>
  </div> -->
  <!-- Side-bar user -->

    
  
  <div class="flex justify-between ">
        <!-- burger -->
    <span class=" px-4 py-2" id="burger" @click="openNav()">&#9776;</span>
        <!-- /burger -->

    <!-- profile avatar -->
      <div class="flex items-center space-x-4 px-4">
        <div class="font-medium dark:text-white">
          <div class="flex  justify-evenly" v-html="name.getItem('username')"></div>
          <div class="text-sm text-gray-500 dark:text-gray-400"  v-html="name.getItem('usermail')"></div>
        </div>
      <svg class=" ml-8 w-10 h-10 cursor-pointer rounded-full" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
      
    </div>
 <!-- /profile avatar -->
</div>

       <!-- side content -->
 <div id="mySidenav" class="sidenav shadow-md">
<aside class="w-64" aria-label="Sidebar">
      <div class="overflow-y-auto pt-16 px-4 bg-gray-50 rounded dark:bg-gray-800">
        <div class="flex">
          <div class="position: absolute items-center top-3 right-28">
        <img class="hidden lg:block w-28" src="../../../icons/nogae_logo.png" alt="Logo"> 
        <!-- <img class="block lg:hidden w-10" src="../../../icons/logo-mini.jpg" alt="Logo">  -->
      </div>
        <p class="closebtn hover:none" @click="closeNav()">&times; </p>
        </div>
          <ul class="space-y-2">
            <li>
                <router-link :to="{name:'chart.user'}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                  <router-link class="router ml-3 hidden md:block" :to="{name:'chart.user'}">Resume</router-link>
                </router-link>
                
                
            </li>
            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" @click="dropdown()">
                      <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                      <span class="flex-1 ml-3 text-left whitespace-nowrap hidden md:block">Tasks</span>
                      <svg  class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2" >
                      <!-- <li>
                        <router-link :to="{name:'drag.user'}" class="router flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Do tasks</router-link>
                      </li> -->
                      <li>
                        <router-link class="router flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" :to="{name:'list.tasks.user'}">List of all tasks</router-link>
                      </li>
                </ul>
            </li>
            
            <li>
                <router-link :to="{name:'list.project.user'}"  class="router flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                  <span class="flex-1 ml-3 whitespace-nowrap hidden md:block">Projects</span>
                  <span class="inline-flex justify-center items-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                </router-link>
            </li>
            <!-- <li>
                <router-link :to="{name:'drag.user'}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                  <span class="flex-1 ml-3 whitespace-nowrap hidden md:block">Inbox</span>
                  <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span>
                </router-link>
            </li> -->
            <li>
                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                  <span class="flex-1 ml-3 whitespace-nowrap hidden md:block">Users</span>
                </a>
            </li>
            <li>
                <router-link :to="{name : 'profil.user'}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>

                  <span class="flex-1 ml-3 whitespace-nowrap hidden md:block">Setting</span>
                </router-link>
            </li>
          
          
            <li>
                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
</svg>

                  <span class="flex-1 ml-3 whitespace-nowrap hidden md:block" @click="logOut()">Logout</span>
                </a>
            </li>
            
          </ul>
          
      </div>
</aside>
</div>

<!-- routerview content  -->
<div id="main" class="position sticky">
      <h1 class="justify-content-center px-2">USER <span class="badge bg-secondary ">TaskManager</span></h1>
      
    
      <hr>
      <router-view></router-view>
  </div> 

  
</template>

<script>
import '../../../../node_modules/flowbite/dist/flowbite.js';

import { useStore } from "vuex";
import NavBar from '../layouts/NavBar';
export default {
  components: {
      NavBar
  },
  setup (){
      const store = useStore();
      /**
       * 
       * Disconnect the simple user 
       */
      const logOut = async () => {
          await store.dispatch('logOut')
      }

      const openNav = () => {
          document.getElementById("mySidenav").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
          document.getElementById("burger").style.visibility = "hidden";

      }
      const closeNav = () => {
          document.getElementById("mySidenav").style.width = "0px";
          document.getElementById("main").style.marginLeft = "0px";
          document.getElementById("burger").style.visibility = "visible";
      }
      const dropdown=()=>{
        // el=document.getElementById('dropdown-example');
                if(document.getElementById('dropdown-example').classList.contains("hidden"))
                {
                  document.getElementById('dropdown-example').classList.replace("hidden","block")
                }
                else{
                  document.getElementById('dropdown-example').classList.replace("block","hidden")
                }

      }
      const name=localStorage
  
      return {
          name,
          logOut,
          openNav,
          closeNav,
          dropdown
      }
  }
}


</script>

<style scoped>
#burger {
  display: inline-block;
  /* padding: 20px; */
  font-size:30px;
  cursor:pointer
}
.sidenav {
height: 100%;
width: 0;
position: fixed;
z-index: 1;
top: 0;
left: 0;
overflow-x: hidden;
transition: 0.5s;

}





.sidenav p .router {
  text-decoration: none;
  color: #818181;
}

.sidenav.router:hover {
color: #f1f1f1;
}
.sidenav .closebtn {
position: absolute;
top: 0;
right: 25px;
font-size: 36px;
margin-left: 50px;
cursor: pointer;
}

#main {
transition: margin-left .5s;
padding: 16px;
}

@media screen and (max-height: 450px) {
.sidenav {padding-top: 15px;}
.sidenav a {font-size: 18px;}
}
</style>