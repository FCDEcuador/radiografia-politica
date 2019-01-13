@extends('layouts.app')

@section('content')
<div class="img-responsive" style="margin-top: -22px;">
  @if($site!=null)
    <img src="{{asset($site->banner)}}" width="100%"/>
  @endif
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 right title-elecciones">
    <!--  <h2>ELECCIONES 2017</h2>-->
    </div>
  </div><br/>
  <div class="row">

    <nav class="navbar navbar-inverse navbar-static-top ">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse-main-menu">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse-main-menu">
                    <!-- Left Side Of Navbar -->
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav ">
                      @foreach($categorias as $cat)
                        @if($objCategoria->slug == $cat->slug)
                          <li class="nav-item active">
                            <a class="nav-link" href="{{$cat->slug}}">{{$cat->nombre}} <span class="sr-only">(current)</span></a>
                          </li>
                        @else
                          <li class="nav-item">
                            <a class="nav-link" href="{{$cat->slug}}">{{$cat->nombre}}</a>
                          </li>
                        @endif  
                      @endforeach
                    </ul>
                </div>
            </div>
        </nav>


    <!-- Tab panes -->
    <div class="tab-content">
      
      <div role="tabpanel" class="tab-pane active"  >
      @if(count($objProfile))
        <div class="row list-casamblea">
          <?php $i=1; ?>
        @foreach($objProfile as $profile)
        
            <div class="col-md-3" >
              <div class="binomial">
                <div class="president">
                  <img src="{{rtrim(asset('/'), '/')}}{{$profile->picture }}" alt="{{$profile->name }}" class="img-circle" width="150px">
                  <a href="{{URL::to('/perfil')}}/{{$profile->id }}/n/{{$profile->friendly_url }}"><span>VER PERFIL</span></a>
                </div>
              </div>
              <label class="align-c president-label">{{$profile->name }} {{$profile->lastname }}</label>
              <label class="align-c president-label">{{ strip_tags($profile->description)}}</label>
              <div style="margin-bottom:40px; "></div>
            </div>


            <?php 
            if($i % 4 == 0)

              echo '</div> <div class="row list-casamblea">';

            $i++; 

            ?>
          @endforeach
          </div>  
      @endif
      </div>
      

    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
}

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
})
</script>
@endsection
