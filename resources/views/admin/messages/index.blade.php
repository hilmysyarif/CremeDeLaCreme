@extends('admin')


@section('topbar')
        <ol class="breadcrumb">
          <li class="crumb-active">
            <a href="{{ url('admin/dashboard')}}"><span class="glyphicon glyphicon-home"></span></a>
          </li>
          <li class="crumb-trail"><a href="{{ url('admin/messages')}}">Messages</a></li>
          <li class="crumb-trail">Liste des conversations</li>
        </ol>
@stop

@section('content')
        <div class="tray tray-center">      
			
			<div class="row">
				<div class="col-md-3">
					<div class="panel">
						<div class="panel-heading">
							<span class="panel-title">Conversations</span>
						</div>

	                 	<div class="panel-body panel-scroller scroller-lg scroller-overlay pn">
							<ul class="list-messages" id="showConversations">
								
							</ul>

	                 	</div>
	                 </div>

				</div>
				<div class="col-md-9">
					<div class="panel ">
	                  
						<div class="panel-heading">
							<span class="panel-title">Conversation <strong id="numberPhone"></strong>
							<strong class="text-danger mt15" id="whoIsWriting" style="display:none"></strong>
</span>
						</div>
	                  	<div class="panel-body panel-scroller scroller-lg scroller-overlay p10">
							<ul class="conv-messages">
							</ul>
	                  	</div>
	                </div>
	                <div class="admin-form" style="display:none;">
		                {!! Form::open(['url' => 'admin/api/messages/store', 'id' => 'formSendMessage', 'method' => 'POST']) !!}
			                <meta name="_token" content="{!! csrf_token() !!}"/>
							{!! Form::text('postMessage', NULL, ['id'=>'postMessage', 'class'=>'form-control', 'placeholder'=>'Votre message', 'onblur'=>'this.value="";']) !!}
				        {!! Form::close() !!}
	                </div>
                </div>

              </div>



				</div>
			</div>

        </div>
@stop

@section('js')
    <script src="{{ asset('assets/js/messages.js') }}"></script>
@stop

@section('js-inside')
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
@stop