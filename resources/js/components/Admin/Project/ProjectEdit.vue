<template>
    <div class="container">
        <div  v-if="errors.length !== 0">
            <template v-for="error in errors" :key="error">
                <p  class="alert alert-danger" role="alert">{{error}}</p>
            </template>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="" v-model="project.name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="" rows="3" v-model="project.description"></textarea>
        </div>
        <button class="btn btn-primary" @click="saveProject">ENREGISTER</button>
    </div>
</template>

<script>
import { onMounted } from 'vue';
import useProject from '../../../services/projectServices'
export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props) {
        const { getProject, updateProject, project, errors } = useProject();
        
        onMounted(getProject(props.id));

        const saveProject = async () => {
           await updateProject(props.id);
        }
        
        return {
            project,
            saveProject,
            errors
        }
    },
}
</script>

