<template>
    <div
        v-if="this.$store.state.colors.length > 0"
        class="bg-body shadow-lg my-2 rounded-1"
    >
        <p class="h5 mb-3 mt-2">Color Family Images</p>
        <div v-for="item in this.$store.state.colors" :key="item.color">
            <div class="row">
                <div class="col row">
                    <div class="col">
                        {{ item.color }}
                        <button
                            @click="deleteColor(item.color)"
                            type="button"
                            class="btn btn-danger"
                        >
                            <img
                                style="width: 30px; height: auto"
                                src="delete.png"
                            />
                        </button>
                    </div>
                    <div
                        class="col container border border-secondary mb-4 bg-dark rounded-2"
                        style="min-height: 250px; min-width: 450px"
                    >
                        <input
                            id="fileUpload"
                            type="file"
                            multiple
                            @change="uploadImage($event, item.color)"
                            hidden
                        />

                        <button
                            @click="chooseFiles()"
                            class="bg-white rounded-1"
                        >
                            select a file
                        </button>
                        <div
                            v-for="image in item.images"
                            :key="image"
                            style="display: flex"
                        >
                            <div>
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
                </div>
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr class="table-secondary">
                                <th scope="col">#</th>
                                <th scope="col">Size</th>
                                <th scope="col">Stock Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(product, count) in item.products"
                                :key="count"
                            >
                                <th scope="row">{{ count + 1 }}</th>
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
                                        class="btn btn-danger"
                                    >
                                        <img
                                            style="width: 30px; height: auto"
                                            src="delete.png"
                                        />
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
        chooseFiles() {
            document.getElementById("fileUpload").click();
        },
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
                    ].products = this.$store.state.colors[
                        index
                    ].products.filter((x) => x.size !== size);
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
                    this.$store.state.colors[
                        index
                    ].images = this.$store.state.colors[index].images.filter(
                        (x) => x !== image
                    );
                }
            }
        },
    },
};
</script>
