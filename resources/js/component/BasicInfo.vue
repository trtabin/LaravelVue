<template>
    <div class="container shadow p-3 rounded-1">
        <p class="text-center">Basic Information</p>

        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                    >Product Name</label
                >
                <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Exclusive punjabi"
                />
            </div>

            <div class="row mb-3">
                <div class="col">
                    <select
                        class="form-select"
                        aria-label="Default select example"
                    >
                        <option>Select category *</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select
                        class="form-select"
                        aria-label="Default select example"
                    >
                        <option selected>Select sub category *</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <select
                        class="form-select"
                        aria-label="Default select example"
                    >
                        <option selected>Select sub sub category*</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <input
                    type="text"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Video Link (optional)"
                />
            </div>

            <div class="row mb-3">
                <div class="col row">
                    <div class="col-3">price</div>
                    <div class="col-9">
                        <input
                            type="text"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="0"
                        />
                    </div>
                </div>
                <div class="col row">
                    <div class="col-3">sale price</div>
                    <div class="col-9">
                        <input
                            type="text"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="0"
                        />
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-3">size chart (optional)</div>
                <div class="col"><input type="file" name="" id="" /></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
