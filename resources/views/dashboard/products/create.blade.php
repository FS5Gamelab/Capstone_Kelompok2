@extends('layouts.dashboard')

@section('contents')
<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <form class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-7 col-xxl-6 form-light p-3 border rounded shadow" method="post" action="{{ route('items.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 container-fluid">
                <label for="productName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="productName" placeholder="Enter product name...">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        <label for="productLength" class="form-label">Length</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="length" min="1" value="1" id="productLength" type="number" step="0.01">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                        @error('length')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        <label for="productWidth" class="form-label">Width</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="width" min="1" value="1" id="productWidth" type="number" step="0.01">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                        @error('width')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        <label for="productHeight" class="form-label">Height</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="height" min="1" value="1" id="productHeight" type="number" step="0.01">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                        @error('height')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        <label for="productWeight" class="form-label">Weight</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="weight" min="1" value="1" id="productWeight" type="number" step="0.01">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">kg</div>
                        </div>
                        @error('weight')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>            
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        Stock
                        <div class="input-group">
                            <input class="form-control text-end" name="stock" min="1" value="1" id="productStock" type="number">
                        </div>
                        @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        Prices
                        <div class="input-group">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-start">Rp</div>
                            <input class="form-control text-end" name="price" min="1" value="1" id="productPrice" type="number">
                        </div>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3 container-fluid">
                <label for="productExpired" class="form-label">Expired</label>
                <input type="date" class="form-control" name="expired_at" id="productExpired">
                @error('expired_at')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="selectContainer col-sm container-fluid">
                        <label for="brandName" class="form-label">Brand</label>
                        <input type="hidden" class="selectedValue" name="brand_id" value="{{ old('brand_id', $brands[0]->code) }}">
                        <input type="text" class="selectedName form-control" name="brand" id="brandName" value="{{ old('brand_name', $brands[0]->name) }}">
                        <div class="selectOptions row position-relative d-none">
                            <div class="col position-absolute z-1">
                                <div class="selectGroups bg-light border d-flex flex-column px-2 py-1">
                                    @foreach ($brands as $item)
                                        <div class="btn btn-light py-0 mb-1 text-start text-truncate" data-code="{{ $item->code }}">{{ $item->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @error('brand_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="selectContainer col-sm container-fluid">
                        <label for="brandName" class="form-label">Category</label>
                        <input type="hidden" class="selectedValue" name="category_id" value="{{ old('brand_id', $categories[0]->code) }}">
                        <input type="text" class="selectedName form-control" name="subCategory" id="categoryName" value="{{ old('subCategory', $categories[0]->name) }}">
                        <div class="selectOptions row position-relative d-none">
                            <div class="col position-absolute z-1">
                                <div class="selectGroups bg-light border d-flex flex-column px-2 py-1">
                                    @foreach ($categories as $item)
                                        <div class="btn btn-light py-0 mb-1 text-start text-truncate" data-code="{{ $item->code }}">{{ $item->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="productDescription" rows="4" placeholder="Enter category description (Optional)"></textarea>
                @error('description')
                    <div class="text-danger text-truncate">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="form-label">Tetapkan Produk sebagai Pre-Order?</div>
                <div class="col form-check">
                    <input type="radio" class="form-check-input" name="pre_order" value="1" id="statusTrue">
                    <label for="statusTrue" class="form-label">Ya</label>
                </div>
                <div class="col form-check">
                    <input type="radio" class="form-check-input" name="pre_order" value="0" id="statusFalse" checked>
                    <label for="statusFalse" class="form-label">Tidak</label>
                </div>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div id="imagePreview" class="mb-3 text-center"></div>
                <label for="productImage" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="productImage" onchange="previewImage(event)">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid d-flex">
                <button class="btn btn-success mx-auto" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + reader.result + '" class="border" height="160px" alt="Product Image">';
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function fetchData(object, dataRequest, target){
        $.ajax({
            url: "{{ route('data.index') }}",
            type: "POST",
            data: {
                '_token' : "{{ csrf_token() }}",
                'dataRequest' : dataRequest,
                'target' : target
            },
            success: function (response) {
                $(object).siblings('.selectOptions').find('.selectGroups').html('');
                response.forEach(item => {
                    $(object).siblings('.selectOptions').find('.selectGroups').append(`<div class="btn btn-light py-0 mb-1 text-start text-truncate" data-code="${item.code}">${item.name}</div>`);
                });
                $(".selectOptions .btn").each(function () {
                    $(this).click(function(){
                        $(this).closest('.selectContainer').find('.selectedValue').val($(this).data('code'));
                        $(this).closest('.selectContainer').find('.selectedName').val($(this).text());
                        $(this).closest('.selectOptions').addClass('d-none');
                    });
                });
            }
        });
    }
    $(document).ready(function () {
        $(".selectOptions .btn").each(function () {
            $(this).click(function(){
                $(this).closest('.selectContainer').find('.selectedValue').val($(this).data('code'));
                $(this).closest('.selectContainer').find('.selectedName').val($(this).text());
                $(this).closest('.selectOptions').addClass('d-none');
            });
        });

        var doRequest;
        $(".selectedName").focus(function(){
            $(this).siblings('.selectedValue').val('');
            $(this).val('');
            $(this).siblings('.selectOptions').removeClass('d-none');
        }).blur(function(){
            setTimeout(() => {
                $(this).siblings('.selectOptions').addClass('d-none');
                if($(this).siblings('.selectedValue').val() == ''){
                    $(this).siblings('.selectedValue').val($(this).siblings('.selectOptions').find('.selectGroups > :first-child').data('code'));
                    $(this).val($(this).siblings('.selectOptions').find('.selectGroups > :first-child').text());
                }
            }, 100);
        }).on('input', function(){
            $(this).siblings('.selectedValue').val('');
            clearTimeout(doRequest);
            
            doRequest = setTimeout(() => {
                fetchData(this, $(this).attr('name'), $(this).val());
            }, 500);
        })
    });
</script>
@endsection