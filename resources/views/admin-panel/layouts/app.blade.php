<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>

    <meta charset="utf-8">
    <title>ShopTiCart Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="StarCode Kh" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/shopticart-fav.png">
    <!-- Layout config Js -->
    <script src="admin-panel/assets/js/layout.js"></script>
    <!-- Icons CSS -->
    
    <!-- StarCode CSS -->
    

  <link rel="stylesheet" href="admin-panel/assets/css/starcode2.css">
</head>

<body class="text-base bg-body-bg text-body font-public dark:text-zink-100 dark:bg-zink-800 group-data-[skin=bordered]:bg-body-bordered group-data-[skin=bordered]:dark:bg-zink-700">
 
 



<div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">

    
    <!-- Left Sidebar Start -->
        @include('admin-panel.components.sidebar')
    <!-- Left Sidebar End -->

    <!-- Top Header Start -->
        @include('admin-panel.components.header')
    <!-- Top Header End -->
        
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <!-- start main content -->
            @yield('content')
        <!-- end main content -->


        <!-- START FOOTER -->
            @include('admin-panel.components.footer')
        <!-- END FOOTER -->


    </div>



</div>
<!-- end main content -->



    
    @include('admin-panel.components.setting')








<script src='admin-panel/assets/libs/choices.js/public/assets/scripts/choices.min.js'></script>
<script src="admin-panel/assets/libs/%40popperjs/core/umd/popper.min.js"></script>
<script src="admin-panel/assets/libs/tippy.js/tippy-bundle.umd.min.js"></script>
<script src="admin-panel/assets/libs/simplebar/simplebar.min.js"></script>
<script src="admin-panel/assets/libs/prismjs/prism.js"></script>
<script src="admin-panel/assets/libs/lucide/umd/lucide.js"></script>
<script src="admin-panel/assets/js/starcode.bundle.js"></script>
<!--apexchart js-->
<script src="admin-panel/assets/libs/apexcharts/apexcharts.min.js"></script>

<!--dashboard ecommerce init js-->
<script src="admin-panel/assets/js/pages/dashboards-ecommerce.init.js"></script>

<!-- App js -->
<script src="admin-panel/assets/js/app.js"></script>

</body>

</html>