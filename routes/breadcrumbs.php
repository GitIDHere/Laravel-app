<?php

// All products
Breadcrumbs::register('Products', function($breadcrumbs)
{
    $breadcrumbs->push('Products', route('seller-all-products'));
});

// Showing a product
Breadcrumbs::register('Show-Product', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('Products');
    $breadcrumbs->push(str_limit($product->product_title, 30), route('seller-show-product', $product));
});

// Add product
Breadcrumbs::register('Add-Product', function($breadcrumbs)
{
    $breadcrumbs->parent('Products');
    $breadcrumbs->push('Add Product', route('seller-store-product'));
});

//Edit product
Breadcrumbs::register('Edit-Product', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('Show-Product', $product);
    $breadcrumbs->push('Edit', route('seller-edit-product-form', $product));
});
