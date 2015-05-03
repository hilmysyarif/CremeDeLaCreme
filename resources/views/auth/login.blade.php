@extends('auth.app')
@section('content')
			@if(Session::has('error'))
			<div class="panel-heading heading-border bg-white">
              	<div class="alert alert-danger">
              		{{ Session::get('error')}}
              	</div>
            </div>
            @endif

			<!-- end .form-header section -->
            {!!Form::open(['url' => 'admin/login', 'id' => 'contact'])!!}
              <div class="panel-body bg-light p30">
                <div class="row">
                  <div class="col-sm-12 pr30">
					
                    <div class="section">
                      <label for="email" class="field-label text-muted fs18 mb10">Adresse e-mail</label>
                      <label for="email" class="field prepend-icon">
						{!!Form::email('email', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Email'])!!}
                        <label for="email" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                      <label for="username" class="field-label text-muted fs18 mb10">Mot de passe</label>
                      <label for="password" class="field prepend-icon">
                        {!!Form::password('password', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Mot de passe'])!!}
                        <label for="password" class="field-icon">
                          <i class="fa fa-lock"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                  </div>
                </div>
              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix p10 ph15">
                <label class="switch ib switch-primary pull-left input-align mt10">
                  <input type="checkbox" name="remember" id="remember" checked>
                  <label for="remember" data-on="OUI" data-off="NON"></label>
                  <span>Garder ma session active</span>
                </label>
                <button type="submit" class="button btn-primary mr10 pull-right">Connexion</button>
              </div>
              <!-- end .form-footer section -->
            </form>
@stop