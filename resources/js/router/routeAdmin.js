import Dashboard from '../components/Admin/Dashboard.vue';
const admin = 'admin';
const routeAdmin = [
    {
        path: '/admin',
        name: 'admin',
        component: Dashboard,
        meta: {
            needConnected: true,
        },
        children: [
            {
                path: 'profil',
                name: 'profil.admin',
                component: () => import('../components/Profil.vue')
            },
            {
                path: '/update-profile/:id',
                name: 'update.profile.admin',
                props : true,
                component : () => import('../components/UpdateProfile.vue')
        
            },
            {
                path: 'projects',
                name: 'list.project.admin',
                component: () => import('../components/Admin/Project/ProjectIndex.vue')

            },
            {
                path: 'create/project',
                name: 'create.project.admin',
                component: () => import('../components/Admin/Project/ProjectCreate.vue')

            },
            {
                path: 'edit/project/:id',
                name: 'edit.project.admin',
                props: true,
                component: () => import('../components/Admin/Project/ProjectEdit.vue')

            },
            {
                path: 'description/project/:id',
                name: 'description.project.admin',
                props: true,
                component: () => import('../components/Admin/Project/ProjectDescription.vue')

            },

            /**
             * route for the task
             */
            {
                path: 'tasks',
                name: 'list.tasks.admin',
                component: () => import('../components/Admin/Task/TaskIndex.vue')

            },
            {
                path: 'create/task/:id',
                name: 'create.task.admin',
                props: true,
                component: () => import('../components/Admin/Task/TaskCreate.vue')

            },
            {
                path: 'edit/task/:id',
                name: 'edit.task.admin',
                props: true,
                component: () => import('../components/Admin/Task/TaskEdit.vue')

            },
            /**
             * route of user
             */
            {
                path: 'users',
                name: 'list.users.admin',
                component: () => import('../components/Admin/User/UserIndex.vue')

            },
            {
                path: 'create/user',
                name: 'create.user.admin',
                component: () => import('../components/Admin/User/UserCreate.vue')

            },
            {
                path: 'edit/user/:id',
                name: 'edit.user.admin',
                props: true,
                component: () => import('../components/Admin/User/UserEdit.vue')

            },
            /**
             * route of assignment
             */
            {
                path: 'assignments',
                name: 'list.assignments.admin',
                component: () => import('../components/Admin/Assignment/AssignmentIndex.vue')
                
            },
            {
                path: 'unassigned',
                name: 'list.unassigned.admin',
                component: () => import('../components/Admin/Assignment/UnassignIndex.vue')
                
            },
            {
                path: 'create/assignment/:id/:actuel_task_id',
                name: 'create.assignment.admin',
                props: true,
                component: () => import('../components/Admin/Assignment/AssignCreate.vue')

            },           
            {
                path: 'update/assignment/:id/:actuel_task_id',
                name: 'update.assignment.admin',
                props: true,
                component: () => import('../components/Admin/Assignment/AssignUserUpdate.vue')

            },
            // {
            //     path: 'create/user',
            //     name: 'create.user.admin',
            //     component: () => import('../components/Admin/User/UserCreate.vue')

            // },
            // {
            //     path: 'edit/user/:id',
            //     name: 'edit.user.admin',
            //     props: true,
            //     component: () => import('../components/Admin/User/UserEdit.vue')
            // },
        ]
    }
];

export default routeAdmin;