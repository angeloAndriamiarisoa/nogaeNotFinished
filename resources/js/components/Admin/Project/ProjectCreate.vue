<template>
    <div class="container">
        <div  v-if="errors.length !== 0">
            <template v-for="error in errors" :key="error">
                <p  class="alert alert-danger" role="alert">{{error}}</p>
            </template>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="" v-model="form.name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="" rows="3" v-model="form.description"></textarea>
        </div>
        <button class="btn btn-primary" @click="storeProject">SAVE</button>
    </div>
    <!-- </form> -->
</template>
<script>
import { reactive } from 'vue';
import useProject from '../../../services/projectServices';
export default {
    setup() {
        const form = reactive({
            name: '',
            description: '',
        });

        const { createProject, errors } = useProject();

        const storeProject = async () => {
            await createProject({...form});
        }
        
        return {
            form,
            storeProject,
            errors
        }
    },
}
</script>