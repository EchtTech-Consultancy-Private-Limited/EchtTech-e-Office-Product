<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="#">
                <img class="img-fluid for-light" style="width:180px;"
                     src="{{ asset('assets/images/echttech-logo.png') }}" alt="">
                <img
                    class="img-fluid for-dark" src="{{ asset('assets/images/echttech-logo.png') }}" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="#"><img class="img-fluid"
                                                        src="{{ asset('assets/assets/images/logo/logo-icon.png') }}"
                                                        alt=""></a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="#"><img class="img-fluid"
                                                          src="{{ asset('assets/assets/images/logo/logo-icon.png') }}"
                                                          alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                              aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>Pinned</h6>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">General</h6>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                       <a class="sidebar-link sidebar-title link-nav" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg>
                            <span>Dashboard</span>
                       </a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                                                                                href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#stroke-widget') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#fill-widget') }}"></use>
                            </svg>
                            <span class="lan-6">Widgets</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="">General</a></li>
                            <li><a href="">Chart</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                                                                                href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#stroke-layout') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="../assets/svg/icon-sprite.svg#fill-layout"></use>
                            </svg>
                            <span class="lan-7">Page layout</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="">Boxed</a></li>
                            <li><a href="">RTL</a></li>
                            <li><a href="">Dark Layout</a></li>
                            <li><a href="">Hide Nav Scroll</a></li>
                            <li><a href="">Footer Light</a></li>
                            <li><a href="">Footer Dark</a></li>
                            <li><a href="">Footer Fixed</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Masters</h6>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg>
                            <span>Modules</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"> </i>
{{--                        <label class="badge badge-light-secondary">New</label>--}}
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                            </svg>
                            <span>Settings           </span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="projects.html">License Pricing</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="file-manager.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#stroke-file') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#fill-file') }}"></use>
                            </svg>
                            <span>File manager</span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                        <label class="badge badge-light-danger">Latest </label><a
                            class="sidebar-link sidebar-title link-nav" href="kanban.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#stroke-board') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#fill-board') }}"></use>
                            </svg>
                            <span>kanban Board</span></a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                                                                                href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#fill-ecommerce') }}"></use>
                            </svg>
                            <span>Ecommerce</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="add-products.html">Add Products</a></li>
                            <li><a href="product.html">Product</a></li>
                            <li><a href="category.html">Category page</a></li>
                            <li><a href="product-page.html">Product page</a></li>
                            <li><a href="list-products.html">Product list</a></li>
                            <li><a href="payment-details.html">Payment Details</a></li>
                            <li><a href="order-history.html">Order History</a></li>
                            <li><a class="submenu-title" href="#">Invoices<span class="sub-arrow"><i
                                            class="fa fa-angle-right"></i></span></a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li><a href="invoice-1.html">Invoice-1</a></li>
                                    <li><a href="invoice-2.html">Invoice-2</a></li>
                                    <li><a href="invoice-3.html">Invoice-3</a></li>
                                    <li><a href="invoice-4.html">Invoice-4</a></li>
                                    <li><a href="invoice-5.html">Invoice-5</a></li>
                                    <li><a href="invoice-template.html">Invoice-6</a></li>
                                </ul>
                            </li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="list-wish.html">Wishlist</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="pricing.html">Pricing </a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="letter-box.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#stroke-email') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="../assets/svg/icon-sprite.svg#fill-email"></use>
                            </svg>
                            <span>Letter Box</span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                                                                                href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#stroke-chat') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#fill-chat') }}"></use>
                            </svg>
                            <span>Chat</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="private-chat.html">Private Chat</a></li>
                            <li><a href="group-chat.html">Group Chat</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                                                                                href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/assets/svg/icon-sprite.svg#fill-user') }}"></use>
                            </svg>
                            <span>Users</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="user-profile.html">Users Profile</a></li>
                            <li><a href="edit-profile.html">Users Edit</a></li>
                            <li><a href="user-cards.html">Users Cards</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
