<nav class="py-2 h-100 d-flex flex-column gap-2 overflow-y-auto overflow-x-hidden">
    <x-snav active="{{ Request::is('dashboard') }}" href="/dashboard" icon="dashboard">Dashboard</x-snav>
    <x-snav active="{{ Request::is('dashboard/transactions') }}" href="#" icon="receipt_long">Transactions</x-snav>
    
    <div class="container-fluid mt-3 mb-1 bg-light">Products</div>
    <x-snav active="{{ Request::is('dashboard/products/items*') }}" href="{{ route('items.index') }}" icon="package_2">Product</x-snav>
    <x-snav active="{{ Request::is('dashboard/products/brands*') }}" href="{{ route('brands.index') }}" icon="apartment">Brand</x-snav>
    <x-snav active="{{ Request::is('dashboard/products/categories*') }}" href="{{ route('categories.index') }}" icon="category">Category</x-snav>
    <x-snav active="{{ Request::is('dashboard/products/sub-categories*') }}" href="{{ route('sub-categories.index') }}" icon="list">Sub-Category</x-snav>
    <x-snav active="{{ Request::is('dashboard/products/discounts*') }}" href="{{ route('discounts.index') }}" icon="sell">Discount</x-snav>
    <x-snav active="{{ Request::is('dashboard/products/coupons') }}" href="#" icon="confirmation_number">Coupon</x-snav>

    <div class="container-fluid mt-3 mb-1 bg-light">Featured</div>
    <x-snav active="{{ Request::is('dashboard/offers') }}" href="#" icon="campaign">Offers</x-snav>
    <x-snav active="{{ Request::is('dashboard/news') }}" href="#" icon="newspaper">News</x-snav>
    <x-snav active="{{ Request::is('dashboard/events') }}" href="#" icon="event">Events</x-snav>

    @if (Auth::user()->role == 'master')
    <div class="container-fluid mt-3 mb-1 bg-light">Manage</div>
    <x-snav active="{{ Request::is('dashboard/users') }}" href="#" icon="person">Users</x-snav>
    <x-snav active="{{ Request::is('dashboard/employees') }}" href="#" icon="badge">Employees</x-snav>
    @endif
</nav>