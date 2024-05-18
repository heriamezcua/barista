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
                                            <option value="beans" {{$product->category_id === 1 ? 'selected' : ''}}>
                                                Beans
                                            </option>
                                            <option value="capsules" {{$product->category_id === 2 ? 'selected' : ''}}>
                                                Capsules
                                            </option>
                                            <option value="machines" {{$product->category_id === 3 ? 'selected' : ''}}>
                                                Machines
                                            </option>
                                            <option
                                                value="accessories" {{$product->category_id === 4 ? 'selected' : ''}}>
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

                            <div class="row mb-3 d-flex align-items-end">
{{--                                                                <div class="col-md-6">--}}
{{--                                                                    <div class="form-group mb-3">--}}
{{--                                                                        <div class="d-flex align-items-end justify-content-between">--}}
{{--                                                                            <label for="image">Image</label>--}}
{{--                                                                            <img class="align-self-end"--}}
{{--                                                                                 src="{{asset('storage/products/'. $product->image)}}" alt=""--}}
{{--                                                                                 style="height: 150px; margin: 10px 0">--}}

{{--                                                                        </div>--}}
{{--                                                                        <input type="file" name="image" id="image"--}}
{{--                                                                               class="form-control @error('image') is-invalid @enderror"--}}
{{--                                                                               value="{{old('image')}}">--}}
{{--                                                                        @error('image')--}}
{{--                                                                        <span class="invalid-feedback">--}}
{{--                                                                            <strong>{{$message}}</strong>--}}
{{--                                                                        </span>--}}
{{--                                                                        @enderror--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

                                <div class="col-md-6">
                                    <div id="images-group" class="form-group mb-3">
                                        <label for="images[]">Images:</label>
                                        <div class="image-upload-group">
                                            @foreach(json_decode($product->images) as $index => $image)
                                                <div class="image-upload-group">
                                                    <label for="images[]">Image {{$index + 1}}:</label>
                                                    <input type="file" name="images[]" accept="image/*"
                                                           class="edit-image-input">
                                                    <img src="{{ asset('storage/products/' . $image) }}"
                                                         alt="Image {{$index + 1}}" style="height: 100px;">
                                                    <button type="button"
                                                            class="btn btn-danger delete-edit-image-button">Delete
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" id="add-edit-image-button" class="btn btn-primary">Add
                                            image
                                        </button>
                                    </div>
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
@endsection
