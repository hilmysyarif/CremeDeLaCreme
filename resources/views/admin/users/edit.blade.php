@extends('admin')

@section('topbar')
        <ol class="breadcrumb">
          <li class="crumb-active">
            <a href="{{ url('admin/dashboard')}}"><span class="glyphicon glyphicon-home"></span></a>
          </li>
          <li class="crumb-trail"><a href="{{ url('admin/users')}}">Utilisateurs</a></li>
          <li class="crumb-trail">Edition de l'utilisateur : {{ $user->name }} ({{$user->email}})</li>
        </ol>
@stop

@section('content')
			<div class="row admin-form">
				<div class="col-md-6 col-md-offset-3">
		        {!! Form::open(['url' => 'admin/users/'.$user->id, 'method' => 'PUT', 'id' => 'comment', 'autocomplete'=>'off']) !!}

                  <form method="post" action="" id="form-ui">
                    <div class="section-divider mb40" id="spy1">
                      <span>Edition de l'utilisateur</span>
                    </div>
                    <!-- .section-divider -->

                    <!-- Basic Inputs -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="section">
                          <label class="field">
			                  {!!Form::text('name', $user->name, ['class' => 'gui-input', 'id' => 'name', 'placeholder' => 'Nom d\'utilisateur', 'required' => true])!!}
                          </label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="section">
                          <label class="field">
                 			 {!!Form::email('email', $user->email, ['class' => 'gui-input', 'id' => 'email', 'placeholder' => 'Adresse E-mail', 'required' => true, 'autocomplete'=>'off'])!!}
                          </label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="section">
                          <label class="field">
                           <input type="password" name="password" class="gui-input" readonly onfocus="$(this).removeAttr('readonly');" placeholder="Mot de passe (changer si besoin)"/>

                          </label>
                        </div>
                      </div>
                      @if($user->id != 1)
                      <div class="col-md-12">
                        <div class="section">
                          <label class="field">
                          	<select name="rank" class="gui-input">
                          		<option value="0"<?php if($user->rank == 0) echo ' selected'; ?>>Opérateur</option>
                          		<option value="1"<?php if($user->rank == 1) echo ' selected'; ?>>Administrateur</option>
                          	</select>
                          </label>
                        </div>
                      </div>
                      @else
                      <div class="col-md-12">
                        <div class="section">
                          <label class="field">
                          	<select name="rank" class="gui-input">
                          		<option value="1"<?php if($user->rank == 1) echo ' selected'; ?>>Administrateur</option>
                          	</select>
                          </label>
                        </div>
                      </div>
                      @endif
                      <div class="col-md-12">
			            <button type="submit" class="button btn-success">Confirmer</button>
                      </div>
                    </div>
                  </form>

				</div>
			</div>
@stop

@section('css')
	{!!HTML::style('assets/admin-tools/admin-forms/css/admin-forms.css')!!}
@stop