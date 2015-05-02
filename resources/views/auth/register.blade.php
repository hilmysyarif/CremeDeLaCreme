@extends('auth.app')


@section('content')
<section class="striped">
	<div class="container-fluid">
		<div class="banner">
		    <div class="container">
		        <h2 class="sublead">Inscrivez-vous dès maintenant</h2>
		    </div>
		</div>
	</div>
</section>

<div class="container">
	<div class="row" id="signup-form">
        {!! Form::open(['route' => 'admin.auth.store', 'method' => 'POST',  'class' => 'col-md-8 col-md-offset-2', 'id' => 'billing-form']) !!}


		    				@if (!$errors->isEmpty())
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif




					         {!!Form::label('name', 'Nom d\'utilisateur *', ['class' => 'col-md-4 control-label'])!!}

					             {!!Form::text('name', null, ['class' => 'form-control input-md', 'id' => 'name', 'placeholder' => 'Nom d\'utilisateur', 'required' => true])!!}
					             <span class="label label-danger hide">Username taken. Try something else.</span>



					    <!-- Text input-->
					    <div class="form-group row">
					         {!!Form::label('email', 'Adresse E-mail *', ['class' => 'col-md-4 control-label'])!!}

					        <div class="col-md-8">
					             {!!Form::email('email', null, ['class' => 'form-control input-md', 'id' => 'email', 'placeholder' => 'Adresse E-mail', 'required' => true])!!}
					        </div>
					    </div>

					    <!-- Text input-->
					    <div class="form-group row">
                            {!!Form::label('password', 'Mot de passe *', ['class' => 'col-md-4 control-label'])!!}
					        <div class="col-md-8">
					            {!!Form::password('password', ['class' => 'form-control input-md', 'id' => 'password', 'placeholder' => 'Mot de passe', 'required' => true])!!}
					        </div>
					    </div>

                        <div class="form-group row">
                            {!!Form::label('password_confirmation', 'Confirmer *', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-8">
                                {!!Form::password('password_confirmation', ['class' => 'form-control input-md', 'id' => 'password_confirmation', 'placeholder' => 'Confirmer votre mot de passe', 'required' => true])!!}
                            </div>
                        </div>
					</fieldset>

					
				</div>
			</div>
    	{!!Form::close()!!}
    </div>
</div>

@stop
