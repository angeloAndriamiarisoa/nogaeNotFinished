<!-- <template>
    
<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
  <div class="container flex flex-wrap justify-between items-center mx-auto">
    <a href="https://flowbite.com/" class="flex items-center">
        <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
        </li>
        <li>
          <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm">
                <h1 class="justify-content-center">NOGAE <span class="badge bg-secondary">TaskManager</span></h1>
            </div>
            <div class="col-sm">
                <router-link :to="{name: 'login'}" class="btn btn-primary">Sign In</router-link>
            </div>

        </div>
    </div>
    </template> -->

    <template>
        <!-- Gogole Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200&display=swap"
    rel="stylesheet" />



<!-- Page Main -->
<main class="flex flex-col items-center justify-center mt-32">
    <header class="container">
        <!-- Navbar -->
        <nav
            class="flex justify-between md:justify-around py-2 bg-white/80 backdrop-blur-md shadow-md w-full px-10 fixed top-0 left-0 right-0 z-10 px-8 md:px-3">
            <!-- Logo Container -->
            <div class="flex items-center">
                <!-- Logo -->
                <router-link :to="{name: 'index'}" class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">                
                        <img class="hidden lg:block w-28" src="../../icons/nogae_logo.png" alt="Logo"> 
                        <img class="block lg:hidden w-10" src="../../icons/logo-mini.jpg" alt="Logo"> 
                </router-link>
            </div>

            <!-- Links Section -->
            <div
                class="items-center md:space-x-8 justify-center justify-items-start md:justify-items-center md:flex md:pt-2 w-full left-0 top-16 px-5 md:px-10 py-3 md:py-0 border-t md:border-t-0 hidden" id="menu" aria-labelledby="Hamberger">

                <router-link :to="{name: 'index'}" class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
                    Home
                </router-link>

                <a
                    class="flex text-gray-600 cursor-pointer transition-colors duration-300 font-semibold text-blue-600">
                    Themes
                </a>

                <a
                    class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
                    Developers
                </a>

              
                <router-link :to="{ hash: '#pricing'}"
                 class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
                 Pricing    
                </router-link>

                <router-link :to="{ hash: '#blog'}"
                 class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
                Blog
                </router-link>

                <router-link :to="{ hash: '#about'}"
                 class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
                 About us    
                </router-link>

                <!-- <button class="btn btn-primary" @click="mail()">toto</button> -->
            </div>

            <!-- Auth Links -->
            <div class="flex items-center space-x-5 hidden md:flex">
                <!-- Register -->
                <a
                    class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
                    <svg
                        class="fill-current h-5 w-5 mr-2 mt-0.5"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        version="1.1"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 0L11.34 .03L15.15 3.84L16.5 2.5C19.75 4.07 22.09 7.24 22.45 11H23.95C23.44 4.84 18.29 0 12 0M12 4C10.07 4 8.5 5.57 8.5 7.5C8.5 9.43 10.07 11 12 11C13.93 11 15.5 9.43 15.5 7.5C15.5 5.57 13.93 4 12 4M12 6C12.83 6 13.5 6.67 13.5 7.5C13.5 8.33 12.83 9 12 9C11.17 9 10.5 8.33 10.5 7.5C10.5 6.67 11.17 6 12 6M.05 13C.56 19.16 5.71 24 12 24L12.66 23.97L8.85 20.16L7.5 21.5C4.25 19.94 1.91 16.76 1.55 13H.05M12 13C8.13 13 5 14.57 5 16.5V18H19V16.5C19 14.57 15.87 13 12 13M12 15C14.11 15 15.61 15.53 16.39 16H7.61C8.39 15.53 9.89 15 12 15Z" />
                    </svg>

                    Register
                </a>

                <!-- Login -->
                <router-link :to="{name: 'login'}" class="" style="background:none;border:none">
                <a
                    class="flex text-gray-600 cursor-pointer transition-colors duration-300 font-semibold text-blue-600">
                    <svg
                        class="fill-current h-5 w-5 mr-2 mt-0.5"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        version="1.1"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M10,17V14H3V10H10V7L15,12L10,17M10,2H19A2,2 0 0,1 21,4V20A2,2 0 0,1 19,22H10A2,2 0 0,1 8,20V18H10V20H19V4H10V6H8V4A2,2 0 0,1 10,2Z" />
                    </svg>

                    Login
                </a>
            </router-link>
            </div>

            <!-- Hamberger Menu -->
            <!-- <button
                class="w-10 h-10 md:hidden justify-self-end rounded-full hover:bg-gray-100" id="Hamberger" aria-expanded="true" aria-haspopup="true">
                <svg
                    class="mx-auto"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.1"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24">
                    <path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
                </svg>
            </button> -->
            <router-link :to="{name: 'login'}" class="" style="background:none;border:none">
                <a
                    class="flex text-gray-600  md:hidden cursor-pointer transition-colors duration-300 font-semibold text-blue-600">
                    <svg
                        class="fill-current h-10 w-10 mr-2 mt-0.5"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        version="1.1"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M10,17V14H3V10H10V7L15,12L10,17M10,2H19A2,2 0 0,1 21,4V20A2,2 0 0,1 19,22H10A2,2 0 0,1 8,20V18H10V20H19V4H10V6H8V4A2,2 0 0,1 10,2Z" />
                    </svg>
                </a>
            </router-link>
        </nav>
    </header>

    <!-- Hero -->
    <section
        class="flex flex-wrap items-center -mx-3 font-sans px-4 mx-auto w-full lg:max-w-screen-lg sm:max-w-screen-sm md:max-w-screen-md pb-20">
        <!-- Column-1 -->
        <div class="px-3 w-full lg:w-2/5">
            <div
                class="mx-auto mb-8 max-w-lg text-center lg:mx-0 lg:max-w-md lg:text-left">
                <h2 class="mb-4 text-3xl font-bold text-left lg:text-5xl">
                    Exclusive Agency For

                    <span class="text-5xl text-cyan-600  leading-relaxeds"
                        >Technology
                    </span>

                    Provide Solution
                </h2>

                <p
                    class="visible mx-0 mt-3 mb-0 text-sm leading-relaxed text-left text-slate-400">
                    Helping you maximize operations management with digitization
                </p>
            </div>

            <div class="text-center lg:text-left">
                <a
                    class="block visible py-4 px-8 mb-4 text-xs font-semibold tracking-wide leading-none text-white bg-cyan-600 rounded cursor-pointer sm:mr-3 sm:mb-0 sm:inline-block"
                    >Key Features</a
                >

                <a
                    class="block visible py-4 px-8 text-xs font-semibold leading-none bg-white rounded border border-solid cursor-pointer sm:inline-block border-slate-200 text-slate-500"
                    >How We Work?</a
                >
            </div>
        </div>

        <!-- Column-2 -->
        <div class="px-3 mb-12 w-full lg:mb-0 lg:w-3/5">
            <!-- Illustrations Container -->q
            <div class="flex justify-center items-center">
                <img src="../../icons/illustration-transformed.webp" >            
            </div>
        </div>
    </section>
        <!-- Content -->
        <section class="p-20 space-y-8" id="blog">
        <h1 class="text-4xl text-center my-20">Tempor sit labore nostrud</h1>
        <p>
            Incididunt eu pariatur laborum reprehenderit duis ex cillum fugiat.
            Occaecat tempor commodo officia esse reprehenderit commodo. Irure nisi
            culpa anim velit esse do esse veniam dolore fugiat. Non anim elit ad
            ad esse veniam dolore labore consectetur nulla dolor occaecat quis
            tempor. Ad do exercitation cillum duis consequat. Ea anim aute elit
            velit duis quis. Anim sint ut occaecat officia id exercitation ea
            incididunt exercitation sint ex. Reprehenderit ut qui eiusmod
            cupidatat incididunt ad reprehenderit culpa tempor quis. Elit eu dolor
            anim tempor eu fugiat voluptate dolor aliqua sint ex proident ullamco.
            Labore deserunt velit quis cupidatat aliquip elit do labore ut.
            Laborum dolore incididunt officia esse reprehenderit pariatur ullamco
            consectetur tempor officia. Dolor culpa irure enim aute ex non veniam
            eiusmod ipsum elit est sit mollit dolor. Est ad anim pariatur
            consequat ad sit nisi.
        </p>
        <p>
            Incididunt eu pariatur laborum reprehenderit duis ex cillum fugiat.
            Occaecat tempor commodo officia esse reprehenderit commodo. Irure nisi
            culpa anim velit esse do esse veniam dolore fugiat. Non anim elit ad
            ad esse veniam dolore labore consectetur nulla dolor occaecat quis
            tempor. Ad do exercitation cillum duis consequat. Ea anim aute elit
            velit duis quis. Anim sint ut occaecat officia id exercitation ea
            incididunt exercitation sint ex. Reprehenderit ut qui eiusmod
            cupidatat incididunt ad reprehenderit culpa tempor quis. Elit eu dolor
            anim tempor eu fugiat voluptate dolor aliqua sint ex proident ullamco.
            Labore deserunt velit quis cupidatat aliquip elit do labore ut.
            Laborum dolore incididunt officia esse reprehenderit pariatur ullamco
            consectetur tempor officia. Dolor culpa irure enim aute ex non veniam
            eiusmod ipsum elit est sit mollit dolor. Est ad anim pariatur
            consequat ad sit nisi.
        </p>
        <p>
            Incididunt eu pariatur laborum reprehenderit duis ex cillum fugiat.
            Occaecat tempor commodo officia esse reprehenderit commodo. Irure nisi
            culpa anim velit esse do esse veniam dolore fugiat. Non anim elit ad
            ad esse veniam dolore labore consectetur nulla dolor occaecat quis
            tempor. Ad do exercitation cillum duis consequat. Ea anim aute elit
            velit duis quis. Anim sint ut occaecat officia id exercitation ea
            incididunt exercitation sint ex. Reprehenderit ut qui eiusmod
            cupidatat incididunt ad reprehenderit culpa tempor quis. Elit eu dolor
            anim tempor eu fugiat voluptate dolor aliqua sint ex proident ullamco.
            Labore deserunt velit quis cupidatat aliquip elit do labore ut.
            Laborum dolore incididunt officia esse reprehenderit pariatur ullamco
            consectetur tempor officia. Dolor culpa irure enim aute ex non veniam
            eiusmod ipsum elit est sit mollit dolor. Est ad anim pariatur
            consequat ad sit nisi.
        </p>
    </section>

    <!-- Princing cards -->
    <section
        class="flex flex-col w-full h-[600px] bg-cover bg-center flex justify-center items-center" id="pricing" >
        <div class="w-full mx-auto bg-white px-5 py-10 text-gray-600 mb-10" >
        <div class="max-w-5xl mx-auto md:flex" >
            <div class="md:w-1/4 md:flex md:flex-col">
                <div class="text-left w-full flex-grow md:pr-5">
                    <h1 class="text-4xl font-bold mb-5"  >Pricing</h1>
                    <h3 class="text-md font-medium mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit repellat dignissimos laboriosam odit accusamus porro*</h3>
                </div>
                <div class="w-full mb-2" >
                    <p class="text-xs">*Lorem ipsum sit amet</p>
                </div>
            </div>
            <div class="md:w-3/4">
                <div class="max-w-4xl mx-auto md:flex">
                    <div class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                        <div class="w-full flex-grow">
                            <h2 class="text-center font-bold uppercase mb-4">PERSONAL</h2>
                            <h3 class="text-center font-bold text-4xl mb-5">$5<span class="text-sm">/mo</span></h3>
                            <ul class="text-sm mb-8">
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Lorem ipsum</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Dolor sit amet</li>
                            </ul>
                        </div>
                        <div class="w-full">
                            <button class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full">Buy Now</button>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:relative md:flex md:flex-col">
                        <div class="w-full flex-grow">
                            <h2 class="text-center font-bold uppercase mb-4">TEAM</h2>
                            <h3 class="text-center font-bold text-4xl md:text-5xl mb-5">$15<span class="text-sm">/mo</span></h3>
                            <ul class="text-sm mb-8">
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Lorem ipsum</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Dolor sit amet</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Consectetur</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Adipisicing</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Elit repellat</li>
                            </ul>
                        </div>
                        <div class="w-full">
                            <button class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full">Buy Now</button>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                        <div class="w-full flex-grow">
                            <h2 class="text-center font-bold uppercase mb-4">PRO</h2>
                            <h3 class="text-center font-bold text-4xl mb-5">$35<span class="text-sm">/mo</span></h3>
                            <ul class="text-sm mb-8">
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Lorem ipsum</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Dolor sit amet</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Consectetur</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Adipisicing</li>
                                <li class="leading-tight"><i class="mdi mdi-check-bold text-lg"></i> Much more...</li>
                            </ul>
                        </div>
                        <div class="w-full">
                            <button class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


</main>

<!-- Footer -->
<footer class="bg-gray-800 pt-96 sm:pt-2" id="about" >
    <div class="max-w-6xl m-auto text-gray-800 flex flex-wrap justify-left ">
        <!-- Col-1 -->
        <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
            <!-- Col Title -->
            <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                Getting Started
            </div>

            <!-- Links -->
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Installation
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Release Notes
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Upgrade Guide
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Using with Preprocessors
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Optimizing for Production
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Browser Support
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                IntelliSense
            </a>
        </div>

        <!-- Col-2 -->
        <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
            <!-- Col Title -->
            <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                Core Concepts
            </div>

            <!-- Links -->
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Utility-First
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Responsive Design
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Hover, Focus, & Other States
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Dark Mode
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Adding Base Styles
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Extracting Components
            </a>
            <a
                href="#"
                class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                Adding New Utilities
            </a>
        </div>

      
    </div>

    <!-- Copyright Bar -->
    <div class="pt-2">
        <div
            class="flex pb-5 px-3 m-auto pt-5 border-t border-gray-500 text-gray-400 text-sm flex-col md:flex-row max-w-6xl">
            <div class="mt-2">© Copyright 1998-year. All Rights Reserved.</div>

            <!-- Required Unicons (if you want) -->
            <div class="md:flex-auto md:flex-row-reverse mt-2 flex-row flex">
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-facebook-f"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-twitter-alt"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-youtube"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-linkedin"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
</template>

<script>
export default {
    setup() {
        const mail = () => {
            axios.get('api/mail');
        }

        return {
            mail
        }
    },
}
</script>
<style>
section {
    font-family: "Poppins", sans-serif;
}
</style>