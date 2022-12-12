import { createRouter, createWebHistory } from 'vue-router';
import routeSimpleUser from './routeSimpleUser.js';
import routeSuperAdmin from './routeSuperAdmin.js';
import routeAdmin from './routeAdmin.js';
import Login from '../components/Login.vue';
// import Dashboard from '../components/Admin/Dashboard.vue';
import NotFound from '../components/404.vue';
import store from '../store';

// import EmployeIndex from '../components/Employee/EmployeeIndex.vue';
// import EmployeeCreate from '../components/Employee/EmployeeCreate.vue';
// import EmployeeEdit from '../components/Employee/EmployeeEdit.vue';

// import TaskIndex from '../components/task/TaskIndex.vue';
// import TaskCreate from '../components/task/TaskCreate.vue';
// import TaskEdit from '../components/task/TaskEdit.vue';

// import SocietyIndex from '../components/Society/SocietyIndex.vue';
// import SocietyCreate from '../components/Society/SocietyCreate.vue';
// import SocietyEdit from '../components/Society/SocietyEdit.vue';

// import ProjectIndex from '../components/Project/ProjectIndex.vue';
// import ProjectCreate from '../components/Project/ProjectCreate.vue';
// import ProjectEdit from '../components/Project/ProjectEdit.vue';

const Accueil = () => import('../components/Accueil.vue');
// const ProjectCreate = () => import('../components/Project/ProjectCreate.vue');
// const ProjectEdit = () => import('../components/Project/ProjectEdit.vue');
// const User = () => import('../components/test/PivotTest.vue');


// const Assign = () => import('../components/AssignTask.vue');

const routes = [ 
    ...routeSimpleUser,
    ...routeSuperAdmin,
    ...routeAdmin,
     /**
     * route to index of application
     */
    {
        path : '/',
        name: 'index',
        component : Accueil,
    },

    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/reset-password',
        name: 'reset',
        component : () => import('../components/Reset.vue')

    },   
    {
        path: '/:catchAll(.*)',
        name: 'NotFound',
        component: NotFound
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (to.hash ==='#pricing') { 
          return {
            el: to.hash,
            top:100,     
          }
        }
        else{
            return{
                el:to.hash
            }
        }
      },
});

router.beforeEach((to, from, next) => { 
    console.log(to.name)
    let role = parseInt(localStorage.getItem('role'));

    if (to.meta.needConnected && !localStorage.getItem('token')) {
        next({name: 'login'});   
    } 
    else { 
        let regexSuper = /superadmin/g;
        let foundSuper =  to.name.match(regexSuper);

        let regexAdmin = /admin/g;
        let foundAdmin =  to.name.match(regexAdmin);

        let regexUser= /user/g;
        let foundUser =  to.name.match(regexUser);

        window.axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`
        if(role === 0 && to.name !== "user" && !foundUser){
            next({name: 'user'});
            return;  
        }

        if(role === 1 && to.name !== "admin" && !foundAdmin){
            next({name: 'admin'});
            return;  
        }

        if(role === 2 && to.name !== "superadmin" && !foundSuper){
            next({name: 'superadmin'});
            return;  
        }
        next();

    }
});

export default router;

