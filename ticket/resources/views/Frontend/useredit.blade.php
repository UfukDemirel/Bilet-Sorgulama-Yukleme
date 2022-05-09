@extends('Frontend.home')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div align="right"><a href="{{route('user')}}"><button type="button" class="btn btn-dark">Back</button></a></div>
                            <div align="center"><h4 class="card-title">Profile Update</h4></div>
                            <form class="forms-sample" method="post" action="{{route('usereditpost')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Surname</label>
                                    <input type="text" class="form-control" name="surname" value="{{\Illuminate\Support\Facades\Auth::user()->surname}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">İdentity</label>
                                    <input type="text" class="form-control" name="identity" value="{{\Illuminate\Support\Facades\Auth::user()->identity}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">E-Mail</label>
                                    <input type="text" class="form-control" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}">
                                </div>
                                <div align="right"><button type="submit" class="btn btn-dark mr-2">Save</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
