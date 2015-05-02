@extends('auth.app')

@section('content')
                    @if(Session::has('error'))
                            {{Session::get('error')}}
                    @endif
                     {!!Form::open(['url' => 'auth/login', 'class' => 'form-horizontal'])!!}
								{!!Form::email('email', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Email'])!!}
							{!!Form::password('password', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Mot de passe'])!!}
									{!!Form::checkbox('remember')!!} Se souvenir de moi
							    {!! Form::submit('Se connecter', ['class' => 'btn btn-auth']) !!}
					{!!Form::close()!!}
@endsection
