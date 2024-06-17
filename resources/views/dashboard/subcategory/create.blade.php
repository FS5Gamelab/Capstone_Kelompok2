@extends('layouts.dashboard')

@section('contents')
<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <form class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-7 col-xxl-6 form-light p-3 border rounded shadow" method="post" action="{{ route('sub-categories.store') }}">
            @csrf
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="name" id="categoryName" placeholder="Enter category name..." required>
                @error('name')
                <div class="text-danger text-truncate">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="selectContainer col-sm container-fluid">
                        <label for="brandName" class="form-label">Category</label>
                        <input type="hidden" class="selectedValue" name="category_id" value="{{ old('brand_id', $categories[0]->code) }}">
                        <input type="text" class="selectedName form-control" name="category" id="categoryName" value="{{ old('subCategory', $categories[0]->name) }}">
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
            <div class="mb-3">
                <label for="categoryDescription" class="form-label">Category Name</label>
                <textarea class="form-control" name="description" id="categoryDescription" rows="4" placeholder="Enter category description (Optional)"></textarea>
                @error('description')
                <div class="text-danger text-truncate">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex">
                <button class="btn btn-success mx-auto" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script>
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