<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Contact-us</title>
  </head>
  <body>

    <div class="container d-flex justify-content-center pt-5">
        <form class="card p-2" method="POST" action="{{ route('contact-us') }}" enctype="multipart/form-data" id="contactus-form">
            @csrf
            <div class="card-body">
            <div class="form-group p-2">
               <h2> Contact Us <h2>
            </div>
            <div class="form-group p-2">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
            <div class="form-group p-2">
              <label for="full_name">Full Name:</label>
              <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name') }}">
                @if ($errors->has('full_name'))
                    <span class="help-block">
                        <strong class="form-text text-danger">{{ $errors->first('full_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group p-2">
              <label for="email">Email:</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong class="form-text text-danger">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group p-2">
                <label for="mobile_number">Mobile Number:</label>
                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}">
                  @if ($errors->has('mobile_number'))
                      <span class="help-block">
                          <strong class="form-text text-danger">{{ $errors->first('mobile_number') }}</strong>
                      </span>
                  @endif
              </div>
            <div class="form-group p-2">
              <label for="message">Message:</label>
              <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" value="{{ old('message') }}">{{ old('message') }}</textarea>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong class="form-text text-danger">{{ $errors->first('message') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group p-2">
              <label for="image">Select Image:</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong class="form-text text-danger">{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>

            <div class="form-group p-2">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
          </form>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        /* start jquery validation methos */
            $.validator.addMethod(
                "not_empty",
                function (value, element) {
                    return this.optional(element) || /\S/.test(value);
                },
                "Only space is not allowed."
            );

            $.validator.addMethod(
                "valid_email",
                function (value, element) {
                    return (
                        this.optional(element) ||
                        /^([\w-\.\+\_]+@([\w-]+\.)+([\w-]{2,})+)?$/.test(value)
                    );
                },
                "Please enter a valid email address."
            );

       $("#contactus-form").validate({
        rules: {
                full_name: {
                    required: true,
                    not_empty: true,
                    minlength: 3,
                    maxlength: 50,
                },
                email: {
                    required: true,
                    not_empty: true,
                    valid_email:true,
                    minlength: 3,
                    maxlength: 30,
                },
                message: {
                    required: true,
                    not_empty: true,
                    minlength: 3,
                    maxlength: 500,
                },
                mobile_number: {
                    required: true,
                    not_empty: true,
                    minlength: 3,
                    maxlength: 11,
                },

            },
            messages: {
                full_name: {
                    required: "@lang('validation.required',['attribute'=>'name'])",
                    not_empty: "@lang('validation.not_empty',['attribute'=>'name'])",
                    minlength:"@lang('validation.min.string',['attribute'=>'name','min'=>3])",
                    maxlength:"@lang('validation.max.string',['attribute'=>'name','max'=>50])",

                },
                email: {
                    required: "@lang('validation.required',['attribute'=>'Email'])",
                    not_empty: "@lang('validation.not_empty',['attribute'=>'Email'])",
                    minlength:"@lang('validation.min.string',['attribute'=>'Email','min'=>3])",
                    maxlength:"@lang('validation.max.string',['attribute'=>'Email','max'=>30])",
                },
                message: {
                    required: "@lang('validation.required',['attribute'=>'Message'])",
                    not_empty: "@lang('validation.not_empty',['attribute'=>'Message'])",
                    minlength:"@lang('validation.min.string',['attribute'=>'Message','min'=>3])",
                    maxlength:"@lang('validation.max.string',['attribute'=>'Message','max'=>300])",
                },
                mobile_number: {
                    required: "@lang('validation.required',['attribute'=>'Mobile No'])",
                    not_empty: "@lang('validation.not_empty',['attribute'=>'Mobile No'])",
                    minlength:"@lang('validation.min.string',['attribute'=>'Mobile No','min'=>3])",
                    maxlength:"@lang('validation.max.string',['attribute'=>'Mobile No','max'=>11])",
                },
            },
            errorClass: 'invalid-feedback',
            errorElement: 'span',
            highlight: function (element) {
                $(element).addClass('is-invalid');
                $(element).siblings('label').addClass('text-danger'); /* For Label */
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
                $(element).siblings('label').removeClass('text-danger');
            },
            errorPlacement: function (error, element) {
                if (element.attr("data-error-container")) {
                    error.appendTo(element.attr("data-error-container"));
                } else {
                    error.insertAfter(element);
                }
            }
        });
        $('#contactus-form').submit(function (e) {
            if ($(this).valid()) {
                $("input[type=submit], input[type=button], button[type=submit]").prop("disabled", "disabled");
                return true;
            } else {
                return false;
            }
        });
    });

    </script>
</html>
