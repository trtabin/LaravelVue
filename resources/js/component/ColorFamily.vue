<template>
    <div class="container shadow p-3 rounded-1">
        <div v-for="item in this.$store.state.colors" :key="item.color">
            <div class="row">
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
                            <tr v-for="size in item.size" :key="size">
                                <th scope="row">1</th>
                                <td>{{ size }}</td>
                                <td>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="exampleInputEmail1"
                                        aria-describedby="emailHelp"
                                        placeholder="Exclusive punjabi"
                                    />
                                </td>
                                <td>
                                    <button
                                        @click="deleteSize(item.color, size)"
                                        type="button"
                                        class="btn btn-primary"
                                    >
                                        Primary
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
            // console.log(this.$store.state.colors);
            // this.$store.state.colors = this.$store.state.colors.filter(
            //     (x) => x.color !== item
            // );
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
            // this.$store.commit("deleteColor", item);
        },
    },
};
</script>
