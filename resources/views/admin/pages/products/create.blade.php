@extends('layouts.admin')
@section('title', 'Create Product')

@section('content')
    <h1 class="page-title">Create Product</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.products.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{old('title')}}">
                                        @error('title')
                                        <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="form-group mb-3">
                                        <label for="category">Category</label>

                                        <select name="category" id="category"
                                                class="form-control @error('category') is-invalid @enderror">
                                            <option value="">-- Select Category --</option>
                                            <option value="beans">
                                                Beans
                                            </option>
                                            <option value="pods">
                                                Pods
                                            </option>
                                            <option value="machines">
                                                Machines
                                            </option>
                                            <option
                                                value="accessories">
                                                Accessories
                                            </option>
                                        </select>
                                        @error('category')
                                        <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="form-group mb-3">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" id="price"
                                               class="form-control @error('price') is-invalid @enderror"
                                               value="{{old('price')}}">
                                        @error('price')
                                        <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div> <!-- row -->

                            <div class="row mb-4">
                                <!-- Bean options -->
                                <div class="col-md-6 bean-options" style="display:none;">
                                    <div class="form-group mb-6">
                                        <label for="bean_format">Format Available</label>
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center">
                                                <input type="checkbox" name="bean_format[]" value="250"
                                                       class="form-check-input" style="width: 24px; height: 24px;">
                                                <div class="d-flex flex-column align-items-center mx-2 my-1">
                                                    <label class="form-check-label"
                                                           for="bean_format[]">250g</label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mx-2">
                                                <input type="checkbox" name="bean_format[]" value="1000"
                                                       class="form-check-input" style="width: 24px; height: 24px;">
                                                <div class="d-flex flex-column align-items-center mx-2 my-1">
                                                    <label class="form-check-label"
                                                           for="bean_format[]">1kg</label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mx-2">
                                                <input type="checkbox" name="bean_format[]" value="3000"
                                                       class="form-check-input" style="width: 24px; height: 24px;">
                                                <div class="d-flex flex-column align-items-center mx-2 my-1">
                                                    <label class="form-check-label"
                                                           for="bean_format[]">3kg</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 bean-options" style="display:none;">
                                    <div class="form-group mb-6">
                                        <label for="bean_type">Coffee Type</label>
                                        <select name="bean_type" id="bean_type" class="form-control">
                                            <option value="">-- Select Type --</option>
                                            <option value="single_origin">Single-origin</option>
                                            <option value="blend">Blend</option>
                                            <option value="decaf">Decaffeinated</option>
                                            <option value="pack">Pack</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Pod options -->
                                <div class="col-md-4 pod-options" style="display:none;">
                                    <div class="form-group mb-6">
                                        <label for="pod_quantity">Pods quantity</label>
                                        <select name="pod_quantity" id="pod_quantity" class="form-control">
                                            <option value="">-- Select Quantity --</option>
                                            <option value="12">x12</option>
                                            <option value="24">x24</option>
                                            <option value="36">x36</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 pod-options" style="display:none;">
                                    <div class="form-group mb-6">
                                        <label for="pod_size">Cup size</label>
                                        <select name="pod_size" id="pod_size" class="form-control">
                                            <option value="">-- Select Size --</option>
                                            <option value="small">Small</option>
                                            <option value="medium">Medium</option>
                                            <option value="large">Large</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 pod-options">
                                    <div class="form-group mb-6">
                                        <label for="pod_variety">Variety</label>
                                        <select name="pod_variety" id="pod_variety" class="form-control">
                                            <option value="">-- Select Variety --</option>
                                            <option value="espresso">Espresso</option>
                                            <option value="long_black">Long Black</option>
                                            <option value="white">White</option>
                                            <option value="decaf">Decaf</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Machine options -->
                                <div class="col-md-4 machine-options" style="display:none;">
                                    <div class="form-group mb-6">
                                        <input type="checkbox" name="machine_is_auto" id="machine_is_auto"
                                               class="form-check-input"
                                               style="width: 24px; height: 24px; margin-right: 14px;">
                                        <label class="form-check-label" for="machine_is_auto">Automatic</label>
                                    </div>
                                </div>
                                <div class="col-md-4 machine-options" style="display:none;">
                                    <div class="form-group mb-6">
                                        <label class="form-check-label" for="machine_capacity">Capacity (ml)</label>
                                        <input type="number" min="0" max="9999" name="machine_capacity"
                                               id="machine_capacity" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4 machine-options" style="display:none;">
                                    <div class="form-group mb-6">
                                        <p>Available Colors</p>
                                        @foreach($colors as $color)
                                            <div class="d-flex align-items-center">
                                                <input type="checkbox" name="colors[]" value="{{$color->id}}"
                                                       class="form-check-input" style="width: 24px; height: 24px;">
                                                <div class="d-flex flex-column align-items-center mx-2 my-1"
                                                     style="min-width: 50px;">
                                                    <label class="form-check-label"
                                                           for="colors[]">{{$color->name}}</label>
                                                    <span class="mx-2"
                                                          style="display: block; background-color: {{$color->code}}; width: 13px; height: 13px;">&nbsp;</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div> <!-- row -->

                            <div class="row">
                                <div class="col-md-12 machine-options" style="display:none;">
                                    <div class="form-group mb-6">
                                        <label class="form-check-label" for="machine_specs">Specifications</label>
                                        <table class="table table-bordered" id="specsTable">
                                            <thead>
                                            <tr>
                                                <th>Specification Name</th>
                                                <th>Value</th>
                                                <th class="text-center">
                                                    <button type="button" class="btn btn-primary" id="btnAddSpec">Add
                                                        Spec
                                                    </button>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="text" name="specifications[0][name]"
                                                           class="form-control"></td>
                                                <td><input type="text" name="specifications[0][value]"
                                                           class="form-control"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- row -->

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div id="images-group" class="form-group mb-3">
                                        <div class="image-upload-group">
                                            <label for="images[]">Image 1:</label>
                                            <input type="file" name="images[]" accept="image/*"
                                                   value="{{old('image')}}">
                                            @error('images[]')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="button" id="add-image-button" class="btn btn-primary">Add image
                                    </button>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="description">Discount</label>
                                        <input type="number" name="discount" id="discount" min="0" max="99" step="1"
                                               value="0"
                                               class="form-control @error('discount') is-invalid @enderror"
                                               value="{{old('discount')}}">
                                        @error('discount')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- row -->

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label> &nbsp; &nbsp;
                                        <textarea name="description" id="description" cols="30" rows="10"
                                                  class="form-control @error('description') is-invalid @enderror"
                                                  placeholder="Describe your product..."></textarea>
                                        @error('description')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- row -->

                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // Script to allow user to insert more than 1 image
            const addImageBtnEl = document.getElementById('add-image-button');
            let imageCount = 1;

            addImageBtnEl.addEventListener('click', function () {
                const container = document.getElementById('images-group');
                imageCount = container.getElementsByClassName('image-upload-group').length;
                const newImageGroup = document.createElement('div');
                newImageGroup.className = 'image-upload-group';
                newImageGroup.innerHTML = `
                                           <label for="images[]">Image ${imageCount + 1}:</label>
                                                <input type="file" name="images[]" accept="image/*">
                                                @error('images[]')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                                                </span>
                                                @enderror
                <button type="button" class="btn btn-danger delete-image-button">Delete</button>`;
                container.appendChild(newImageGroup);

                // Delete btn event when deleting images
                const deleteButtons = document.querySelectorAll('.delete-image-button');
                deleteButtons.forEach(deleteBtnEl => {
                    deleteBtnEl.removeEventListener('click', deleteImageHandler);
                    deleteBtnEl.addEventListener('click', deleteImageHandler);
                });
            });

            // Function to handle image deletion
            function deleteImageHandler() {
                const container = document.getElementById('images-group');
                if (container.getElementsByClassName('image-upload-group').length > 1) {
                    this.parentNode.remove();
                } else {
                    alert("You need to upload at least 1 product image!");
                }
            }

            // Assign events to the btns delete images
            const deleteButtons = document.querySelectorAll('.delete-image-button');
            deleteButtons.forEach(deleteBtnEl => {
                deleteBtnEl.addEventListener('click', deleteImageHandler);
            });
        </script>
        <script>
            // script to handle dynamically the subproducts options
            document.addEventListener('DOMContentLoaded', function () {
                const categorySelect = document.getElementById('category');
                const beanOptionsDiv = document.querySelectorAll('.bean-options');
                const podOptionsDiv = document.querySelectorAll('.pod-options');
                const machineOptionsDiv = document.querySelectorAll('.machine-options');

                // Function to hide all unselected elements
                const hideAllOptions = function (beanOptionsDiv, podOptionsDiv) {
                    beanOptionsDiv.forEach(beanOption => {
                        beanOption.style.display = 'none';
                    });
                    podOptionsDiv.forEach(podOption => {
                        podOption.style.display = 'none';
                    });
                    machineOptionsDiv.forEach(machineOption => {
                        machineOption.style.display = 'none';
                    });
                }

                categorySelect.addEventListener('change', function () {
                    hideAllOptions(beanOptionsDiv, podOptionsDiv);

                    if (categorySelect.value === 'beans') {
                        beanOptionsDiv.forEach(beanOption => {
                            beanOption.style.display = 'block';
                        });
                    } else if (categorySelect.value === 'pods') {
                        podOptionsDiv.forEach(podOption => {
                            podOption.style.display = 'block';
                        });
                    } else if (categorySelect.value === 'machines') {
                        machineOptionsDiv.forEach(machineOption => {
                            machineOption.style.display = 'block';
                        });
                    }
                });
            });
        </script>

        <!-- add and delete specs -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const btnAddSpecEl = document.querySelector('#btnAddSpec');

                // Add specification functionality
                let specsCount = 0;
                btnAddSpecEl.addEventListener('click', function () {
                    //Selecting table
                    const tbodyEl = document.querySelector('#specsTable tbody');
                    specsCount++;
                    newSpecHtml = `
                    <tr>
                        <td>
                            <input type="text" name="specifications[${specsCount}][name]"
                                   class="form-control">
                        </td>
                        <td>
                            <input type="text" name="specifications[${specsCount}][value]"
                                   class="form-control">
                        </td>
                        <td>
                            <button type="button" class="btnDeleteSpec btn btn-danger">Remove</button>
                        </td>
                    </tr>
                    `

                    tbodyEl.insertAdjacentHTML('beforeend', newSpecHtml);

                    // delete spec functionality
                    const btnsDeleteEl = document.querySelectorAll('.btnDeleteSpec');

                    btnsDeleteEl.forEach(btnDelete => {
                        btnDelete.addEventListener('click', function () {
                            const closestTrEl = btnDelete.closest('tr');
                            closestTrEl.remove();
                        });
                    });
                });

            });
        </script>
@endsection
