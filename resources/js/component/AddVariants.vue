<template>
    <div class="container shadow p-3 rounded-1">
        <p class="text-center">
            Add variants when the product have different versions, such as color
            and size.
        </p>

        <div class="mb-3 mt-3">
            <label for="exampleInputEmail1" class="form-label"
                >Color Family (example=Black,White,Navy etc.)<span
                    class="text-danger"
                    >*</span
                ></label
            >
            <select
                v-model="selected"
                class="form-select"
                aria-label="Default select example"
            >
                <option disabled value="">Select color</option>
                <option value="Green">Green</option>
                <option value="Red">Red</option>
                <option value="Blue">Blue</option>
                <option value="White">White</option>
                <option value="Black">Black</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"
                >Variant (Example=M,L,XL,38,,42 etc.)<span class="text-danger"
                    >*</span
                ></label
            >
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input
                            v-model="checkedSizes"
                            class="form-check-input"
                            type="checkbox"
                            value="M"
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            M
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input
                            v-model="checkedSizes"
                            class="form-check-input"
                            type="checkbox"
                            value="L"
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            L
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input
                            v-model="checkedSizes"
                            class="form-check-input"
                            type="checkbox"
                            value="XL"
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            XL
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input
                            v-model="checkedSizes"
                            class="form-check-input"
                            type="checkbox"
                            value="XXL"
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            XXL
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input
                            v-model="checkedSizes"
                            class="form-check-input"
                            type="checkbox"
                            value="XXXL"
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            XXXL
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input
                            v-model="checkedSizes"
                            class="form-check-input"
                            type="checkbox"
                            value="32"
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            32
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input
                            v-model="checkedSizes"
                            class="form-check-input"
                            type="checkbox"
                            value="44"
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            44
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input
                            v-model="checkedSizes"
                            class="form-check-input"
                            type="checkbox"
                            value="48"
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            48
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input
                            v-model="checkedSizes"
                            class="form-check-input"
                            type="checkbox"
                            value="36"
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            36
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input
                            v-model="checkedSizes"
                            class="form-check-input"
                            type="checkbox"
                            value="40"
                            id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            40
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <button @click="add" type="submit" class="btn btn-success">
            Add to color list
        </button>
    </div>
</template>

<script>
import { useToast } from "vue-toastification";
const toast = useToast();
export default {
    data() {
        return {
            selected: "",
            checkedSizes: [],
            alreadySelected: false,
            products: [],
        };
    },
    methods: {
        add() {
            for (
                let index = 0;
                index < this.$store.state.colors.length;
                index++
            ) {
                if (this.$store.state.colors[index].color === this.selected) {
                    this.alreadySelected = true;
                }
            }
            if (this.selected && !this.alreadySelected) {
                this.checkedSizes.forEach((e) => {
                    this.products.push({
                        size: e,
                        quantity: "",
                    });
                });
                // console.log(this.products);
                toast.success("New color product added.");
                this.$store.commit("addColor", {
                    color: this.selected,
                    products: this.products,
                    images: [],
                });
            } else {
                this.alreadySelected = false;
                toast.error("Select a product that is not alreadly selected.");
            }
            this.selected = "";
            this.checkedSizes = [];
            this.products = [];
        },
    },
};
</script>
