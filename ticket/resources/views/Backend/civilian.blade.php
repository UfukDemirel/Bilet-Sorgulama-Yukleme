@extends('Backend.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon"></div>
                    <form action="{{route('searchstudent')}}" method="get">
                        <input type="search" class="form-control" name="search" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                    </form>
                </div>
            </li>
            <br>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Students</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            İd
                                        </th>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            Name Surname
                                        </th>
                                        <th>
                                            Class
                                        </th>
                                        <th>
                                            Kind
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($student as $key)
                                        <tr>
                                            <td class="py-1">
                                                {{$key->id}}
                                            </td>
                                            <td class="py-1">
                                                <img src="/public/images/{{$key->file}}" alt="image"/>
                                            </td>
                                            <td>
                                                {{$key->name}} {{$key->surname}}
                                            </td>
                                            <td>
                                                @if($key->is_active == '0')
                                                    <label class="badge badge-warning">Pasif</label>
                                                @endif
                                                @if($key->is_active == '1')
                                                    <label class="badge badge-success">Aktif</label>
                                                @endif
                                            </td>
                                            <td>
                                               {{$key->kind}}
                                            </td>
                                            <td>
                                                <div align="right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary">Details</button>
                                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                                                            <a class="dropdown-item" href="{{route('studentdetails',['id'=>$key->id])}}">Student Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="{{route('remove',['id' => $key->id])}}">Student Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
