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
                            @click="
                                this.$store.commit('deleteColor', item.color)
                            "
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
                            @change="
                                this.$store.commit('uploadImage', {
                                    e: $event,
                                    color: item.color,
                                })
                            "
                        />
                        <div
                            style="display: flex; flex-wrap: wrap; margin: 10px"
                        >
                            <div
                                v-for="image in item.images"
                                :key="image"
                                style="margin: 4px"
                            >
                                <div
                                    class="col"
                                    style="
                                        display: flex;
                                        flex-direction: column;
                                    "
                                >
                                    <img
                                        style="max-width: 50px; heigth: auto"
                                        :src="image.url"
                                    />
                                    <button
                                        style="
                                            max-width: 50px;
                                            min-height: 20px;
                                        "
                                        @click="
                                            this.$store.commit('deleteImage', {
                                                image: image,
                                                color: item.color,
                                            })
                                        "
                                    >
                                        <div style="transform: rotate(45deg)">
                                            +
                                        </div>
                                    </button>
                                </div>
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
                                        placeholder="0"
                                    />
                                </td>
                                <td>
                                    <button
                                        @click="
                                            this.$store.commit('deleteSize', {
                                                color: item.color,
                                                size: product.size,
                                            })
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
