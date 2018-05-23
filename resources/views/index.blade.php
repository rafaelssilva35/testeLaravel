@extends('template')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="x_panel">
<div class="x_title">
  <h2>VPS <small></small></h2>
  <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Settings 1</a>
        </li>
        <li><a href="#">Settings 2</a>
        </li>
      </ul>
    </li>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
  </ul>
  <div class="clearfix"></div>
</div>
<div class="x_content bs-example-popovers">

  <div class="x_content">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nome VPS</th>
          <th>IP</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($vpss as $vps)
        <tr>
          <td>{{$vps->hasVps->str_vps_name??''}}</td>
          <td>{{$vps->hasVps->str_ip_address??''}}</td>
          <td><a href="{{url('vps/'.$vps->int_venda_id)}}">Visualizar</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>

</div>
</div>
@endsection