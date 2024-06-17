@extends('layouts.dashboard')

@section('contents')
<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <form class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-7 col-xxl-6 form-light p-3 border rounded shadow" method="post" action="{{ route('discounts.store') }}">
            @csrf
            <div class="mb-3">
                <label for="categoryName" class="form-label">Name</label>
                <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="categoryName">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <label for="discountType" class="form-label">Type</label>
                        <select class="form-select" id="discountType" name="type" aria-label="Default select example">
                            <option value="percentage" {{ old('type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                            <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="discountValue" class="form-label">Amount</label>
                        <div class="input-group">
                            <span class="vFixed d-flex {{ old('type') == 'percentage' ? 'd-none' : '' }} text-bg-dark rounded-start align-items-center px-1">Rp</span>
                            <input class="form-control text-end" name="value" min="1" max="100" value="{{ old('value', 50) }}" id="discountValue" type="{{ old('type') == 'fixed' ? 'number' : 'text' }}" step="1">
                            <span class="vPercent d-flex {{ old('type') == 'fixed' ? 'd-none' : '' }} text-bg-dark rounded-end align-items-center px-1">%</span>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label for="discountMaxValue" class="form-label">Max. Amount</label>
                        <div class="input-group">
                            <span class="d-flex text-bg-dark rounded-start align-items-center px-1">Rp</span>
                            <input class="form-control text-end" name="max_value" min="1" value="{{ old('max_value', 0) }}" id="discountMaxValue" type="number" step="1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <label for="appliedTo" class="form-label">Apply To</label>
                        <select class="form-select" id="appliedTo" name="applied_to" aria-label="Default select example">
                            <option value="product" {{ old('applied_to') == 'product' ? 'selected' : '' }}>Product</option>
                            <option value="subCategory" {{ old('applied_to') == 'subCategory' ? 'selected' : '' }}>Sub-Category</option>
                            <option value="category" {{ old('applied_to') == 'category' ? 'selected' : '' }}>Category</option>
                            <option value="brand" {{ old('applied_to') == 'brand' ? 'selected' : '' }}>Brand</option>
                            <option value="global" {{ old('applied_to') == 'global' ? 'selected' : '' }}>All Product</option>
                        </select>
                    </div>
                    <div class="referenceField col-sm container-fluid {{ old('applied_to') == 'global' ? 'd-none' : '' }}">
                        <label for="discountName" class="form-label">Reference To</label>
                        <input type="hidden" name="referenceCode" id="discountCode" value="{{ old('referenceCode', $data[0]->code) }}">
                        <input type="text" class="form-control" name="referenceName" id="discountName" value="{{ old('referenceName', $data[0]->name) }}">
                        @error('referenceCode')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="formSelect row position-relative d-none">
                            <div class="col position-absolute z-1">
                                <div class="selectOption bg-light border d-flex flex-column px-2 py-1">
                                    @foreach ($data as $item)
                                        <div class="btn btn-light py-0 mb-1 text-start text-truncate" data-code="{{ $item->code }}">{{ $item->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <label class="form-label">Periode</label>
                    <div class="col-sm">
                        <div class="col input-group">
                            <span class="text-bg-dark rounded-start d-flex align-items-center px-1">Start</span>
                            <input type="date" class="form-control" name="started_at">
                        </div>
                        @error('started_at')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm">
                        <div class="col input-group">
                            <span class="text-bg-dark rounded-start d-flex align-items-center px-1">End</span>
                            <input type="date" class="form-control" name="expired_at">
                        </div>
                        @error('expired_at')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
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
        function fetchData(){
            $.ajax({
                url: "{{ route('data.index') }}",
                type: "POST",
                data: {
                    '_token' : "{{ csrf_token() }}",
                    'dataRequest' : $('#appliedTo').val(),
                    'target' : $('#discountName').val()
                },
                success: function (response) {
                    $('.selectOption').html('');
                    response.forEach(item => {
                        $('.selectOption').append(`<div class="btn btn-light py-0 mb-1 text-start text-truncate" data-code="${item.code}">${item.name}</div>`);
                    });
                    $(".selectOption .btn").each(function (index, element) {
                        $(element).click(function(){

                            $('#discountCode').val($(element).data('code'));
                            $('#discountName').val($(element).text());
                            $('#discountName').siblings('.formSelect').addClass('d-none');
                        });
                    });
                }
            });
        }

        $(document).ready(function(){
            $('#discountType').change(function(){
                if($('#discountType').val() === "fixed"){
                    $('#discountValue').val(1000);
                    $('#discountValue').attr({
                        'min': 1000,
                        'max': 10000000,
                        'step': 100,
                        'type': 'number'
                    });
                    $('#discountValue').siblings('.vPercent').addClass('d-none');
                    $('#discountValue').siblings('.vFixed').removeClass('d-none');
                } else if($('#discountType').val() === "percentage"){
                    $('#discountValue').val(1);
                    $('#discountValue').attr({
                        'min': 1,
                        'max': 100,
                        'step': 1,
                        'type': 'text'
                    });
                    $('#discountValue').siblings('.vFixed').addClass('d-none');
                    $('#discountValue').siblings('.vPercent').removeClass('d-none');
                }
            });

            $("#appliedTo").change(function(){
                $('#discountCode').val('');
                $('#discountName').val('');
                if($(this).val() === "global"){
                    $('.referenceField').addClass('d-none');
                } else {
                    $('.referenceField').removeClass('d-none');
                    fetchData();
                }
            });

            $(".selectOption .btn").each(function (index, element) {
                $(element).click(function(){

                    $('#discountCode').val($(element).data('code'));
                    $('#discountName').val($(element).text());
                    $('#discountName').siblings('.formSelect').addClass('d-none');
                });
            });
            
            var doRequest;
            $("#discountName").focus(function(){
                $('#discountCode').val('');
                $('#discountName').val('');
                $(this).siblings('.formSelect').removeClass('d-none');
            }).blur(function(){
                setTimeout(() => {
                    $(this).siblings('.formSelect').addClass('d-none');
                    if($('#discountCode').val() == ''){
                        $('#discountCode').val($('.selectOption > :first-child').data('code'));
                        $('#discountName').val($('.selectOption > :first-child').text());
                    }
                }, 100);
            }).on('input',function (e) {
                $('#discountCode').val('');
                clearTimeout(doRequest);

                doRequest = setTimeout(() => {
                    fetchData();
                }, 500);
            });
        });
    </script>
@endsection