<template>
    <div class="col bg-body shadow-lg m-1 rounded-1" style="min-height: 18rem">
        <p class="display-7 mb-3 mt-2">
            Product Details
            <span class="text-danger">*</span>
        </p>
        <QuillEditor
            style="height: 10rem"
            theme="snow"
            toolbar="essential"
            @textChange="onEditorChange()"
            ref="myEditor"
        />
    </div>
</template>

<script>
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";

export default {
    components: {
        QuillEditor,
    },
    methods: {
        onEditorChange() {
            this.$store.state.productDetails = this.$refs.myEditor.getHTML();
            // console.log(this.$refs.myEditor.getHTML());
        },
    },
};
</script>
