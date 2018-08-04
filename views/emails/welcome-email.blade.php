@extends('emails.base-email')

@section('body')
<p>
    Welcome to Acme!
</p>
<p>
  Please <a href="{!! getenv('HTTP_HOST') !!}/verify-account?token={!!$token!!}">click here to active</a> your account!
</p>
@endsection
