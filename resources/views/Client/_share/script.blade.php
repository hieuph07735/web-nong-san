<!-- ALL JS FILES -->
<script src="Client/js/jquery-3.2.1.min.js"></script>
<script src="Client/js/popper.min.js"></script>
<script src="Client/js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="Client/js/jquery.superslides.min.js"></script>
<script src="Client/js/bootstrap-select.js"></script>
<script src="Client/js/inewsticker.js"></script>
<script src="Client/js/images-loded.min.js"></script>
<script src="Client/js/isotope.min.js"></script>
<script src="Client/js/owl.carousel.min.js"></script>
<script src="Client/js/baguetteBox.min.js"></script>
<script src="Client/js/form-validator.min.js"></script>
<script src="Client/js/contact-form-script.js"></script>
<script src="Client/js/custom.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    $(".update-cart").change(function (e) {
        e.preventDefault();

        const ele = $(this);

        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "post",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                amount: ele.parents("tr").find(".amount").val()
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });

    $(".remove-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Bạn chắc chắn muốn xóa sản phẩm này?")) {
            $.ajax({
                url: '{{ route('remove.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

    function test() {
        //     swal("Cảm ơn bạn. Chúng tôi sẽ liên hệ với bạn sau !!!");
        // }
        swal({
                title: "Cảm ơn bạn",
                text: "Chúng tôi sẽ liên hệ bạn sớm nhất",
                type: " warning ",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: " No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(() => {
                var name = document.getElementById("name").value;
                var email = document.getElementById("email").value;
                var phone = document.getElementById("phone").value;
                var content = document.getElementById("content").value;
                var url = "{{ route('post.contact') }}"
                axios.post(url, {
                        name: name,
                        email: email,
                        phone: phone,
                        content: content
                    })
                    .then(function(response) {
                       if (response.data == 1) {

                        window.location.reload();
                       }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }),
            function() {
            }
    }

</script>
