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
@foreach($vpss as $vps)

<div class="col-md-4 col-xs-12 ">
  <div class="x_panel ui-ribbon-container fixed_height_390">      
      <div class="x_title">
        <h2>{{$vps->hasVps->str_vps_name??''}}</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

      <h3 class="name_title" id="vps-name-{{$vps->hasProduct->int_product_id}}">
      <i class='product_title_load fa fa-circle-o-notch fa-spin hide'></i>
      <p class="">{{$vps->hasProduct->os}}</p>
      </h3>
      
      <div class="divider"></div>
        <p>{{$vps->hasVps->str_vps_name??''}}</p>
        <p>{{$vps->hasVps->str_ip_address??''}}</p>
      <div class="divider"></div>

      <div class="btn-group">
        <button type="button" class="btn btn-danger">OS</button>
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#" onclick="changeOs($(this),'{{$vps->hasProduct->int_product_id}}','Ubuntu 17')">Ubuntu 17</a>
          </li>
          <li><a href="#" onclick="changeOs($(this),'{{$vps->hasProduct->int_product_id}}','Debian')" >Debian</a>
          </li>
        </ul>
      </div>

      <div class="btn-group">
        <button id="vps-btn-reinicia-{{$vps->hasVps->int_vps_id??null}}" type="button" class="btn btn-danger js_reinicia_vps" onclick="reiniciarVps($(this), '{{$vps->hasVps->int_vps_id??null}}')">
        <span class="btntext">Reiniciar</span>        
        <i class='fa fa-circle-o-notch fa-spin hide'></i>
        </button>
      </div>

      <div class="btn-group">
        <button id="vps-btn-snapshot-{{$vps->hasVps->int_vps_id??null}}" type="button" class="btn btn-danger js_reinicia_vps" onclick="snapShot($(this), '{{$vps->hasVps->int_vps_id??null}}')">
        <span class="btntext">SnapShot</span>        
        <i class='fa fa-circle-o-notch fa-spin hide'></i>
        </button>
      </div>
      <div class="divider"></div>
      @forelse($vps->hasProduct->addons as $addon)
        <p>{{$addon->size}}
        {{$addon->type}}
        {{$addon->unit}}
        {{$addon->months}}</p>
      @empty
      @endforelse
  </div>
</div>
</div>
@endforeach
</div>
@section('script')
<script type="text/javascript">

     urlBase = "{{url('')}}"
    
     function reiniciarVps( element, int_vps_id ) {

      element.find('.btntext').addClass('hide');
      element.find('i').removeClass('hide');
      $.post( urlBase+'/api/v1/vps/reinicia/'+int_vps_id);

     }

     function snapShot( element, int_vps_id ) {

      element.find('.btntext').addClass('hide');
      element.find('i').removeClass('hide');
      $.post( urlBase+'/api/v1/vps/snapshot/'+int_vps_id);

     }

    function changeOs( element, int_venda_id, os ) {
      h3elementi = element.parents( 'div.x_panel' ).first( 'h3' );
      h3elementi.find( '.product_title_load' ).removeClass( 'hide' );

      $.post( urlBase+'/api/v1/vps/change-os/'+int_venda_id+'/'+os);
    }

    var channel = pusher.subscribe( 'vps_ligada' ).bind("App\\Events\\VpsLigada", function( data ) {
      var element = $( '#vps-btn-reinicia-'+data.int_vps_id );        
      element.find('span').removeClass('hide');
      element.find('i').addClass('hide');
    });
    
    var channel = pusher.subscribe( 'muda_nome_vps' ).bind("App\\Events\\MudouOsVps", function( data ) {
        var element = $( '#vps-name-'+data.int_product_id );
        element.find( 'i' ).addClass( 'hide' );
        element.find( 'p' ).text((data.os));
    });

    var channel = pusher.subscribe( 'snapshot_criado' ).bind("App\\Events\\SnapshotCriado", function( data ) {
      var element = $( '#vps-btn-snapshot-'+data.int_vps_id );
      element.find('span').removeClass('hide');
      element.find('i').addClass('hide');
    });

</script>
@endsection
@endsection 
