@extends('Frontend.home')
@section('content')
    <section class="component">
        <div class="credit-card">
            <div align="right"><a href="{{route('user')}}"><button class="btn btn-dark">Back</button></a></div>
            <br>
            <h2>Balance Inquiry</h2>
            <br><br><br><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ticket Number</label>
                    <input type="text" class="form-control" readonly value="{{Auth::user()->number}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Inquiry</label>
                    <input type="number" class="form-control" readonly value="{{$toplam}}">
                </div>
        </div>
    </section>
@endsection
