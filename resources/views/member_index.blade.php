@extends('layout.guest_layout')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2>报名系统</h2>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div>
    <div class="card">

        <div class="card-body">
            <form id="member_form" method="POST" action="{{ route(App\WebRoute::MEMBER_CREATE) }}">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label>姓名</label>
                        <input type="text"class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label>年龄</label>
                        <input type="number" min="0" class="form-control" id="age" name="age">
                    </div>

                    <div class="form-group">
                        <label>电话号码</label>
                        <input type="text"class="form-control" id="phone_number" name="phone_number">
                    </div>

                    <div class="form-group">
                        <label>身份证号码</label>
                        <input type="text"class="form-control" id="id_number" name="id_number">
                    </div>

                    <div class="form-group">
                        <label>所属院校</label>
                        <input type="text"class="form-control" id="school" name="school">
                    </div>

                    <div class="form-group">
                        <label>报名单位名称</label>
                        <select class="form-control" id="unit" name="unit">
                            @foreach (\App\Models\Member::UNITS as $unit)
                                <option value="{{ $unit['value'] }}">{{ $unit['title'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">确认</button>
                        <a role="button" href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-primary">管理</a>
                    </div>

                </div>
            </form>
        </div>

        @include('partials.modal.login', ['id' => 'login-modal', 'redirectUrl' => route(App\WebRoute::MEMBER_LIST)])
    </div>
</div>

@endsection

@push('post-header-scripts')
    <script type="text/javascript">
        window.addEventListener('load', function (event) {

            $(window).on('popstate', function() {
                location.reload(true);
            });

        }, false);
    </script>
@endpush

@push('post-body-scripts')
<script>
    $(function () {
      $('#member_form').validate({
        rules: {
          name: {
            required: true,
          },
          age: {
            required: true,
            min: 1,
          },
          phone_number: {
            required: true
          },
          id_number: {
            required: true
          },
          school: {
            required: true
          },
          unit: {
            required: true
          },
        },
        messages: {
            name: {
                required: "请填写姓名",
            },
            age: {
                required: "请填写年龄",
                min: "可积分额度不足",
            },
            phone_number: {
                required: "请填写电话号码"
            },
            id_number: {
                required: "请填写身份证号码"
            },
            school: {
                required: "请填写所属院校"
            },
            unit: {
                required: "请填写报名单位名称"
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



