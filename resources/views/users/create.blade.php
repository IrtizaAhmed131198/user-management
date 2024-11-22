@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Create</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Enter user's name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control" placeholder="Enter user's email" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Enter password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Upload Avatar (Optional)</label>
                                <input type="file" name="avatar" class="form-control">
                                @error('avatar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Create User</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection
