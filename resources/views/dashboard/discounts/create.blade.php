@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="content container-fluid h-100 d-flex flex-column overflow-auto">
        <div class="row justify-content-center py-3">
            <form class="col-6 py-2 rounded bg-light" method="POST" action="{{ route('categories.store') }}">
                @csrf
                <fieldset>
    
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="categoryName">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Discount Type</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="percentageDiscount" value="percentage">
                            <label class="form-check-label" for="percentageDiscount">Percentage</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="fixedDiscount" value="fixed">
                            <label class="form-check-label" for="fixedDiscount">Fixed Amount</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="discountAmount" class="form-label">Discount Amount</label>
                        <input type="number" class="form-control" name="discount_amount" id="discountAmount">
                    </div>
                    
                    <div class="mb-3">
                        <label for="maxDiscount" class="form-label">Maximum Discount Value</label>
                        <input type="number" class="form-control" name="max_discount" id="maxDiscount">
                    </div>
                    
                    <div class="mb-3">
                        <label for="minPurchase" class="form-label">Minimum Purchase Amount</label>
                        <input type="number" class="form-control" name="min_purchase" id="minPurchase">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Usage Per User</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="single_use" id="singleUse">
                            <label class="form-check-label" for="singleUse">Single Use</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="multiple_use" id="multipleUse">
                            <label class="form-check-label" for="multipleUse">Multiple Use</label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="userType" class="form-label">User Type</label>
                        <select class="form-select" name="user_type" id="userType">
                            <option value="new_user">New User</option>
                            <option value="membership_user">Membership User</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="discountLimit" class="form-label">Discount Limit</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="discount_limit" id="discountLimit">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" id="unlimitedDiscount">
                                <label class="form-check-label" for="unlimitedDiscount">Unlimited</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="start_date" id="startDate">
                    </div>
                    
                    <div class="mb-3">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" name="end_date" id="endDate">
                    </div>
    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="apply_all_products" id="applyAllProducts" checked>
                            <label class="form-check-label" for="applyAllProducts">
                                Apply Discount to All Products
                            </label>
                        </div>
                    </div>
    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection