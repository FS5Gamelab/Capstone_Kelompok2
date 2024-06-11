<aside class="d-flex col-md-3 col-lg-2 col-xl-2 col-xxl-2 border flex-column" data-z-collapse="true" id="sidebar">
    <div class="aside container-fluid p-0 d-flex flex-column flex-fill">
        <div class="aside-head d-flex">
            <a class="nav-link p-2 d-flex flex-fill" href="#">
                <img class="img-fluid" src="/assets/img/app.png" alt="" srcset="">
                <div class="brand-text d-flex align-items-center p-2 flex-fill text-nowrap">App Name</div>
            </a>
            <button type="button" class="btn p-0 my-auto d-flex align-items-center mx-2 d-md-none" data-z-target="#sidebar">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="aside-body d-flex flex-column">
            <hr>
            <nav class="sidebar flex-fill">
                <div class="nav-divider start mb-2"></div>
                <x-snav active="{{ Request::is('dashboard') }}" href="/dashboard" icon="dashboard">Dashboard</x-snav>
                <x-snav active="{{ Request::is('dashboard/orders') }}" href="/dashboard/orders" icon="order_play">Orders</x-snav>
                <x-snav active="{{ Request::is('dashboard/transactions') }}" href="/dashboard/transactions" icon="receipt_long">Transactions</x-snav>

                <div class="nav-item pt-3 pb-1 text-secondary">Products</div>
                <x-snav active="{{ Request::is('dashboard/products') }}" href="/dashboard/products" icon="deployed_code">Products</x-snav>
                <x-snav active="{{ Request::is('dashboard/brands') }}" href="/dashboard/brands" icon="apartment">Brands</x-snav>
                <x-snav active="{{ Request::is('dashboard/categories') }}" href="/dashboard/categories" icon="category">Category</x-snav>
                <x-snav active="{{ Request::is('dashboard/discounts') }}" href="/dashboard/discounts" icon="sell">Discounts</x-snav>
                
                <div class="nav-item pt-3 pb-1 text-secondary">Management</div>
                <x-snav active="{{ Request::is('dashboard/users') }}" href="/dashboard/users" icon="person">User</x-snav>
                <x-snav active="{{ Request::is('dashboard/shipments') }}" href="/dashboard/shipments" icon="local_shipping">Shipment Provider</x-snav>
                <x-snav active="{{ Request::is('dashboard/payments') }}" href="/dashboard/payments" icon="payments">Payment Gate</x-snav>
                <div class="nav-divider end mt-1"></div>
            </nav>
            <hr>
            <nav class="aside-footer">
                <x-snav active="{{ Request::is('dashboard/settings') }}" href="/dashboard/settings" icon="settings">Settings</x-snav>
                <div class="nav-item mb-2">
                    <a class="nav-link link-danger p-1 d-flex align-items-center border rounded" href="/signout">
                        <span class="material-symbols-outlined">logout</span>
                        <span class="flex-fill ps-2 text-nowrap text-truncate">Sign Out</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</aside>