<template>
  <!-- -----------------------donut--------------------- -->

  <!-- -----------------------cards dashboard--------------------- -->


<!-- component -->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<div class="flex flex-wrap ">
  <div class="mt-4 w-full lg:w-6/12 xl:w-3/12 px-5 mb-4">
  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-3 xl:mb-0 shadow-lg">
      <div class="flex-auto p-4">
      <div class="flex flex-wrap">
          <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
          <h5 class="text-blueGray-400 uppercase font-bold text-xs"> Projects</h5>
          <span class="font-semibold text-xl text-blueGray-700">{{count.project}} </span>
          </div>
          <div class="relative w-auto pl-4 flex-initial">
          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-red-500">
              <i class="fas fa-chart-bar"></i>
          </div>
          </div>
      </div>
      <p class="text-sm text-blueGray-400 mt-4">
          <span class="text-emerald-500 mr-2"><i class="fas fa-arrow-up"></i> 2,99% </span>
          <span class="whitespace-nowrap"> <a href="">details</a>   </span></p>
      </div>
  </div>
  </div>

  <div class=" mt-4 w-full lg:w-6/12 xl:w-3/12 px-5">
  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-4 xl:mb-0 shadow-lg">
      <div class="flex-auto p-4">
      <div class="flex flex-wrap">
          <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
          <h5 class="text-blueGray-400 uppercase font-bold text-xs">Tasks</h5>
          <span class="font-semibold text-xl text-blueGray-700">{{count.task}}</span>
          </div>
          <div class="relative w-auto pl-4 flex-initial">
          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-pink-500">
              <i class="fas fa-chart-pie"></i>
          </div>
          </div>
      </div>
      <p class="text-sm text-blueGray-400 mt-4">
          <span class="text-red-500 mr-2"><i class="fas fa-arrow-down"></i> 4,01%</span>
          <span class="whitespace-nowrap"><a href="">details</a>  </span></p>
      </div>
  </div>
  </div>

  <div class="mt-4 w-full lg:w-6/12 xl:w-3/12 px-5">
  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
      <div class="flex-auto p-4">
      <div class="flex flex-wrap">
          <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
          <h5 class="text-blueGray-400 uppercase font-bold text-xs">Employers</h5>
          <span class="font-semibold text-xl text-blueGray-700">{{count.user}}</span>
          </div>
          <div class="relative w-auto pl-4 flex-initial">
          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-lightBlue-500">
              <i class="fas fa-users"></i>
          </div>
          </div>
      </div>
      <p class="text-sm text-blueGray-400 mt-4">
          <span class="text-red-500 mr-2"><i class="fas fa-arrow-down"></i> 1,25% </span>
          <span class="whitespace-nowrap"><a href="">details</a>   </span></p>
      </div>
  </div>
  </div>

  <div class="mt-4 w-full lg:w-6/12 xl:w-3/12 px-5">
  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
      <div class="flex-auto p-4">
      <div class="flex flex-wrap">
          <div class="relative w-full pr-5 max-w-full flex-grow flex-1">
          <h5 class="text-blueGray-400 uppercase font-bold text-xs">Projects done</h5>
          <span class="font-semibold text-xl text-blueGray-700">{{projectDone.total}} </span>
          </div>
          <div class="relative w-auto pl-4 flex-initial">
          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-emerald-500">
              <i class="fas fa-percent"></i>
          </div>
          </div>
      </div>
      <p class="text-sm text-blueGray-400 mt-4">
          <span class="text-emerald-500 mr-2"><i class="fas fa-arrow-up"></i> 12% </span>
          <span class="whitespace-nowrap"> <a href="">details</a>   </span></p>
      </div>
  </div>
  </div>
</div>
<div class="flex">

<div  class=" max:w-2/4  m-auto lg:w-1/4 ">
       <canvas id="myChart" ></canvas>
</div>

<!-- Recent Activities -->
<div class="lg:flex bg-gray-50 dark:bg-gray-800  shadow-md rounded mx-60" >
          <div class="rounded-t mb-0 px-0 border-0">
            <div class="flex flex-wrap items-center px-4 py-2">
              <div class="relative w-full max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Recent Activities</h3>
              </div>
              <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                <button class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">See all</button>
              </div>
            </div>
            <div class="block w-full">
              <div class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                Today
              </div>
              <ul class="my-1">
                <li class="flex px-4">
                  <div class="w-9 h-9 rounded-full flex-shrink-0 bg-indigo-500 my-2 mr-3">
                    <svg class="w-9 h-9 fill-current text-indigo-50" viewBox="0 0 36 36"><path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path></svg>
                  </div>
                  <div class="flex-grow flex items-center border-b border-gray-100 dark:border-gray-400 text-sm text-gray-600 dark:text-gray-100 py-2">
                    <div class="flex-grow flex justify-between items-center">
                      <div class="self-center">
                        <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">Nick Mark</a> mentioned <a class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">Sara Smith</a> in a new post
                      </div>
                      <div class="flex-shrink-0 ml-2">
                        <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500" href="#0" style="outline: none;">
                          View<span><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="flex px-4">
                  <div class="w-9 h-9 rounded-full flex-shrink-0 bg-red-500 my-2 mr-3">
                    <svg class="w-9 h-9 fill-current text-red-50" viewBox="0 0 36 36"><path d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z"></path></svg>
                  </div>
                  <div class="flex-grow flex items-center border-gray-100 text-sm text-gray-600 dark:text-gray-50 py-2">
                    <div class="flex-grow flex justify-between items-center">
                      <div class="self-center">
                        The post <a class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">Post Name</a> was removed by <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">Nick Mark</a>
                      </div>
                      <div class="flex-shrink-0 ml-2">
                        <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500" href="#0" style="outline: none;">
                          View<span><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <div class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                Yesterday
              </div>
              <ul class="my-1">
                <li class="flex px-4">
                  <div class="w-9 h-9 rounded-full flex-shrink-0 bg-green-500 my-2 mr-3">
                    <svg class="w-9 h-9 fill-current text-light-blue-50" viewBox="0 0 36 36"><path d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z"></path></svg>
                  </div>
                  <div class="flex-grow flex items-center border-gray-100 text-sm text-gray-600 dark:text-gray-50 py-2">
                    <div class="flex-grow flex justify-between items-center">
                      <div class="self-center">
                        <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">240+</a> users have subscribed to <a class="font-medium text-gray-800 dark:text-gray-50 dark:hover:text-gray-100" href="#0" style="outline: none;">Newsletter #1</a>
                      </div>
                      <div class="flex-shrink-0 ml-2">
                        <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500" href="#0" style="outline: none;">
                          View<span><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
 </div>
        <!-- ./Recent Activities -->

</div>
<div>
    <!-- Client Table -->
    <div class="mt-4 mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                  <th class="px-4 py-3">Client</th>
                  <th class="px-4 py-3">Amount</th>
                  <th class="px-4 py-3">Status</th>
                  <th class="px-4 py-3">Date</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold">Hans Burger</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">10x Developer</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">$855.85</td>
                  <td class="px-4 py-3 text-xs">
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> Approved </span>
                  </td>
                  <td class="px-4 py-3 text-sm">15-01-2021</td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;facepad=3&amp;fit=facearea&amp;s=707b9c33066bf8808c934c8ab394dff6" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold">Jolina Angelie</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Unemployed</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">$369.75</td>
                  <td class="px-4 py-3 text-xs">
                    <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full"> Pending </span>
                  </td>
                  <td class="px-4 py-3 text-sm">23-03-2021</td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1502720705749-871143f0e671?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;s=b8377ca9f985d80264279f277f3a67f5" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold">Dave Li</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Influencer</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">$775.45</td>
                  <td class="px-4 py-3 text-xs">
                    <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700"> Expired </span>
                  </td>
                  <td class="px-4 py-3 text-sm">09-02-2021</td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1551006917-3b4c078c47c9?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold">Rulia Joberts</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Actress</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">$1276.75</td>
                  <td class="px-4 py-3 text-xs">
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> Approved </span>
                  </td>
                  <td class="px-4 py-3 text-sm">17-04-2021</td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1566411520896-01e7ca4726af?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold">Hitney Wouston</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Singer</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">$863.45</td>
                  <td class="px-4 py-3 text-xs">
                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700"> Denied </span>
                  </td>
                  <td class="px-4 py-3 text-sm">11-01-2021</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3"> Showing 21-30 of 100 </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
              <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                  <li>
                    <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                      <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                      </svg>
                    </button>
                  </li>
                  <li>
                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">1</button>
                  </li>
                  <li>
                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">2</button>
                  </li>
                  <li>
                    <button class="px-3 py-1 text-white dark:text-gray-800 transition-colors duration-150 bg-blue-600 dark:bg-gray-100 border border-r-0 border-blue-600 dark:border-gray-100 rounded-md focus:outline-none focus:shadow-outline-purple">3</button>
                  </li>
                  <li>
                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">4</button>
                  </li>
                  <li>
                    <span class="px-3 py-1">...</span>
                  </li>
                  <li>
                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">8</button>
                  </li>
                  <li>
                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">9</button>
                  </li>
                  <li>
                    <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                      <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                        <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                      </svg>
                    </button>
                  </li>
                </ul>
              </nav>
            </span>
          </div>
        </div>
      </div>
      <!-- ./Client Table -->
</div>


<!-- -----------------------chart bar--------------------- -->




</template>
<script>

import Chart from 'chart.js/auto';
import { onMounted } from 'vue';
import useUnion from '../../services/unionsServices.js';
import useProject from '../../services/projectServices.js';
export default{
setup () {
  
  const { countPTU, count } = useUnion();
  const { getCountProjectDone, projectDone} = useProject();

  onMounted(() => {
        // const { getCountProjectDone, projectDone} = useProject();
        countPTU();
        getCountProjectDone();

        setTimeout(()=>{
            let selectedDatasetIndex = undefined;
            let selectedIndex = undefined;
            let dataValue = count.value.project - projectDone.value.total;
            let rest = projectDone.value

            const ctx = document.getElementById('myChart');
          //////////////////setup////////////////////////////////
            const data = {
              labels: [
                'in progress',  
                'done',
              ],
              datasets: [{
                label: 'My First Dataset',
                data: [dataValue, rest],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                ],
                // hoverOffset:4
              }]
              };
            const clickLabel={
              id:'clickLabel',
              afterDraw:(chart,args,options)=>{
                const{ctx,chartArea:{width,height,top}}=chart;

              if(selectedDatasetIndex>=0){
                const sum = chart._metasets[selectedDatasetIndex].total;
                
                const value = chart._metasets[selectedDatasetIndex]._parsed[selectedIndex];
                const percentage = value /sum *100;


                

                ctx.save();
                ctx.font ='30px cambria';
                ctx.fillStyle ='#75a3ff';
                ctx.textAlign='center';
                ctx.textBaseline='middle';
                ctx.fillText(percentage.toFixed(1)+'%',width/2,height/2+top)
              }
              
              }
              }
            const myChart = new Chart(ctx, {
                /////////////////////Config////////////////////////////
                type: 'doughnut',
                    data: data,
                    options:{
                      onClick(click,element,chart){
                        
                        if(element[0]){
                          selectedDatasetIndex = element[0].datasetIndex;
                          selectedIndex = element[0].index;
                          chart.draw()
                        }
                      }
                    } ,
                    plugins:[clickLabel]
            });

            myChart;
          },1000)
      })


      return {
        count,
        projectDone,
      }
}

}
</script>
