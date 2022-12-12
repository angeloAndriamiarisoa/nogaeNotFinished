<template>
    <!-- burger -->
    <div class="flex  w-full fixed z-30 ">
    <span class=" px-4 py-2" id="burger" @click="openNav()">&#9776;</span>
  </div>

<!-- side content -->
<div id="mySidenav" class="sidenav shadow-md">
<aside class="w-64" aria-label="Sidebar">
<div class="overflow-y-auto py-12 px-4 bg-gray-50  dark:bg-gray-800">
<p class="closebtn hover:none" @click="closeNav()">&times;
</p>
<ul class="space-y-2">
<li>
 
   <router-link class="router:none flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" :to="{name:'chart.superadmin'}">
    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
    <span class="flex-1 ml-3 text-left whitespace-nowrap hidden md:block" sidebar-toggle-item="">Dashboard super</span></router-link>
   
</li>
<li>
   <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example"  @click="dropdown_1()">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
</svg>
  
        
        <span class="flex-1 ml-3 text-left whitespace-nowrap hidden md:block" sidebar-toggle-item="">Society</span>
         <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
   </button>
   <ul id="dropdown-example_1" class="hidden py-2 space-y-2">
         <li>
          <router-link :to="{name:'list.society.superadmin'}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">List of all compagnies</router-link>
         </li>
         <li>
           <router-link :to="{name:'create.society.superadmin'}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Create a company</router-link>
         </li>
   </ul>
</li>
<li>
   <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" @click="dropdown_2()">
         <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
         <span class="flex-1 ml-3 text-left whitespace-nowrap hidden md:block" sidebar-toggle-item="">Projects</span>
         <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
   </button>
   <ul id="dropdown-example_2" class="hidden py-2 space-y-2">
         <li>
          
           <router-link :to="{name:'list.project.superadmin'}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">List of all projects</router-link>
         </li>
         <li>
           <router-link :to="{name:'create.project.superadmin'}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Create a project</router-link>
         </li>
   </ul>
</li>
<li>
   <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" @click="dropdown_3()">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
</svg>

         <span class="flex-1 ml-3 text-left whitespace-nowrap hidden md:block" sidebar-toggle-item="">Tasks</span>
         <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
   </button>
   <ul id="dropdown-example_3" class="hidden py-2 space-y-2">
         <li>
           <router-link :to="{name:'list.tasks.superadmin'}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">List of all tasks</router-link>
         </li>
         <li>
           <router-link :to="{name:'create.task.superadmin'}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Create a task</router-link>
         </li>
   </ul>
</li>
<li>
   <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" @click="dropdown_4()">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
</svg>


         <span class="flex-1 ml-3 text-left whitespace-nowrap hidden md:block" sidebar-toggle-item="">Users</span>
         <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
   </button>
   <ul id="dropdown-example_4" class="hidden py-2 space-y-2">
         <li>
           <router-link :to="{name:'list.users.superadmin'}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">List of all users</router-link>
         </li>
         <li>
           <router-link :to="{name:'create.user.superadmin'}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Create a user</router-link>
         </li>
   </ul>
</li>

<li>
   <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
</svg>

     <span class="flex-1 ml-3 whitespace-nowrap hidden md:block">Bank notes</span>
     <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span>
   </a>
</li>

<li>
   <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>

     <span class="flex-1 ml-3 whitespace-nowrap hidden md:block">Setting</span>
   </a>
</li>


<li>
   <div class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">

     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
</svg>

     <span class="flex-1 ml-3 whitespace-nowrap hidden md:block" @click="logOut()">Logout</span>
</div>
</li>
</ul>
</div>
</aside>
</div>
<div id="main" class="pt-12">
  <router-view></router-view>
</div>

</template>
<script>
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
      document.getElementById("mySidenav").style.zIndex = "40";
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
      document.getElementById("burger").style.visibility = "hidden";
     

  }
  const closeNav = () => {
      document.getElementById("mySidenav").style.width = "0px";
      document.getElementById("main").style.marginLeft = "0px";
      document.getElementById("burger").style.visibility = "visible";
      document.getElementById('dropdown-example_1').classList.replace("block","hidden")
      document.getElementById('dropdown-example_2').classList.replace("block","hidden")
      document.getElementById('dropdown-example_3').classList.replace("block","hidden")
      document.getElementById('dropdown-example_4 ').classList.replace("block","hidden")

  }
  const dropdown_1=()=>{
        // el=document.getElementById('dropdown-example');
                if(document.getElementById('dropdown-example_1').classList.contains("hidden"))
                {
                  document.getElementById('dropdown-example_1').classList.replace("hidden","block")
                  document.getElementById('dropdown-example_2').classList.replace("block","hidden")
                  document.getElementById('dropdown-example_3').classList.replace("block","hidden")                 
                  document.getElementById('dropdown-example_4').classList.replace("block","hidden")

                }
                else{
                  document.getElementById('dropdown-example_1').classList.replace("block","hidden")

                }
  }
  const dropdown_2=()=>{
        // el=document.getElementById('dropdown-example_');
                if(document.getElementById('dropdown-example_2').classList.contains("hidden"))
                {
                  document.getElementById('dropdown-example_2').classList.replace("hidden","block")
                  document.getElementById('dropdown-example_1').classList.replace("block","hidden")
                  document.getElementById('dropdown-example_3').classList.replace("block","hidden")                 
                  document.getElementById('dropdown-example_4').classList.replace("block","hidden")
                  
                }
                else{
                  document.getElementById('dropdown-example_2').classList.replace("block","hidden")
                }
  }
  const dropdown_3=()=>{
        // el=document.getElementById('dropdown-example_');
                if(document.getElementById('dropdown-example_3').classList.contains("hidden"))
                {
                  document.getElementById('dropdown-example_3').classList.replace("hidden","block")
                  document.getElementById('dropdown-example_2').classList.replace("block","hidden")
                  document.getElementById('dropdown-example_1').classList.replace("block","hidden")                 
                  document.getElementById('dropdown-example_4').classList.replace("block","hidden")
                }
                else{
                  document.getElementById('dropdown-example_3').classList.replace("block","hidden")
                }
  }
  const dropdown_4=()=>{
        // el=document.getElementById('dropdown-example_');
                if(document.getElementById('dropdown-example_4').classList.contains("hidden"))
                {
                  document.getElementById('dropdown-example_4').classList.replace("hidden","block")
                  document.getElementById('dropdown-example_2').classList.replace("block","hidden")
                  document.getElementById('dropdown-example_3').classList.replace("block","hidden")                 
                  document.getElementById('dropdown-example_1').classList.replace("block","hidden")
                }
                else{
                  document.getElementById('dropdown-example_4').classList.replace("block","hidden")
                }
  }
  return {
      logOut,
      openNav,
      closeNav,
      dropdown_1,
      dropdown_2,
      dropdown_3,
      dropdown_4,
      
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

}

@media screen and (max-height: 450px) {
.sidenav {padding-top: 15px;}
.sidenav a {font-size: 18px;}
}
</style>
