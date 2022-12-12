<template>
  <!-- -----------------------donut--------------------- -->

  <!-- -----------------------cards dashboard--------------------- -->


<!-- component -->
<!-- <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<div class="flex flex-wrap ">
  <div class="mt-4 w-full lg:w-6/12 xl:w-3/12 px-5 mb-4">
  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-3 xl:mb-0 shadow-lg">
      <div class="flex-auto p-4">
      <div class="flex flex-wrap">
          <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
          <h5 class="text-blueGray-400 uppercase font-bold text-xs"> Projects</h5>
          <span class="font-semibold text-xl text-blueGray-700">3</span>
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
          <span class="font-semibold text-xl text-blueGray-700">20</span>
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
          <span class="font-semibold text-xl text-blueGray-700">10000</span>
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
          <span class="font-semibold text-xl text-blueGray-700">51.02% </span>
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
</div> -->
<div class="lg:flex ">

<div class=" max:w-2/4  m-auto lg:w-1/4 md:w-2/4">
<canvas id="myChart"></canvas>
</div>

<div class="max:w-1/4 m-auto lg:w-1/2 md:w-3/4">
  <canvas id="myChartBar" ></canvas>
</div>

</div>

<!-- -----------------------chart bar--------------------- -->




</template>
<script>
import '../../../../node_modules/flowbite/dist/flowbite.js';
import useAsssignment from '../../services/assignmentServices';
import Chart from 'chart.js/auto';
import { onMounted, ref } from 'vue';
import useTask from '../../services/taskservices.js';
export default{
setup(){
    onMounted(()=> {
        const { getDataUserChart ,dataChart } = useTask();
        getDataUserChart();
        setTimeout(() => {
            let selectedDatasetIndex = undefined;
            let selectedIndex =undefined;
            let dataValue=dataChart.value;
            
            let reste=dataValue.assignement-(dataValue.done+dataValue.validate);

            const ctx = document.getElementById('myChart');
            //////////////////setup////////////////////////////////
            const data = {
            labels: [
            'Done',
            'In progress or not start',
            'Validate',
            ],
            datasets: [{
            
              data: [dataValue.done,reste,dataValue.validate,],
              backgroundColor: [
                'rgb(54, 162, 235)',
                'rgb(255, 99, 132)',
                'rgb( 64, 222, 16)',
                'rgb(  237, 149, 7)',
              
              ],
              // hoverOffset:4
            }]
            };
            const clickLabel={
            id:'clickLabel',
            afterDraw:(chart,args,options)=>{
              const{ctx,chartArea:{width,height,top}}=chart;

            if(selectedDatasetIndex>=0){
              // console.log(chart._metasets[selectedDatasetIndex]._parsed[1])
              const sum = chart._metasets[selectedDatasetIndex].total;
              const value=chart._metasets[selectedDatasetIndex]._parsed[selectedIndex];
              const percentage=value /sum *100;
              // console.log(percentage.toFixed(1))

              

              ctx.save();
              ctx.font ='30px cambria';
              ctx.fillStyle ='#75a3ff';
              ctx.textAlign='center';
              ctx.textBaseline='middle';

              ctx.fillText(percentage.toFixed(1)+' %',width/2,height/2+top)
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

            // -----------------------bar---------------------

            const ctxBar = document.getElementById('myChartBar');
            //----------------------setup-----------------------------------

            const dataBar = {
              labels:'1234',
              datasets: [{
              label: 'My First Dataset',
              data: [65, 59, 80, 81, 56, 55, 40],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
              ],
              borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
              ],
              borderWidth: 1
            }]
            };
            const myChartBar = new Chart(ctxBar, {
            /////////////////////Config////////////////////////////
              type: 'bar',
              data: dataBar,
              options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            },
            });

            myChartBar;
        },1000) 
    })
  }
}


</script>

<style>

</style>
