{{-- Note:sử dụng AJAX để thêm dữ liệu vào table Contact --}}

<div>
    <div class="rd-navbar-aside" id="rd-navbar-aside">
        <h3>Contact</h3>
        <!--RD Mailform-->
        <form class="rd-form rd-mailform form_contact" method="POST">
            @csrf
            <div class="row row-22">
                <div class="col-12">
                    <div class="form-wrap">
                        <input class="form-input" id="contact-email" type="text" name="name" placeholder="Name">
                    </div>
                    <span class="error error_name"></span>
                </div>
                <div class="col-12">
                    <div class="form-wrap">
                        <input class="form-input" id="contact-email" type="email" name="email" placeholder="E-mail">
                    </div>
                    <span class="error error_email"></span>
                </div>
                <div class="col-12">
                    <div class="form-wrap">
                        <input class="form-input" id="contact-phone" type="text" name="phone" placeholder="Phone">
                    </div>
                    <span class="error error_phone"></span>
                </div>

                <div class="col-12">
                    <div class="form-wrap">
                        <textarea class="form-input" id="contact-message" name="comment" placeholder="Comment"></textarea>
                    </div>
                    <span class="error error_comment"></span>
                </div>
                <div class="col-12">
                    <button class="button button-primary" type="submit">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- code thêm dữ liệu vào db --}}

@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $(".form_contact").submit(function(e) {
                e.preventDefault();
                var fd = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ url('contact') }}',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: (response) => {
                        console.log(response);
                        if (response.status == true) {
                            $(".form_contact")[0].reset();
                            $(".error_name").html(null);
                            $(".error_email").html(null);
                            $(".error_phone").html(null);
                            $(".error_comment").html(null);
                            $(".rd-navbar-aside").toggleClass("active");
                            swal("Success", {
                                icon: "success",
                            })
                        }
                    },
                    error: (error) => {
                        if (error.responseJSON.errors.name) {
                            $(".error_name").html(error.responseJSON.errors.name);
                        } else {
                            $(".error_name").html(null);
                        }
                        if (error.responseJSON.errors.email) {
                            $(".error_email").html(error.responseJSON.errors.email);
                        } else {
                            $(".error_email").html(null);
                        }
                        if (error.responseJSON.errors.phone) {
                            $(".error_phone").html(error.responseJSON.errors.phone);
                        } else {
                            $(".error_phone").html(null);
                        }
                        if (error.responseJSON.errors.comment) {
                            $(".error_comment").html(error.responseJSON.errors.comment);
                        } else {
                            $(".error_comment").html(null);
                        }

                    }
                })
            })
        });
    </script>
@endpush
