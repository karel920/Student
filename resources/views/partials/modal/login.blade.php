@php
    $id = $id ?? '';
    $redirectUrl = $redirectUrl ?? '';
@endphp

<div class="modal fade" id="{{ $id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="login-form" method="POST" action="{{ route(App\WebRoute::AUTH_AUTHENTICATE) }}">
                    @csrf

                    <input type="hidden" name="redirect_url" value="{{ $redirectUrl }}"/>

                    <div class="form-group">
                        <label>密码</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">确认</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('post-body-scripts')
<script>
    $(function () {
      $('#login-form').validate({
        rules: {
          password: {
            required: true,
          },
        },
        messages: {
            password: {
                required: "请填写密码",
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>
@endpush
