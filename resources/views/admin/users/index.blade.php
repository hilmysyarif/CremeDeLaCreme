@extends('admin')

@section('topbar')
        <ol class="breadcrumb">
          <li class="crumb-active">
            <a href="{{ url('admin/dashboard')}}"><span class="glyphicon glyphicon-home"></span></a>
          </li>
          <li class="crumb-trail"><a href="{{ url('admin/users')}}">Utilisateurs</a></li>
          <li class="crumb-trail">Liste des utilisateurs</li>
        </ol>
@stop

@section('content')
        <div class="tray tray-center">
			<div class="row">
            <div class="col-md-12">
              <div class="panel panel-visible" id="spy1">
                <div class="panel-heading">
                  <a class="pull-right mt5 btn btn-success" href="#">Ajouter un utilisateur</a>
                  <div class="panel-title">
                    <span class="glyphicon glyphicon-tasks"></span>Rechercher un utilisateur
                  </div>
                </div>
                <div class="panel-body pn">
                  <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nom complet</th>
                        <th>Adresse email</th>
                        <th>Grade</th>
                        <th>Dernière connexion</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users AS $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><?php
                        	switch ($user->rank) {
                        		case 1:
                        			echo 'Administrateur';
                        			break;
                        		
                        		default:
                        			echo 'Opérateur';
                        			break;
                        	}
                        ?></td>
                        <td>{{ date('d/m/Y', strtotime($user->updated_at))}}</td>
                        <td>
                        	<a href="{{ url('admin/users/'.$user->id.'')}}" data-toggle="tooltip" data-placement="bottom" data-original-title="Afficher le profil"><i class="fa fa-search"></i></a>
							<span class="mr15"></span>
                        	<a href="{{ url('admin/users/'.$user->id.'/edit')}}" data-toggle="tooltip" data-placement="bottom" data-original-title="Editer"><i class="fa fa-pencil"></i></a>
							<span class="mr15"></span>
                        	<a href="{{ url('admin/users/'.$user->id.'/delete')}}" class="delete-btn" data-toggle="tooltip" data-placement="bottom" data-original-title="Supprimer"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

		</div>
@stop



@section('css')
	{!! HTML::style('vendor/plugins/datatables/media/css/dataTables.bootstrap.css') !!}
	{!! HTML::style('vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css') !!}
	{!! HTML::style('vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') !!}
@stop

@section('js')

	{!! HTML::script('vendor/plugins/datatables/media/js/jquery.dataTables.js') !!}
	{!! HTML::script('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') !!}
	{!! HTML::script('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
	{!! HTML::script('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') !!}
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


@stop