<template>
    <h1>
        this is view file {{ id }}
    </h1>
</template>
<script>

import { defineComponent } from 'vue';

export default defineComponent({
    name: 'View',
    props: {
        id: {
            type: Number,
            required: true,
        },
    },

    data() {
        return {
            // id: 25
        };
    },
});
</script>
