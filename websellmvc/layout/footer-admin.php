

    </main>

    <script src="./public/admin/js/core/popper.min.js"></script>
    <script src="./public/admin/js/core/bootstrap.min.js"></script>
    <script src="./public/admin/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./public/admin/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./public/admin/ajax/category.js"></script>
    <script src="./public/admin/ajax/product.js"></script>
    <script src="./public/admin/js/alert.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./public/admin/js/material-dashboard.min.js?v=3.0.0"></script>
    </body>
</html>