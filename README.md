
# 🚫 WooCommerce - Disable Add to Cart Temporarily

## 🇬🇧 English

This simple snippet disables the "Add to Cart" buttons on a WooCommerce store and displays a notice to users that ordering is not available for the next 15 days.

### ✨ Features

- Disables all "Add to Cart" buttons (shop page and single product page)
- Shows a popup alert on button click
- Prevents items from being added to the cart
- Displays an error message if users try to add a product anyway

### 📦 Installation

1. Go to your WordPress theme folder.
2. Open the `functions.php` file of your active theme (preferably a child theme).
3. Copy and paste the following code at the end of the file:

```php
function disable_add_to_cart_button() {
    if (is_admin()) return;

    wc_enqueue_js("
        jQuery(document).ready(function($) {
            $('.add_to_cart_button, .single_add_to_cart_button').on('click', function(e) {
                e.preventDefault();
                alert('It is not possible to place an order for the next 15 days.');
            });

            $('.add_to_cart_button').removeClass('ajax_add_to_cart').addClass('disabled');
            $('.single_add_to_cart_button').prop('disabled', true);
        });
    ");
}
add_action('wp_enqueue_scripts', 'disable_add_to_cart_button');

function disable_cart_checkout() {
    wc_add_notice('It is not possible to place an order for the next 15 days.', 'error');
    return false;
}
add_filter('woocommerce_add_to_cart_validation', 'disable_cart_checkout', 10, 2);
```

4. Save the file and refresh your site.

### ❗ Note

To restore normal functionality, simply remove or comment out this code.

---

## 🇮🇷 فارسی

این کد ساده باعث می‌شود تا دکمه‌های "افزودن به سبد خرید" در فروشگاه ووکامرس شما غیرفعال شوند و به کاربران پیغام داده شود که امکان ثبت سفارش تا ۱۵ روز آینده وجود ندارد.

### ✨ ویژگی‌ها

- غیرفعال‌سازی دکمه‌های افزودن به سبد خرید در صفحه فروشگاه و محصول
- نمایش پیام هشدار هنگام کلیک روی دکمه‌ها
- جلوگیری از افزودن محصول به سبد خرید
- نمایش پیام خطا در صورت تلاش برای افزودن محصول

### 📦 آموزش نصب

1. به پوشه قالب فعال وردپرس خود بروید.
2. فایل `functions.php` را باز کنید (ترجیحاً در قالب فرزند/Child Theme).
3. کد زیر را به انتهای فایل اضافه کنید:

```php
function disable_add_to_cart_button() {
    if (is_admin()) return;

    wc_enqueue_js("
        jQuery(document).ready(function($) {
            $('.add_to_cart_button, .single_add_to_cart_button').on('click', function(e) {
                e.preventDefault();
                alert('It is not possible to place an order for the next 15 days.');
            });

            $('.add_to_cart_button').removeClass('ajax_add_to_cart').addClass('disabled');
            $('.single_add_to_cart_button').prop('disabled', true);
        });
    ");
}
add_action('wp_enqueue_scripts', 'disable_add_to_cart_button');

function disable_cart_checkout() {
    wc_add_notice('It is not possible to place an order for the next 15 days.', 'error');
    return false;
}
add_filter('woocommerce_add_to_cart_validation', 'disable_cart_checkout', 10, 2);
```

4. فایل را ذخیره کنید و سایت را رفرش کنید.

### ❗ نکته

برای بازگرداندن حالت عادی، کافی است کد را حذف یا کامنت کنید.
