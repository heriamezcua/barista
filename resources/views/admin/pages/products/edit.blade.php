@extends('layouts.admin')
@section('title', 'Edit Product')

@section('content')
    <h1 class="page-title">Edit Product</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.products.edit', $product->id)}}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{$product->title}}">
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
                                            <option value="beans" {{$product->category === 'beans' ? 'selected' : ''}}>
                                                Beans
                                            </option>
                                            <option value="pods" {{$product->category === 'pods' ? 'selected' : ''}}>
                                                Pods
                                            </option>
                                            <option
                                                value="machines" {{$product->category === 'machines' ? 'selected' : ''}}>
                                                Machines
                                            </option>
                                            <option
                                                value="accessories" {{$product->category === 'accessories' ? 'selected' : ''}}>
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
                                               value="{{$product->price / 100}}">
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
                                <div class="col-md-4 bean-options"
                                     style="{{($product->bean) ? 'display:block' : 'display:none'}};">
                                    <div class="form-group mb-6">
                                        <label for="bean_format">Format Available</label>
                                        <select name="bean_format" id="bean_format" class="form-control">
                                            <option value="">-- Select Format --</option>
                                            <option
                                                value="250" {{($product->bean && $product->bean->format === 250) ? 'selected' : ''}}>
                                                250g
                                            </option>
                                            <option
                                                value="500" {{($product->bean && $product->bean->format === 500) ? 'selected' : ''}}>
                                                500g
                                            </option>
                                            <option
                                                value="1000" {{($product->bean && $product->bean->format === 1000) ? 'selected' : ''}}>
                                                1kg
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 bean-options"
                                     style="{{($product->bean) ? 'display:block' : 'display:none'}};">
                                    <div class="form-group mb-6">
                                        <label for="bean_type">Coffee Type</label>
                                        <select name="bean_type" id="bean_type" class="form-control">
                                            <option value="">-- Select Type --</option>
                                            <option
                                                value="specialty" {{($product->bean && $product->bean->type == 'specialty') ? 'selected' : ''}}>
                                                Specialty Coffee
                                            </option>
                                            <option
                                                value="blend" {{($product->bean && $product->bean->type == 'blend') ? 'selected' : ''}}>
                                                Blend
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 bean-options"
                                     style="{{($product->bean) ? 'display:block' : 'display:none'}};">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" name="isDecaf"
                                               {{($product->bean && $product->bean->is_decaff) ? 'checked' : ''}}
                                               class="form-check-input" style="width: 24px; height: 24px;">
                                        <div class="d-flex flex-column align-items-center mx-2 my-1"
                                             style="min-width: 50px;">
                                            <label class="form-check-label"
                                                   for="isDecaf">Decaffeinated</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pods options -->
                                <div class="col-md-4 pod-options"
                                     style="{{($product->pod) ? 'display:block' : 'display:none'}};">
                                    <div class="form-group mb-6">
                                        <label for="pod_quantity">Pods Quantity</label>
                                        <select name="pod_quantity" id="pod_quantity" class="form-control">
                                            <option value="">-- Select Quantity --</option>
                                            <option
                                                value="8" {{($product->pod && $product->pod->quantity == '8') ? 'selected' : ''}}>
                                                x8
                                            </option>
                                            <option
                                                value="16" {{($product->pod && $product->pod->quantity == '16') ? 'selected' : ''}}>
                                                x16
                                            </option>
                                            <option
                                                value="24" {{($product->pod && $product->pod->quantity == '24') ? 'selected' : ''}}>
                                                x24
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 pod-options"
                                     style="{{($product->pod) ? 'display:block' : 'display:none'}};">
                                    <div class="form-group mb-6">
                                        <label for="pod_size">Cup size</label>
                                        <select name="pod_size" id="pod_size" class="form-control">
                                            <option value="">-- Select Size --</option>
                                            <option
                                                value="small" {{($product->pod && $product->pod->size == 'small') ? 'selected' : ''}}>
                                                Small
                                            </option>
                                            <option
                                                value="medium" {{($product->pod && $product->pod->size == 'medium') ? 'selected' : ''}}>
                                                Medium
                                            </option>
                                            <option
                                                value="large" {{($product->pod && $product->pod->size == 'large') ? 'selected' : ''}}>
                                                Large
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 pod-options" style="{{($product->pod) ? 'display:block' : 'display:none'}};">
                                    <div class="form-group mb-6">
                                        <label for="pod_variety">Variety</label>
                                        <select name="pod_variety" id="pod_variety" class="form-control">
                                            <option value="">-- Select Variety --</option>
                                            <option value="espresso" {{($product->pod && $product->pod->variety == 'espresso') ? 'selected' : ''}}>Espresso</option>
                                            <option value="long_black" {{($product->pod && $product->pod->variety == 'long_black') ? 'selected' : ''}}>Long Black</option>
                                            <option value="white" {{($product->pod && $product->pod->variety == 'white') ? 'selected' : ''}}>White</option>
                                            <option value="decaf" {{($product->pod && $product->pod->variety == 'decaf') ? 'selected' : ''}}>Decaf</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Machine options -->
                                <div class="col-md-4 machine-options"
                                     style="{{($product->machine) ? 'display:block' : 'display:none'}};">
                                    <div class="form-group mb-6">
                                        <input type="checkbox" name="machine_is_auto" id="machine_is_auto"
                                               class="form-check-input"
                                               {{($product->machine && $product->machine->isAuto) ? 'checked' : ''}}
                                               style="width: 24px; height: 24px; margin-right: 14px;">
                                        <label class="form-check-label" for="machine_is_auto">Automatic</label>
                                    </div>
                                </div>
                                <div class="col-md-4 machine-options"
                                     style="{{($product->machine) ? 'display:block' : 'display:none'}};">
                                    <div class="form-group mb-6">
                                        <label class="form-check-label" for="machine_capacity">Capacity (ml)</label>
                                        <input type="number" min="0" max="9999"
                                               value="{{($product->machine) ? $product->machine->capacity : ''}}"
                                               name="machine_capacity"
                                               id="machine_capacity" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4 machine-options"
                                     style="{{($product->machine) ? 'display:block' : 'display:none'}};">
                                    <div class="form-group mb-6">
                                        <p>Available Colors</p>
                                        @php
                                            $machineColorsArr = ($product->machine) ? $product->machine->colors->pluck('id')->toArray() : '';
                                        @endphp
                                        @foreach($colors as $color)
                                            <div class="d-flex align-items-center">
                                                <input type="checkbox" name="colors[]" value="{{$color->id}}"
                                                       @if($product->machine && in_array($color->id, $machineColorsArr)) checked
                                                       @endif
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
                                <div class="col-md-12 machine-options"
                                     style="{{($product->machine) ? 'display:block' : 'display:none'}};">
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

                                            @if($product->machine)
                                                @foreach(json_decode($product->machine->specs) as $index => $spec)
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="specifications[{{$index}}][name]"
                                                                   class="form-control" value="{{$spec->name}}">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="specifications[{{$index}}][value]"
                                                                   class="form-control" value="{{$spec->value}}">
                                                        </td>
                                                        @if($index!==0)
                                                            <td>
                                                                <button type="button"
                                                                        class="btnDeleteSpec btn btn-danger">Remove
                                                                </button>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- row -->

                            <div class="row mb-3 d-flex align-items-end">

                                <div class="col-md-6">
                                    <div id="images-group" class="form-group mb-3">
                                        <label for="images[]">Images:</label>
                                        {{--                                        <div class="image-upload-group">--}}
                                        @foreach(json_decode($product->images) as $index => $image)
                                            @php
                                                $folderName = !empty($image) ? explode('_', $image)[0] : 'no-image.png';
                                            @endphp
                                            <div class="image-upload-group">
                                                <label for="images[]">Image {{$index + 1}}:</label>
                                                <input type="file" name="images[]" accept="image/*"
                                                       class="edit-image-input"
                                                       value="{{ !($folderName === 'no-image.png') ? asset('storage/products/' . $folderName . '/' . $image) :  asset('storage/products/' . 'no-image.png') }}">
                                                <img
                                                    src="{{ !($folderName === 'no-image.png') ? asset('storage/products/' . $folderName . '/' . $image) :  asset('storage/products/' . 'no-image.png') }}"
                                                    alt="Image {{$index + 1}}" style="height: 100px;">
                                                @if($index!== 0)
                                                    <button type="button"
                                                            class="btn btn-danger delete-image-button">Delete
                                                    </button>
                                                @endif
                                            </div>
                                        @endforeach
                                        {{--                                        </div>--}}
                                    </div>
                                    <button type="button" id="add-image-button" class="btn btn-primary">Add
                                        image
                                    </button>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="description">Discount</label>
                                        <input type="number" name="discount" id="discount" min="0" max="99" step="1"
                                               value="{{$product->discount}}"
                                               class="form-control @error('discount') is-invalid @enderror"
                                               value="{{old('discount')}}">
                                        @error('discount')
                                        <span class="invalid-feedback">
                                            <strong>{{$product->discount}}</strong>
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
                                        >{{$product->description}}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- row -->


                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Edit</button>
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
                let btnsDeleteEl = document.querySelectorAll('.btnDeleteSpec');


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
                    btnsDeleteEl = document.querySelectorAll('.btnDeleteSpec');
                });

                // delete spec functionality
                btnsDeleteEl.forEach(btnDelete => {
                    btnDelete.addEventListener('click', function () {
                        const closestTrEl = btnDelete.closest('tr');
                        closestTrEl.remove();
                    });
                });

            });
        </script>
@endsection
