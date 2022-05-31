<template>
    <div class="row m-2">
        <div class="col"><BasicInfo /></div>
        <div class="col"><AddVariants /></div>
    </div>
    <div class="row m-2">
        <ColorFamily :colors="colors" />
    </div>
</template>

<script>
import BasicInfo from "./component/BasicInfo";
import AddVariants from "./component/AddVariants";
import ColorFamily from "./component/ColorFamily";
export default {
    data() {
        return {
            colors: [
                { id: 1, name: "Green" },
                { id: 2, name: "Yellow" },
            ],
        };
    },

    components: {
        BasicInfo,
        AddVariants,
        ColorFamily,
    },
};
</script>
