<template>
  <!-- <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
    <router-link :to="{name: 'create.user.admin'}">Create</router-link>
  </button> -->
     <!-- /search -->
 <!-- create button -->
 <div class="">
    <button class="bg-white text-gray-800 font-semibold py-2 px-4 border border-gray-400 relative rounded shadow-md mt-3 ml-4 hover:shadow-lg hover:shadow-blue-500/50 shadow-md ">
      <router-link :to="{name: 'create.user.admin'}" class="flex">
        <p class="my-auto ml-2">
          Add a new user
        </p>
        <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_zyckcp7c.json"  background="transparent" class=" " speed="1"  style="width: 50px; height: 50px;"  loop  autoplay></lottie-player></router-link>
      
    </button>
    
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
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Email
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Address
              </th>
             
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
                <template v-for="user in users" :key="user.id">
                    <tr class="bg-white border-b">
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{user.id}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{user.name}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{user.email}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4">
                            {{user.address}}
                        </td>
                     
                        <td class=" px-6 py-4 flex">
                            <router-link :to="{name: 'edit.user.admin', params:{ id : user.id}}">
                              <!-- edit svg -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                            </router-link>
                          <!-- </td>
                        <td class=" px-6 py-4 "> -->
                          <!-- delete svg -->
                          <svg @click="deleteUser(user.id)" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400 cursor-pointer" fill="none"
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
import useUser from '../../../services/usersServices.js'
export default {
  setup(){
    const userToSearch = ref('');
    const { getUsersAdmin, users, destroyUser, searchUser} = useUser();

    onMounted(getUsersAdmin());

    const deleteUser = async (id) => {
        destroyUser(id)        
        getUsersAdmin();
    }

    const search = async () => {
      if(userToSearch.value.trim() !== ''){
          await searchUser(userToSearch.value.trim())
      }
      else {
          getUsersAdmin();
      }
    }

    return {
      users,
      deleteUser,
      search,
      userToSearch
    }
  }
}

</script>
