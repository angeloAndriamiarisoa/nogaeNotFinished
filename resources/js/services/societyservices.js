import { advancePositionWithClone } from "@vue/compiler-core";
import axios from "axios"
import { ref } from "vue";

export default function useSociety()
{
    const societies = ref([]);

    const society = ref([]);

    const errors = ref([]);

    const getSocieties = async () => {
        let response = await axios.get('/api/society');
        societies.value = response.data.data;   
    }

    const getSociety = async (id) => {
        let response = await axios.get('/api/society/' + id)
        society.value = response.data.data;
    }

    const createSociety = async (data) => {
        errors.value = [];
        try{
            await axios.post('/api/society', data);
        }
        catch (error)
        {
            const errorCreateSociety = error.response.data.errors;
            for(let key in errorCreateSociety)
            {
                errors.value.push(errorCreateSociety[key][0]);
            }
        }
    }

    const updateSociety = async (id) => {
        errors.value = [];
        try {
            await axios.put('/api/society/' + id, society.value);
        }
        catch (error)
        {
            const errorUpdateSociety =  error.response.data.errors;
            for(let key in errorUpdateSociety)
            {
                errors.value.push(errorUpdateSociety[key][0]);
            }
        }
    }

    const destroySociety = async (id) => {
        await axios.delete('/api/society/' + id);
        await getSocieties();
    }

    /**
     * Search society 
     */
    const searchSociety = async (toSearch) => {
        let response = await axios.get('/api/search-society/' + toSearch);
        societies.value = response.data.data;
    }

    return {
        getSocieties,
        societies,
        createSociety,
        getSociety,
        society,
        updateSociety,
        destroySociety,
        errors,
        searchSociety
    }
}