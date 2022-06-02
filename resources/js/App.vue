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
            <button @click="submit()" class="btn btn-success">Submit</button>
        </div>
    </div>
</template>

<script>
import BasicInfo from "./component/BasicInfo";
import AddVariants from "./component/AddVariants";
import ColorFamily from "./component/ColorFamily";
import ProductDetails from "./component/ProductDetails";
import SEO from "./component/SEO";

import { useToast } from "vue-toastification";
export default {
    setup() {
        const toast = useToast();
        return { toast };
    },
    components: {
        BasicInfo,
        AddVariants,
        ColorFamily,
        ProductDetails,
        SEO,
    },
    methods: {
        submit() {
            // this.toast.info("I'm an info toast!");

            console.log(this.$store.state);
            axios
                .post("/product", this.$store.state)
                .then(function (response) {
                    useToast().success("Product Info Uploaded");
                    // console.log(response.data);
                })
                .catch(function (error) {
                    useToast().error("Failed to Upload Product Info.");
                    // console.log(error);
                });
        },
    },
};
</script>
