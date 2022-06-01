<template>
    <div class="container shadow p-3 rounded-1">
        <div v-for="item in this.$store.state.colors" :key="item.color">
            <div class="row">
                <div class="col row">
                    <div class="col">
                        {{ item.color }}
                        <button
                            @click="deleteColor(item.color)"
                            type="button"
                            class="btn btn-primary"
                        >
                            Delete
                        </button>
                    </div>
                    <div class="col">
                        <input
                            id="file-upload"
                            type="file"
                            multiple
                            @change="uploadImage($event, item.color)"
                        />
                        <div v-for="image in item.images" :key="image">
                            <img
                                style="max-width: 50px; heigth: auto"
                                :src="image.url"
                            />
                            <button @click="deleteImage(image, item.color)">
                                +
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Size</th>
                                <th scope="col">Stock Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="product in item.products"
                                :key="product.size"
                            >
                                <th scope="row">{{ product.quantity }}</th>
                                <td>{{ product.size }}</td>
                                <td>
                                    <input
                                        v-model="product.quantity"
                                        type="email"
                                        class="form-control"
                                        id="exampleInputEmail1"
                                        aria-describedby="emailHelp"
                                        placeholder="Exclusive punjabi"
                                    />
                                </td>
                                <td>
                                    <button
                                        @click="
                                            deleteSize(item.color, product.size)
                                        "
                                        type="button"
                                        class="btn btn-primary"
                                    >
                                        Delete Size
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            productImages: [],
        };
    },
    methods: {
        deleteColor(item) {
            console.log(this.$store.state.colors);
            this.$store.state.colors = this.$store.state.colors.filter(
                (x) => x.color !== item
            );
            console.log(this.$store.state.colors);

            // this.$store.commit("deleteColor", item);
        },
        deleteSize(color, size) {
            console.log(color + size);
            for (
                let index = 0;
                index < this.$store.state.colors.length;
                index++
            ) {
                if (this.$store.state.colors[index].color === color) {
                    this.$store.state.colors[
                        index
                    ].size = this.$store.state.colors[index].size.filter(
                        (x) => x !== size
                    );
                }
            }
        },

        uploadImage(e, color) {
            // let selectedFiles = e.target.files;
            // for (let i = 0; i < selectedFiles.length; i++) {
            //     this.productImages.push({
            //         name: selectedFiles[i].name,
            //         url: URL.createObjectURL(selectedFiles[i]),
            //         file: selectedFiles[i],
            //     });
            // }
            // console.log(color);

            for (
                let index = 0;
                index < this.$store.state.colors.length;
                index++
            ) {
                if (this.$store.state.colors[index].color === color) {
                    let selectedFiles = e.target.files;
                    for (let i = 0; i < selectedFiles.length; i++) {
                        this.$store.state.colors[index].images.push({
                            name: selectedFiles[i].name,
                            url: URL.createObjectURL(selectedFiles[i]),
                            file: selectedFiles[i],
                        });
                    }
                }
            }
        },
        deleteImage(image, color) {
            for (
                let index = 0;
                index < this.$store.state.colors.length;
                index++
            ) {
                if (this.$store.state.colors[index].color === color) {
                    this.$store.state.colors[index].images.pop(image);
                }
            }
        },
    },
};
</script>
