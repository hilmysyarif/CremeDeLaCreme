@extends('admin')

@section('topbar')
        <ol class="breadcrumb">
          <li class="crumb-active">
            <a href="{{ url('admin/dashboard')}}"><span class="glyphicon glyphicon-home"></span></a>
          </li>
          <li class="crumb-trail"><a href="{{ url('admin/payments')}}">Paiements</a></li>
          <li class="crumb-trail">Liste des paiements</li>
        </ol>
@stop

@section('content')
        <div class="tray tray-center">
			<div class="row">
            <div class="col-md-12">
              @if(Session::has('success'))
              <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-check pr10"></i>
                <strong>{{ Session::get('success') }}</strong>
              </div>
              @endif

              <div class="panel panel-visible" id="spy1">
                <div class="panel-heading">
                  <a class="pull-right mt5 btn btn-success" id="addpayment" href="#modal-form">Créer une demande de paiement</a>
                  <div class="panel-title">
                    <span class="glyphicon glyphicon-tasks"></span>Rechercher un paiement
                  </div>
                </div>
                <div class="panel-body pn">
                  <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Etat</th>
                        <th>Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($payments AS $payment)
                      <tr>
                        <td>{{$payment->id}}</td>
                        <td>{{$payment->client_name }}<br>{{$payment->client_mail}}</td>
                        <td>{{$payment->description}}</td>
                        <td>{{$payment->price}}€</td>
                        <td>{{$payment->getStatus()}}</td>
                        <td>{{ date('d/m/Y', strtotime($payment->created_at))}}</td>
                        <td>
                          <a href="{{url('admin/payments/'.$payment->id)}}" data-toggle="tooltip" data-placement="bottom" data-original-title="Afficher plus d'informations"><i class="fa fa-search"></i></a>
                          <span class="mr15"></span>
                          <a href="{{  $payment->shortLink }}" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Accéder au lien raccourci"><i class="fa fa-globe"></i></a>
                          <span class="mr15"></span>
                          <a href="https://dashboard.stripe.com/test/payments/{{ $payment->stripe_transaction }}" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Vérifier le paiement sur Stripe"><i class="fa fa-cc-stripe"></i></a>

                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

		</div>

    <!-- Admin Form Popup -->
    <div id="modal-form" class=" popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
      <div class="panel">
        <div class="panel-heading">
          <span class="panel-title">
            <i class="fa fa-money"></i><small>Créer une demande de paiement</small></span>
        </div>
        <!-- end .panel-heading section -->
        {!! Form::open(['route' => 'admin.payments.store', 'method' => 'POST', 'id' => 'payments', 'autocomplete'=>'off']) !!}
          <div class="panel-body p25">
            <div class="section row">
              <div class="col-md-12">
                <label for="name" class="field prepend-icon">
                  {!!Form::text('client_name', null, ['class' => 'gui-input', 'id' => 'client_name', 'placeholder' => 'Nom du client', 'required' => true])!!}
                  <label for="name" class="field-icon">
                    <i class="fa fa-user"></i>
                  </label>
                </label>
              </div>
              <!-- end section -->

            </div>
            <!-- end section row section -->

            <div class="section row">
              <div class="col-md-12">
                <label for="email" class="field prepend-icon">
                  {!!Form::email('client_email', null, ['class' => 'gui-input', 'id' => 'client_email', 'placeholder' => 'Adresse E-mail', 'required' => true, 'autocomplete'=>'off'])!!}
                  <label for="email" class="field-icon">
                    <i class="fa fa-envelope"></i>
                  </label>
                </label>
              </div>
              <!-- end section -->
            </div>
            <!-- end section row section -->

            <div class="section row">
              <div class="col-md-12">
                <label for="password" class="field prepend-icon">
                  {!!Form::textarea('description', null, ['class' => 'gui-textarea', 'id' => 'description', 'placeholder' => 'Description de la mission', 'required' => true])!!}
                  <label for="password" class="field-icon">
                    <i class="fa fa-lock"></i>
                  </label>
                </label>
              </div>
              <!-- end section -->
            </div>
            <!-- end section row section -->


            <div class="section row">
              <div class="col-md-12">
                <label for="password" class="field prepend-icon">
                  {!!Form::textarea('client_address', null, ['class' => 'gui-textarea', 'id' => 'client_address', 'placeholder' => 'Adresse complète de facturation (facultatif)'])!!}
                  <label for="password" class="field-icon">
                    <i class="fa fa-home"></i>
                  </label>
                </label>
              </div>
              <!-- end section -->
            </div>
            <!-- end section row section -->

            <div class="section row">
              <div class="col-md-12">
                <label for="password" class="field prepend-icon">
                  {!!Form::text('price', null, ['class' => 'gui-input', 'id' => 'price', 'placeholder' => 'Prix (en centimes d\'euros)', 'required' => true])!!}
                  <label for="password" class="field-icon">
                    <i class="fa fa-dollar"></i>
                  </label>
                </label>
                <div class="alert alert-warning hide" id="alert-price">Le prix doit être de type numérique</div>
              </div>
              <!-- end section -->
            </div>
            <!-- end section row section -->

          </div>
          <!-- end .form-body section -->

          <div class="panel-footer">
            <button type="submit" class="button btn-primary" id="sendButton">Envoyer</button>
          </div>
          <!-- end .form-footer section -->
        </form>
      </div>
      <!-- end: .panel -->
    </div>
    <!-- end: .admin-form -->


@stop



@section('css')
	{!! HTML::style('vendor/plugins/datatables/media/css/dataTables.bootstrap.css') !!}
	{!! HTML::style('vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css') !!}
	{!! HTML::style('vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') !!}

  {!! HTML::style('vendor/plugins/magnific/magnific-popup.css') !!}
  {!! HTML::style('assets/admin-tools/admin-forms/css/admin-forms.css') !!}


@stop

@section('js')

	{!! HTML::script('vendor/plugins/datatables/media/js/jquery.dataTables.js') !!}
	{!! HTML::script('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') !!}
	{!! HTML::script('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
	{!! HTML::script('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') !!}

  {!! HTML::script('vendor/plugins/magnific/jquery.magnific-popup.js') !!}

@stop

@section('js-inside')

    $('#datatable').dataTable({
      "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [-1]
      }],
      "oLanguage": {
        "oPaginate": {
          "sPrevious": "",
          "sNext": ""
        }
      },
      "iDisplayLength": 10,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
      
    });

      // Add Placeholder text to datatables filter bar
    $('.dataTables_filter input').attr("placeholder", "Rechercher...");
  

   var modalContent = $('#addpayment');
   modalContent.on('click', function(e) {
      e.preventDefault();
      
      $.magnificPopup.open({
        removalDelay: 500, //delay removal by X to allow out-animation,
        items: {
          src: '#modal-form'
        },
        // overflowY: 'hidden', // 
        callbacks: {
          beforeOpen: function(e) {
            var Animation = 'mfp-slideUp';
            this.st.mainClass = Animation;
          }
        },
        midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
      });

    });

    $( "#payments" ).submit(function( event ) {
      var price = $('#price').val();
      if(price.match(/^\d+$/)) {
        return true;
      }
      else{
        event.preventDefault();
        $('#alert-price').removeClass('hide');
      }

    });
@stop