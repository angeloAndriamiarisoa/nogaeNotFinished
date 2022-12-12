import User from '../components/User/Dashboard.vue';


const routeSimpleUser = [
    {
        name: 'user',
        path: '/user',
        component: User,
        meta: {
            needConnected : true,
        },
        children: [
            {
                path: 'profil',
                name: 'profil.user',
                component: () => import('../components/Profil.vue')
            },
            {
                path: '/update-profile',
                name: 'update.profile.user',
                component : () => import('../components/UpdateProfile.vue')
        
            },
            {
                path: 'projects',
                name: 'list.project.user',
                component: () => import('../components/User/ListProjects.vue')
            },
            {
                path: 'tasks',
                name: 'list.tasks.user',
                component: () => import('../components/User/ListTasks.vue')
            },
            {
                path: 'drag/:project',
                name: 'drag.user',
                component: () => import('../components/User/Drag.vue'),
                props: true
            },
            {
                path: 'chart',
                name: 'chart.user',
                component: () => import('../components/User/Resume.vue')
            },
        ]
    }
];

export default routeSimpleUser;