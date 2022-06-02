import { createStore } from "vuex";
import { useToast } from "vue-toastification";
const toast = useToast();
let initialState = {
    productName: "",
    category: "",
    videoLink: "",
    price: "",
    salePrice: "",
    colors: [],
    productDetails: "",
    seoTitle: "",
    seoDescription: "",
};
export const store = createStore({
    state() {
        return {
            productName: "",
            category: "",
            videoLink: "",
            price: "",
            salePrice: "",
            colors: [],
            productDetails: "",
            seoTitle: "",
            seoDescription: "",
        };
    },
    mutations: {
        addColor(state, payload) {
            state.colors.push(payload);
            // console.log(state.colors);
            state;
        },
        deleteColor(state, item) {
            this.state.colors = this.state.colors.filter(
                (x) => x.color !== item
            );
            console.log(this.state.colors);
        },
        deleteSize(state, payload) {
            let { color, size } = payload;
            for (let index = 0; index < this.state.colors.length; index++) {
                if (this.state.colors[index].color === color) {
                    this.state.colors[index].products = this.state.colors[
                        index
                    ].products.filter((x) => x.size !== size);
                }
            }
        },
        async uploadImage(state, payload) {
            let { e, color } = payload;
            for (let index = 0; index < this.state.colors.length; index++) {
                if (this.state.colors[index].color === color) {
                    let selectedFiles = e.target.files;
                    for (let i = 0; i < selectedFiles.length; i++) {
                        let formData = new FormData();
                        formData.set("image", selectedFiles[i]);
                        const { data } = await axios.post("/upload", formData);
                        console.log(data);
                        this.state.colors[index].images.push({
                            name: data.name,
                            url: URL.createObjectURL(selectedFiles[i]),
                            file: selectedFiles[i],
                        });
                    }
                }
            }
        },
        deleteImage(state, payload) {
            let { image, color } = payload;
            for (let index = 0; index < this.state.colors.length; index++) {
                if (this.state.colors[index].color === color) {
                    this.state.colors[index].images = this.state.colors[
                        index
                    ].images.filter((x) => x !== image);
                }
            }
        },
        submit(state) {
            console.log(this.state);
            let value = axios
                .post("/product", this.state)
                .then(function (response) {
                    toast.success("Product Info Uploaded");
                    store.replaceState({
                        productName: "",
                        category: "",
                        videoLink: "",
                        price: "",
                        salePrice: "",
                        colors: [],
                        productDetails: "",
                        seoTitle: "",
                        seoDescription: "",
                    });
                })
                .catch(function (error) {
                    toast.error("Failed to Upload Product Info.");
                });
        },
    },
});

// return {
//     productName: "",
//     category: [],
//     videoLink: "",
//     price: "",
//     salePrice: "",
//     colors: [
//         {
//             color: "",
//             products: [
//                 { size: "", quantity: "" },
//                 { size: "", quantity: "" },
//             ],
//             images: [],
//         },
//     ],

//     productDetails: "",
//     seoTitle: "",
//     seoDescription: "",
// }
