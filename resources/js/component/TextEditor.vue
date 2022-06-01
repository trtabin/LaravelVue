<template>
    <QuillEditor
        style="min-height: 20rem"
        theme="snow"
        toolbar="minimal"
        @textChange="onEditorChange()"
        ref="myEditor"
    />
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
            console.log(this.$refs.myEditor.getHTML());
        },
    },
};
</script>
