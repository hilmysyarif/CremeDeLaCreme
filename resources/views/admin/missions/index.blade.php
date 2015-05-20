@extends('admin')

@section('topbar')
        <ol class="breadcrumb">
          <li class="crumb-active">
            <a href="{{ url('admin/dashboard')}}"><span class="glyphicon glyphicon-home"></span></a>
          </li>
          <li class="crumb-trail"><a href="{{ url('admin/missions')}}">Missions</a></li>
          <li class="crumb-trail">Liste des missions</li>
        </ol>
@stop

@section('content')
    <div class="tray tray-center">
			<div class="row">
            <div class="col-md-12">
              <div class="panel panel-visible" id="spy1">
                <div class="panel-heading">
                  <div class="panel-title">
                    <span class="glyphicon glyphicon-tasks"></span>Missions payées
                  </div>
                </div>
                <div class="panel-body pn">
                  <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Description et commentaires</th>
                        <th>Client</th>
                        <th>Statut</th>
                        <th>Deadline</th>
                        <th>Etudiant</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($missions AS $mission)
                        @if($mission->payment->status == 'payed' AND !$mission->isFinished())
                        <tr>
                          <td>{{$mission->id}}</td>
                          <td>{{Str::limit($mission->description,70,'...')}}</td>
                          <td>{{$mission->payment->client_name.' ('.$mission->payment->client_phone.')'}}</td>
                          <td>{{$mission->getStatus()}}</td>
                          <td>{{ date('d/m/Y', strtotime($mission->deadline))}}</td>
                          <td>Etudiant (Payé 100€)</td>
                          <td>
                            <a href="{{ url('admin/missions/'.$mission->id.'')}}" class="showMission" data-toggle="tooltip" data-placement="bottom" data-original-title="Afficher la mission"><i class="fa fa-search"></i></a>
                            <span class="mr15"></span>
                            <a href="{{ url('admin/missions/'.$mission->id.'/edit')}}" class="editMission" data-mission-id="{{$mission->id}}" data-toggle="tooltip" data-placement="bottom" data-original-title="Editer"><i class="fa fa-pencil"></i></a>
                            <span class="mr15"></span>
                          </td>
                        </tr>
                        @endif 
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      </div>



      <div class="row">
            <div class="col-md-12">
              <div class="panel panel-visible" id="spy1">
                <div class="panel-heading">
                  <div class="panel-title">
                    <span class="glyphicon glyphicon-tasks"></span>Missions en attente de paiement
                  </div>
                </div>
                <div class="panel-body pn">
                  <table class="table table-striped table-hover" id="datatable-2" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Description et commentaires</th>
                        <th>Client</th>
                        <th>Statut</th>
                        <th>Deadline</th>
                        <th>Etudiant</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($missions AS $mission)
                        @if($mission->payment->status == 'unpayed')
                        <tr>
                          <td>{{$mission->id}}</td>
                          <td>{{Str::limit($mission->description,70,'...')}}</td>
                          <td>{{$mission->payment->client_name.' ('.$mission->payment->client_phone.')'}}</td>
                          <td>{{$mission->getStatus()}}</td>
                          <td>{{ date('d/m/Y', strtotime($mission->deadline))}}</td>
                          <td>Etudiant (Payé 100€)</td>
                          <td>
                            <a href="{{ url('admin/missions/'.$mission->id.'')}}" class="showMission" data-toggle="tooltip" data-placement="bottom" data-original-title="Afficher la mission"><i class="fa fa-search"></i></a>
                            <span class="mr15"></span>
                            <a href="{{ url('admin/missions/'.$mission->id.'/edit')}}" class="editMission" data-mission-id="{{$mission->id}}" data-toggle="tooltip" data-placement="bottom" data-original-title="Editer"><i class="fa fa-pencil"></i></a>
                            <span class="mr15"></span>
                          </td>
                        </tr>
                        @endif 
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      </div>



      <div class="row">
            <div class="col-md-12">
              <div class="panel panel-visible" id="spy1">
                <div class="panel-heading">
                  <div class="panel-title">
                    <span class="glyphicon glyphicon-tasks"></span>Missions annulées
                  </div>
                </div>
                <div class="panel-body pn">
                  <table class="table table-striped table-hover" id="datatable-3" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Description et commentaires</th>
                        <th>Client</th>
                        <th>Statut</th>
                        <th>Deadline</th>
                        <th>Etudiant</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($missions AS $mission)
                        @if($mission->payment->status == 'canceled')
                        <tr>
                          <td>{{$mission->id}}</td>
                          <td>{{Str::limit($mission->description,70,'...')}}</td>
                          <td>{{$mission->payment->client_name.' ('.$mission->payment->client_phone.')'}}</td>
                          <td>{{$mission->getStatus()}}</td>
                          <td>{{ date('d/m/Y', strtotime($mission->deadline))}}</td>
                          <td>Etudiant (Payé 100€)</td>
                          <td>
                            <a href="{{ url('admin/missions/'.$mission->id.'')}}" class="showMission" data-toggle="tooltip" data-placement="bottom" data-original-title="Afficher la mission"><i class="fa fa-search"></i></a>
                            <span class="mr15"></span>
                            <a href="{{ url('admin/missions/'.$mission->id.'/edit')}}" class="editMission" data-mission-id="{{$mission->id}}" data-toggle="tooltip" data-placement="bottom" data-original-title="Editer"><i class="fa fa-pencil"></i></a>
                            <span class="mr15"></span>
                          </td>
                        </tr>
                        @endif 
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      </div>



      <div class="row">
            <div class="col-md-12">
              <div class="panel panel-visible" id="spy1">
                <div class="panel-heading">
                  <div class="panel-title">
                    <span class="glyphicon glyphicon-tasks"></span>Missions terminées
                  </div>
                </div>
                <div class="panel-body pn">
                  <table class="table table-striped table-hover" id="datatable-4" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Description et commentaires</th>
                        <th>Client</th>
                        <th>Statut</th>
                        <th>Deadline</th>
                        <th>Etudiant</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($missions AS $mission)
                        @if($mission->payment->status == 'payed' AND $mission->isFinished())
                        <tr>
                          <td>{{$mission->id}}</td>
                          <td>{{Str::limit($mission->description,70,'...')}}</td>
                          <td>{{$mission->payment->client_name.' ('.$mission->payment->client_phone.')'}}</td>
                          <td>{{$mission->getStatus()}}</td>
                          <td>{{ date('d/m/Y', strtotime($mission->deadline))}}</td>
                          <td>Etudiant (Payé 100€)</td>
                          <td>
                            <a href="{{ url('admin/missions/'.$mission->id.'')}}" class="showMission" data-toggle="tooltip" data-placement="bottom" data-original-title="Afficher la mission"><i class="fa fa-search"></i></a>
                            <span class="mr15"></span>
                            <a href="{{ url('admin/missions/'.$mission->id.'/edit')}}" class="editMission" data-mission-id="{{$mission->id}}" data-toggle="tooltip" data-placement="bottom" data-original-title="Editer"><i class="fa fa-pencil"></i></a>
                            <span class="mr15"></span>
                          </td>
                        </tr>
                        @endif 
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      </div>

      
    </div>


    <!-- Admin Form Popup -->
    <div id="editMission" class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
      <div class="panel">
        <div class="panel-heading">
          <span class="panel-title">
            <i class="fa fa-male"></i>Edition de la mission : <strong id="showMissionEdit"></strong></span>
        </div>
        <!-- end .panel-heading section -->
        {!! Form::open(['route' => 'admin.missions.update', 'method'=>'put' , 'id' => 'editMission', 'autocomplete'=>'off']) !!}
          <input type="hidden" name="id" value="" id="getMissionIdForEdit">
          <div class="panel-body p25">
            <div class="section row">
              <div class="col-md-12">
                <label for="description" class="field">Description et commentaires sur la mission :
                  {!!Form::textarea('description', null, ['class' => 'gui-textarea', 'id' => 'getDescription', 'placeholder' => 'Nom d\'utilisateur', 'required' => true])!!}
                </label>
              </div>
              <!-- end section -->

            </div>
            <!-- end section row section -->

            <div class="section row">
              <div class="col-md-12">
                <label for="description" class="field">Statut de la mission :
                  <select name="status" class="form-control" id="getStatus">
                  @foreach(App\Models\Mission::getAllStatus() AS $key => $mission)
                    <option value="{{ $key }}" id="status-{{$key}}">{{$mission}}</option>
                  @endforeach
                  </select>
                </label>
              </div>
              <!-- end section -->
            </div>
            <!-- end section row section -->

            <div class="section row">
              <div class="col-md-12">
                <label for="description" class="field">Deadline :
                  <input type="date" name="deadline" id="getDeadline" placeholder="DeadLine">
                </label>
              </div>
            </div>

          </div>
          <!-- end .form-body section -->

          <div class="panel-footer">
            <button type="submit" class="button btn-primary">Envoyer</button>
          </div>
          <!-- end .form-footer section -->
        </form>
      </div>
      <!-- end: .panel -->
    </div>
    <!-- end: .admin-form -->


    <!-- Admin Form Popup -->
    <div id="showMission" class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
      <div class="panel">
        <div class="panel-heading">
          <span class="panel-title">
            <i class="fa fa-male"></i>Affichage de la mission <strong id="getMissionId"></strong> </span>
        </div>
        <!-- end .panel-heading section -->
          <div class="panel-body p25">
            <div class="section row">
              <div class="col-lg-4">
                <strong>Description de la mission</strong>
              </div>
              <div class="col-lg-8">
                <p id="getMissionDescription"></p>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-4">
                <strong>Payement de la mission</strong>
              </div>
              <div class="col-lg-8"><p id="getMissionPaymentId"></p></div>
              <div class="clearfix"></div>
              <div class="col-lg-4"><strong>Statut actuel</strong></div>
              <div class="col-lg-8"><p id="getMissionStatus"></p></div>
              <div class="clearfix"></div>
              <div class="col-lg-4"><strong>Création le</strong></div>
              <div class="col-lg-8"><p id="getMissionCreatedAt"></p></div>
              <div class="clearfix"></div>
              <div class="col-lg-4"><strong>Mise à jour le</strong></div>
              <div class="col-lg-8"><p id="getMissionUpdatedAt"></p></div>
              <div class="col-lg-4"><strong>Deadline</strong></div>
              <div class="col-lg-8"><p id="getMissionDeadline"></p></div>
            </div>
            <!-- end section row section -->

          </div>
          <!-- end .form-footer section -->
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

    $('#datatable-2').dataTable({
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
      "iDisplayLength": 5,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
      
    });

    $('#datatable-3').dataTable({
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
      "iDisplayLength": 5,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
      
    });

    $('#datatable-4').dataTable({
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
      "iDisplayLength": 5,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
      
    });

      // Add Placeholder text to datatables filter bar
    $('.dataTables_filter input').attr("placeholder", "Rechercher...");
  

    // Affichage de la mission en ajax
    $('.showMission').on('click', function(e){
      // 1/ Requête AJAX
      e.preventDefault();
      var url = $(this).attr('href');

      $.getJSON(url, function( data){
          $('#getMissionId').html('#'+data['id']);
          $('#getMissionDescription').html(data['description']);
          $('#getMissionPaymentId').html("<a href='{{url('admin/payments/')}}#mission-"+data['payment_id']+"' target='_blank'>Afficher le payement</a>");
          $('#getMissionStatus').html(data['status']);
          $('#getMissionDeadline').html(dateConverter(data['deadline']));
          $('#getMissionCreatedAt').html(dateConverter(data['created_at']));
          $('#getMissionUpdatedAt').html(dateConverter(data['updated_at']));

      }); // end getJSON
      
      $.magnificPopup.open({
        removalDelay: 500, //delay removal by X to allow out-animation,
        items: {
          src: '#showMission'
        },
        // overflowY: 'hidden', // 
        callbacks: {
          beforeOpen: function(e) {
            var Animation = 'mfp-slideUp';
            this.st.mainClass = Animation;
          }
        },
        midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
      }); // EndPopup
    });


    $('.editMission').click(function(e){
      e.preventDefault();
      var idMission = $(this).data('mission-id');
      var url = "{{url('admin/missions/')}}/"+idMission;

      // Réinitialisation des status sur la popup
      for (var i = 0; i < 15; i++) { 
        $('#status-'+i).attr('selected', false);
      }

      $.getJSON(url, function(data){
        $('#showMissionEdit').html("#"+data['id']);
        $('#getDescription').val(data['description']) ;
        $('#status-'+data['statusId']).attr('selected', true);     
        $('#getDeadline').val(data['deadline'].substr(0,10));
        $('#getMissionIdForEdit').val(data['id']);
      });

       $.magnificPopup.open({
        removalDelay: 500, //delay removal by X to allow out-animation,
        items: {
          src: '#editMission'
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

    
      




@stop