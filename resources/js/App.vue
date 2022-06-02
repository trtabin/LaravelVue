<template>
    <div class="m-3">
        <div class="row">
            <div class="col-7"><BasicInfo /></div>
            <div class="col-5"><AddVariants /></div>
        </div>
        <div class="row">
            <ColorFamily />
        </div>
        <div class="row">
            <ProductDetails />
        </div>
        <div class="row">
            <SEO />
        </div>
        <div>
            <button
                @click="this.$store.commit('submit')"
                class="btn btn-success"
            >
                Submit
            </button>
        </div>
    </div>
</template>

<script>
import BasicInfo from "./component/BasicInfo";
import AddVariants from "./component/AddVariants";
import ColorFamily from "./component/ColorFamily";
import ProductDetails from "./component/ProductDetails";
import SEO from "./component/SEO";

export default {
    components: {
        BasicInfo,
        AddVariants,
        ColorFamily,
        ProductDetails,
        SEO,
    },
};
</script>
