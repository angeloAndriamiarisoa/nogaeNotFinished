import Dashboard from '../components/SuperAdmin/Dashboard_super.vue';

// const Society = () => import('../components/SuperAdmin/Society/SocietyIndex.vue');

const routeSuperAdmin = [
    {
        path: '/super-admin',
        name: 'superadmin',
        component: Dashboard,
        meta: {
            needConnected : true,
        },
        children: [
            {
                path: 'chart',
                name: 'chart.superadmin',
                component: () => import('../components/SuperAdmin/Chart_super.vue')
            },
            // Route of society
            {
                path: 'society',
                name: 'list.society.superadmin',
                component: () => import('../components/SuperAdmin/Society/SocietyIndex.vue')
            },
            {
                path: 'create/society',
                name: 'create.society.superadmin',
                component: () => import('../components/SuperAdmin/Society/SocietyCreate.vue')
            },
            {
                path: 'edit/society/:id',
                name: 'edit.society.superadmin',
                props: true,
                component: () => import('../components/SuperAdmin/Society/SocietyEdit.vue')
            },
            // Route of Project
            {
                path: 'project',
                name: 'list.project.superadmin',
                component: () => import('../components/SuperAdmin/Project/ProjectIndex.vue')
            },
            {
                path: 'create/project',
                name: 'create.project.superadmin',
                component: () => import('../components/SuperAdmin/Project/ProjectCreate.vue')
            },
            {
                path: 'edit/project/:id',
                name: 'edit.project.superadmin',
                props: true,
                component: () => import('../components/SuperAdmin/Project/ProjectEdit.vue')
            },
            // Route of Tasks
            {
                path: 'tasks',
                name: 'list.tasks.superadmin',
                component: () => import('../components/SuperAdmin/Task/TaskIndex.vue')
            },
            {
                path: 'create/task',
                name: 'create.task.superadmin',
                component: () => import('../components/SuperAdmin/Task/TaskCreate.vue')
            },
            {
                path: 'edit/task/:id',
                name: 'edit.task.superadmin',
                props: true,
                component: () => import('../components/SuperAdmin/Task/taskEdit.vue')
            },
            // Route of users
            {
                path: 'users',
                name: 'list.users.superadmin',
                component: () => import('../components/SuperAdmin/User/UserIndex.vue')
            },
            {
                path: 'create/user',
                name: 'create.user.superadmin',
                component: () => import('../components/SuperAdmin/User/UserCreate.vue')
            },
            {
                path: 'edit/user/:id',
                name: 'edit.user.superadmin',
                props: true,
                component: () => import('../components/SuperAdmin/User/UserEdit.vue')
            },
        ]
        
    },
];

export default routeSuperAdmin;