@extends('layout.mainlayout')
@section('content')   
  <style type="text/css">
    #contentDiv{
        height: 100%
    }
  </style>
  <section id="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <img src="{{asset('assets/img/leftLogo.png')}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-8">
                <div class="bannerDiv">
                    <h2>HIZBULLAH THREAT CELL</h2>
                    <p>وَ اَعِدُّوْا لَهُمْ مَّا اسْتَطَعْتُمْ مِّنْ قُوَّةٍ وَّ مِنْ رِّبَاطِ الْخَیْلِ تُرْهِبُوْنَ بِهٖ عَدُوَّ اللّٰهِ وَ عَدُوَّكُمْ وَ اٰخَرِیْنَ مِنْ دُوْنِهِمْۚ</p>
                    <p class="terjuma">اور ان کے لیے جتنی طاقت ہو تیار رکھو اور گھوڑوں کے بندھن جن سے تم خدا کے دشمن اور دشمنوں کو دہشت زدہ کرو۔</p>
                </div>
            </div>
            <div class="col-md-2">
                <img src="../../assets/img/rightLogo.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
  </section>
  <section id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span>
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('user/over_view')}}">Overview <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('user/wc')}}">WC <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{url('user/remain-commands')}}">Remaining Comds</a>
                                </li>
                               
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
<!-- <section id="contentDiv" class="selectionScreenContent assessmentContent">
  <div class="overlay"></div>
    <div class="container-fluid">
        
        
        <div class="formDiv" style="text-align:center;">
           <img src="{{asset('assets/img/indian_map.gif')}}" />
        </div>
    </div>
</section> -->
<section id="contentDiv" class="selectionScreenContent">
    <div class="overlay"></div>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-4">
                <form name="basicform" id="basicform" method="post" action="{{ route('user.store_number') }}">
                @csrf
                    <input type="hidden" name="quiz_type" value="interactive quiz">
                    <input type="hidden" name="number" value="all">
                    <input type="hidden" name="category" value="Remaining Commands">
                    <div class="commonSelectionDiv" style="max-width:100%">
                        <img src="../assets/images/learningPortal.png" alt="" class="img-fluid learningImg">
                        <button type="submit" style="background: none; border:none; "><h5>Remaining Commands</h5></button>
                    </div>
                </form>
            </div>
           
           
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">

    $(".next").on('click',function(){
        var quizid=$(this).attr('data-order');
        if(  $("input[name='option_"+quizid+"']").is(":checked"))
        {
             $('.quiz'+quizid).addClass('d-none');
             var nextquizid=parseInt(quizid)+(1);
             $(".changeText").text(nextquizid);
             $('.quiz'+nextquizid).removeClass('d-none');
             $(".error").html("");
        }
        else{
             $(".error").html("Please Select Answer");   
             return false;
        }
    })

    $(".clearBtn").click(function(){
         var quizid=$(this).attr('data-order');
         $("input[name='option_"+quizid+"']").prop('checked', false);
         //$('#option_'+quizid).prop('checked', false);
    })

      var timer2 = "09:55";
      var interval = setInterval(function() {
          var timer = timer2.split(':');
          var minutes = parseInt(timer[0], 10);
          var seconds = parseInt(timer[1], 10);
          --seconds;
          minutes = (seconds < 0) ? --minutes : minutes;
          if (minutes < 0){
            $("#basicform").submit();
            return false;
          }
          seconds = (seconds < 0) ? 59 : seconds;
          seconds = (seconds < 10) ? '0' + seconds : seconds;
          $('.countdown').html(minutes + ':' + seconds);
          timer2 = minutes + ':' + seconds;
        }, 1000);
</script>
@endsection
