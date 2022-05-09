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
            <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>姓名</th>
                        <th>年龄</th>
                        <th>电话号码</th>
                        <th>身份证号码</th>
                        <th>所属院校</th>
                        <th>报名单位名称</th>
                        <th>注册时间</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $i => $member)
                        <tr>
                            <td>
                                {{ $members->perPage() * ($members->currentPage()-1) + ($i + 1) }}
                            </td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->age }}</td>
                            <td>{{ $member->phone_number }}</td>
                            <td>{{ $member->id_number }}</td>
                            <td>{{ $member->school }}</td>
                            <td>{{ $member->unit_name }}</td>
                            <td>{{ $member->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            {{ $members->links('partials.pagination') }}
        </div>
    </div>
</div>

@endsection

@push('post-body-scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery/jquery.dataTables.min.js') }}"></script>

<link href="{{ asset('css/jquery.dataTables.min.css') }}"  rel="stylesheet">

<script>    
    $(document).ready(function() {
        $('#dataTable').dataTable();
    })
</script>

@endpush



