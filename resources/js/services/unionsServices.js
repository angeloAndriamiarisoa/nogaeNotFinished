import axios from "axios";
import { ref } from "vue";

export default function useUnion () {
    const count = ref([]);

    /**
     *  Get the number of project, tasks, users
     */
    const countPTU = async () => {
      let response = await axios.get('/api/countPTU');
      count.value = response.data.data;
    }


    return {
      countPTU,
      count,
      countTotalTaskDone,
      countTaskdone,
      countProjectDone,
      countTotalProjectDone
    }
}