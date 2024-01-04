@extends('includes.admin_layout')
@section('page_content')
<div class="container" style="background: #ccc;padding: 15px;">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Qualification</th>
                        <th>Constituency</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($voter_register as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->mobile }}</td>
                        <td>{{ $row->qualifications }}</td>
                        <td>{{ $row->constituency }}</td>
                        <td>{{ $row->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('page_script')