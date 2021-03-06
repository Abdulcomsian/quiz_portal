@extends('layout.mainlayout')
@section('content')   
  <style type="text/css">
    #contentDiv{
        height: 70vh
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
<section id="contentDiv" class="selectionScreenContent assessmentContent">
  <div class="overlay"></div>
    <div class="container-fluid">
        <div class="topTimerDiv">
            <div class="row">
                <div class="col-6">
                    <p class="questionText">
                        <span>Question</span>
                        <span class="changeText">1</span>
                        <span>of</span>
                        <span class="totalQuestion">{{count($quizzes)}}</span>
                    </p>
                </div>
                <div class="col-md-6 text-right">
                    <div class="timerDiv">
                        <span class="countdown">{{$min}}:{{$sec}}</span>
                        <input type="hidden" name="min" class="min" value="{{$min}}">
                        <input type="hidden" name="sec" sec="{{$sec}}" value="{{$sec}}">
                        
                        <p>TIME LEFT</p>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-12 text-right backBtnDiv">
           <a href="./index.html" class="backBtn">Back</a>
        </div>
        <div class="formDiv">
            <form name="basicform" id="basicform" method="post" action="{{ route('test.store') }}">
                @csrf
                <div id="sf1" class="frm">
                    <fieldset>
                        <span class="text-danger error" style="margin-left:17px"></span>
                        @foreach($quizzes as $key=>$quiz)
                         <input type="hidden" name="question[]" value="{{$quiz->id}}">
                         <input type="hidden" name="questions[]" value="{{$quiz->question}}">
                        <div class="form-group @if(!$loop->first) d-none @endif quiz{{$quiz->id}}">
                          <label class="col-lg-12 control-label commonLabel" for="uname"><b>({{$loop->index+1}})</b>  {{ $quiz->question }}</label>
                          <div class="col-lg-12">
                            <div class="commonDiv">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="option_{{$quiz->id}}" id="option_{{$quiz->id}}" value="{{$quiz->option_1}}">
                                        <label class="form-check-label" for="{{$quiz->option_1}}">
                                           {{$quiz->option_1}} 
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="option_{{$quiz->id}}" id="option_{{$quiz->id}}" value="{{$quiz->option_2 }}">
                                        <label class="form-check-label" for="option_2">
                                            {{$quiz->option_2}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="option_{{$quiz->id}}" id="option_{{$quiz->id}}" value="{{ $quiz->option_3 }}">
                                        <label class="form-check-label" for="option_3">
                                            {{$quiz->option_3}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="option_{{$quiz->id}}" id="option_{{$quiz->id}}" value="{{ $quiz->option_4 }}">
                                        <label class="form-check-label" for="option_4">
                                            {{$quiz->option_4}}
                                        </label>
                                    </div>

                                </div>
                                <!-- <input type="radio" id="option_{{$key + 1}}" name="option_{{$key + 1}}"value="{{$quiz->option_1}}">
                                <label for="{{$quiz->option_1}}">{{$quiz->option_1}}</label> -->
                                <!-- <span class="quizImg">
                                  <img src="../../assets/img/960x0.jpeg" alt="" class="img-fluid">
                                </span> -->
                            </div>
                          </div>
                              <div class="form-group">
                              <div class="col-lg-12 text-center">
                                <!-- open1 is given in the class that is binded with the click event -->
                                <button class="btn clearBtn" data-order="{{$quiz->id}}" type="button">Clear</button> 
                                <button class="btn finishBtn" type="submit">Finish</button> 
                                @if(!$loop->last)
                                <button class="btn open1 next" data-order="{{$quiz->id}}" type="button">Next</button> 
                                @endif
                              </div>
                            </div>
                        </div>
                        @endforeach
                    </fieldset>
                </div>

            </form>
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
      var min = $(".min").val();
      var sec = $(".sec").val();
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
