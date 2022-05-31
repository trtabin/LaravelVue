<template>
    <div class="container shadow p-3 rounded-1">
        <div v-for="color in colors" :key="color.id">
            <div class="row">
                <div class="col">
                    {{ color.name }}
                    <button
                        @click="$emit('delete')"
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
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
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
                                        type="button"
                                        class="btn btn-primary"
                                    >
                                        Primary
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
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
                                        type="button"
                                        class="btn btn-primary"
                                    >
                                        Primary
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
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
    props: ["colors"],
    emits: ["delete"],
};
</script>
