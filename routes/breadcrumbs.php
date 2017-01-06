<?php

// All products
Breadcrumbs::register('Products', function($breadcrumbs)
{
    $breadcrumbs->push('Products', route('all-products'));
});

// Showing a product
Breadcrumbs::register('Show-Product', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('Products');
    $breadcrumbs->push(str_limit($product->product_title, 30), route('show-product', $product));
});

// Add product
Breadcrumbs::register('Add-Product', function($breadcrumbs)
{
    $breadcrumbs->parent('Products');
    $breadcrumbs->push('Add Product', route('store-product'));
});

//Edit product
Breadcrumbs::register('Edit-Product', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('Show-Product', $product);
    $breadcrumbs->push('Edit', route('edit-product-form', $product));
});
