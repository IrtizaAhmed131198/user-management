@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Edit</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Password (Leave blank to keep the current password)</label>
                                <input id="password" name="password" type="password" class="form-control">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                                @error('avatar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                @if($user->image)
                                    <p>Current Avatar:</p>
                                    <img src="{{ asset($user->image) }}" alt="{{ $user->name }}" width="100">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update User</button>
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
