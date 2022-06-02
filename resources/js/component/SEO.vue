<template>
    <div class="col bg-body shadow-lg m-1 rounded-1">
        <div @click="toggleValue" class="row text-center">
            <p style="cursor: pointer" class="display-7">
                SEO (Optional)
                <img
                    v-if="!this.value"
                    style="width: 20px; height: auto"
                    src="expand_more.png"
                />
                <img
                    v-if="this.value"
                    style="width: 20px; height: auto"
                    src="expand_less.png"
                />
            </p>
        </div>
        <div v-if="this.value" class="row">
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="display-8"
                        >SEO Title</label
                    >
                    <input
                        v-model="this.$store.state.seoTitle"
                        type="text"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="display-8"
                        >Description For SEO</label
                    >
                    <QuillEditor
                        theme="snow"
                        toolbar="essential"
                        @textChange="onEditorChange()"
                        ref="myEditor"
                        style="min-height: 4rem"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";

export default {
    data() {
        return {
            value: false,
        };
    },
    components: {
        QuillEditor,
    },
    methods: {
        onEditorChange() {
            this.$store.state.seoDescription = this.$refs.myEditor.getHTML();
            // console.log(this.$refs.myEditor.getHTML());
        },
        toggleValue() {
            this.value = !this.value;
        },
    },
};
</script>
