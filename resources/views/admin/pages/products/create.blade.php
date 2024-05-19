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

                            <div class="row">
                                <!-- Bean options -->
                                <div class="col-md-6 bean-options" style="display:none;">
                                    <div class="form-group mb-6">
                                        <label for="bean_format">Format</label>
                                        <select name="bean_format" id="bean_format" class="form-control">
                                            <option value="">-- Select Format --</option>
                                            <option value="250">250g</option>
                                            <option value="1000">1kg</option>
                                            <option value="3000">3kg</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 bean-options" style="display:none;">
                                    <div class="form-group mb-6">
                                        <label for="bean_type">Type</label>
                                        <select name="bean_type" id="bean_type" class="form-control">
                                            <option value="">-- Select Type --</option>
                                            <option value="whole_bean">Whole Bean Coffee</option>
                                            <option value="french_press">French Press Ground</option>
                                            <option value="aeropress">AeroPress Ground</option>
                                            <option value="v60">V60 Ground</option>
                                            <option value="chemex">Chemex Ground</option>
                                            <option value="italian_moka">Italian Moka Ground</option>
                                            <option value="espresso">Espresso Ground</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Pods options -->
                                <div class="col-md-6 pod-options" style="display:none;">
                                    <div class="form-group mb-6">
                                        <label for="pod_quantity">Pods Quantity</label>
                                        <select name="pod_quantity" id="pod_quantity" class="form-control">
                                            <option value="">-- Select Quantity --</option>
                                            <option value="12">x12</option>
                                            <option value="24">x24</option>
                                            <option value="36">x36</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pod-options" style="display:none;">
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

                            </div> <!-- row -->

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

                // Function to hide all unselected elements
                const hideAllOptions = function (beanOptionsDiv, podOptionsDiv) {
                    beanOptionsDiv.forEach(beanOption => {
                        beanOption.style.display = 'none';
                    });
                    podOptionsDiv.forEach(podOption => {
                        podOption.style.display = 'none';
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
                    }
                });
            });
        </script>
@endsection
