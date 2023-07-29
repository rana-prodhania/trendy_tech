<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">

      <span class="app-brand-text demo menu-text fw-bolder ms-2">Trendy Tech</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large d-block d-xl-none ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item active">
      <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>


    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Category Section</span>
    </li>

    <li class="menu-item">
      <a href="{{ route('admin.category.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Category">Category</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('admin.subcategory.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Sub Category">Sub Category</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('admin.childCategory.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Child Category">Child Category</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('admin.brand.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Brand">Brand</div>
      </a>
    </li>
  </ul>
</aside>
