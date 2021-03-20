<!-- <script src="js/jquery-3.2.1.slim.min.js"></script> -->
<script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.gotoup').fadeIn();
        } else {
            $('.gotoup').fadeOut();
        }
    });
    $('.gotoup').click(function () {
        $('html,body').animate({scrollTop: 0}, 1000);
    });
});
</script>
<script src="{{ asset('public/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ asset('public/backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/jquery-validation/additional-methods.min.js') }}"></script>