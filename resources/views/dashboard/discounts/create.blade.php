@extends('layouts.dashboard')

@section('contents')
<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <form class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-7 col-xxl-6 form-light p-3 border rounded shadow" method="post" action="{{ route('discounts.store') }}">
            @csrf
            <div class="mb-3 container-fluid">
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
                            <span class="vFixed d-flex {{ old('type', 'percentage') == 'percentage' ? 'd-none' : '' }} text-bg-dark rounded-start align-items-center px-1">Rp</span>
                            <input class="form-control text-end" name="value" min="1" {{ old('type', 'percentage') == 'percentage' ? 'max=99' : '' }} value="{{ old('value', 50) }}" id="discountValue" type="number" step="1">
                            <span class="vPercent d-flex {{ old('type', 'percentage') == 'fixed' ? 'd-none' : '' }} text-bg-dark rounded-end align-items-center px-1">%</span>
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
                            <option value="sub_category" {{ old('applied_to') == 'sub_category' ? 'selected' : '' }}>Sub-Category</option>
                            <option value="category" {{ old('applied_to') == 'category' ? 'selected' : '' }}>Category</option>
                            <option value="brand" {{ old('applied_to') == 'brand' ? 'selected' : '' }}>Brand</option>
                            <option value="global" {{ old('applied_to') == 'global' ? 'selected' : '' }}>All Product</option>
                        </select>
                    </div>
                    <x-search-selection 
                    :referenceData="$data" 
                    referenceLabel="Reference To" 
                    referenceRequest="product" 
                    referenceValue="{{ $data[0]->code }}" 
                    referenceName="{{ $data[0]->name }}"></x-search-selection>
                </div>
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <label class="form-label">Periode</label>
                    <div class="col-sm">
                        <div class="col input-group">
                            <span class="text-bg-dark rounded-start d-flex align-items-center px-1">Start</span>
                            <input type="date" class="form-control" value="{{ old('started_at', date('Y-m-d')) }}" name="started_at">
                        </div>
                        @error('started_at')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm">
                        <div class="col input-group">
                            <span class="text-bg-dark rounded-start d-flex align-items-center px-1">End</span>
                            <input type="date" class="form-control" value="{{ old('expired_at', date('Y-m-d')) }}" name="expired_at">
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
    <x-search-selectionjs></x-search-selectionjs>
    <script>
        $(document).ready(function(){
            $('#discountType').change(function(){
                if($('#discountType').val() === "fixed"){
                    $('#discountValue').val(1000);
                    $('#discountValue').attr({
                        'min': 1000,
                        'max': '',
                        'step': 100
                    });
                    $('#discountValue').siblings('.vPercent').addClass('d-none');
                    $('#discountValue').siblings('.vFixed').removeClass('d-none');
                } else if($('#discountType').val() === "percentage"){
                    $('#discountValue').val(1);
                    $('#discountValue').attr({
                        'min': 1,
                        'max': 100,
                        'step': 1
                    });
                    $('#discountValue').siblings('.vFixed').addClass('d-none');
                    $('#discountValue').siblings('.vPercent').removeClass('d-none');
                }
            });

            $("#appliedTo").change(function(){
                $('.selectedValue').val('');
                $('.selectedName').val('');
                $('.selectedName').attr('data-request', $(this).val());
                if($(this).val() === "global"){
                    $('.selectContainer').addClass('d-none');
                } else {
                    $('.selectContainer').removeClass('d-none');
                    $('.selectedValue').attr('name', $(this).val() + "_id");
                    fetchData($('.selectedName'), $('.selectedName').attr('data-request'), '');
                }
            });
        });
    </script>
@endsection