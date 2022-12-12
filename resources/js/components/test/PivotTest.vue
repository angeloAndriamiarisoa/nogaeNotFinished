<template>
    <div>
        <h1>CECI EST TEST POUR UN PROPS</h1>
        <button>TEST</button>
    </div>

</template>

<script setup>
import { onMounted } from 'vue';
onMounted(() => {
    let response = axios.get('/api/test');
    console.log(response);

    const tableA = [1,2];
    const tableB = [3,4];
    console.log(tableA);
    const table = [...tableA, ...tableB];
    console.log(table);
})

</script>
 