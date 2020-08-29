<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AlFatwah') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Font Awesome Icon-->
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" /> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> --}}
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/custom.css')}}" />
    <style type="text/css">
        .nav-link{
            color: #222222;
        }
    </style>


    @yield('css')
</head>

<body>
    @include('frontend.layouts.topbar')
    @include('frontend.layouts.navbar')
    @yield('content')
    @include('frontend.layouts.footer')
    
    <div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="" data-submit="ajax">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-4"></div>

                            <div class="col-md-6 message_div">
                            </div>

                            <div class="col-md-12 form_div">
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button class="btn btn-primary modal_form_submit_btn"></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <script>
        function openSearch() {
            document.getElementById("myOverlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("myOverlay").style.display = "none";
        }

    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
        //sticky navbar
        $(window).scroll(function() {
            let position = $(this).scrollTop();
            if (position >= 250) {
                $('#MyNavbar').addClass('fixed-top');
            } else {
                $('#MyNavbar').removeClass('fixed-top');
            }
        })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        function logout(){
            document.getElementById('logout-form').submit();
        }
    </script>

    <script type="text/javascript">
        $(function(){

            $(document).on('click', '[data-action="form-modal"]', async function(e){
                e.preventDefault();
                let form_modal = $('#form_modal');
                form_modal.find('form').attr('action', $(this).attr('data-submit_url'));
                form_modal.find('.modal-header').text($(this).attr('data-modal-title'));
                form_modal.find('.modal_form_submit_btn').text($(this).attr('data-submit_btn'));

                form_modal.find('form').trigger('reset');

                if($(this).attr('data-form') == "ajax"){
                    await $.get($(this).attr('data-form_url'), function(data) {
                        form_modal.find('.modal-body .message_div').html('');
                        form_modal.find('.modal-body .form_div').html(data);
                    }).fail(function(errors) {
                        form_modal.find('.modal-body .message_div').html(errors);
                    });
                }

                form_modal.modal('show');

                window.shown_modal = form_modal;

            });

            $(document).on('submit', "form[data-submit='ajax']",  function(e){
            e.preventDefault();
            let form = $(this);

            $.ajax({
                url: $(this).attr('action'),
                data: new FormData(this),
                type: "POST",
                dataType: 'text',
                contentType: false,
                cache: false,
                processData:false,
                success:  function (data) {
                    if(!!data && data.success){
                        form.find('.message_div').html(data.success);
                    }
                    if(!!data && data.redirectTo){
                        window.location = data.redirectTo;
                    }else{
                        window.location.reload();
                    }
                },
                error: function (errors) {
                    form.find('.message_div').html('');
                    if(!!errors.responseJSON.errors){
                        $.each(errors.responseJSON.errors, function(key, message){
                            form.find('.message_div').append(`
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  ${message[0]}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                `);
                        });
                    }
                }
            });              

            });
        })
    </script>
    @yield('js')
</body>

</html>
