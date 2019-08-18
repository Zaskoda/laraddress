@extends('layouts.basic')
@section('content')
    <div class="text-center">
        <p><i class="fa fa-fw fa-frown-o"></i> I did not find <b>{{ $email }}</b> associated with a contact.<br> What would you like to do?</p>
        <p>
            <a href="/" class="btn btn-warning"><i class="fa fa-fw fa-arrow-left"></i> Try A Different Email</a>
        </p>
        <p>
            <form action="/create" method="post" class="form-inline  justify-content-center">
                @csrf
                <input type="hidden" name="email_address" value="{{ $email }}">
                <button class="btn btn-success" type="submit" value="submit"><i class="fa fa-fw fa-address-card"></i> Create New Contact <i class="fa fa-plus"></i></button>
            </form>
        </p>
    </div>
@endsection('content')
