@extends('Frontend.home')
@section('content')
    <section class="component">
        <div class="credit-card">
            <div align="right"><a href="{{route('user')}}"><button class="btn btn-dark">Back</button></a></div>
            <br>
            <h2>Load Balance</h2>
            <br><br>
            <form action="{{route('balancepost')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Ticket Number</label>
                    <input type="text" class="form-control" readonly name="number" value="{{Auth::user()->number}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Balance</label>
                    <input type="number" class="form-control" placeholder="0 TL" name="money" value="{{old('money')}}">
                </div>
                <div class="line">
                    <input type="text" placeholder="0000 0000 0000 0000" name="card" value="{{old('card')}}"/>
                </div>
                <br>
                <div class="line">
                    <input class="litle" type="text" placeholder="00/00" name="time" value="{{old('time')}}"/>
                    <input class="tall" type="text" placeholder="CCV" name="ccv" value="{{old('ccv')}}"/>
                </div>
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}"/>
                <input type="hidden" name="updated_at" value="{{old('updated_at')}}"/>
                <br>
                <button type="submit" class="btn btn-outline-dark">Checkout</button>
            </form>
        </div>
    </section>
@endsection
