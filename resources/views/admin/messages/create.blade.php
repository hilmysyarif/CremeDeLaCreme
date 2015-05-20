@extends('admin')

@section('content')

        {!! Form::open(['route' => 'admin.messages.store', 'method' => 'POST']) !!}
			{!! Form::text('number') !!}
			{!! Form::textarea('message') !!}
			{!! Form::submit('tamere') !!}
        {!! Form::close() !!}

@stop