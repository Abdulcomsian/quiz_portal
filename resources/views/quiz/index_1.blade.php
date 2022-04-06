<html>
<title>Home</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Fredoka:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <section id="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <img src="../../assets/img/leftLogo.png" alt="" class="img-fluid">
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
                        <span>09 : 55</span>
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
                        <div class="form-group @if(!$loop->first) d-none @endif quiz{{$quiz->id}}">
                          <label class="col-lg-12 control-label commonLabel" for="uname">{{ $quiz->question }}</label>
                          <div class="col-lg-12">
                            <div class="commonDiv">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="option_{{$key+1}}" id="option_{{$quiz->id}}" value="{{$quiz->option_1}}" required>
                                        <label class="form-check-label" for="{{$quiz->option_1}}">
                                           {{$quiz->option_1}} 
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="option_{{$key+1}}" id="option_{{$quiz->id}}" value="{{$quiz->option_2 }}">
                                        <label class="form-check-label" for="option_2">
                                            {{$quiz->option_2}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="option_{{$key+1}}" id="option_{{$quiz->id}}" value="{{ $quiz->option_3 }}">
                                        <label class="form-check-label" for="option_3">
                                            {{$quiz->option_3}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="option_{{$key+1}}" id="option_{{$quiz->id}}" value="{{ $quiz->option_4 }}">
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
        <!-- <div class="quizFinish">
            <div class="col-12 text-center">
                <img src="../../assets/img/tickIcon.png" alt="" class="img-fluid">
                <h2>Your Quiz has Finished !</h2>
                <p>Your total Score is 50 out of 100.</p>
            </div>
        </div> -->
    </div>
</section>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript">

    $(".next").on('click',function(){
        var quizid=$(this).attr('data-order');
        if($('#option_'+quizid).prop("checked"))
        {
             $('.quiz'+quizid).addClass('d-none');
             var nextquizid=parseInt(quizid)+(1);
             $(".changeText").text(nextquizid);
             $('.quiz'+nextquizid).removeClass('d-none');
             $(".error").html("");
        }
        else{
             $(".error").html("Please Select Answer");   
        }
    })

    $(".clearBtn").click(function(){
         var quizid=$(this).attr('data-order');
         $('#option_'+quizid).prop('checked', false);
    })
    
    // $(".finishBtn").click(function(){
    //     $(".formDiv").css("display", "none");
    //     $(".quizFinish").css("display", "flex");
    //     $(".topTimerDiv").css("display", "none");
    //     $(".backBtnDiv").css("display", "block");
    // })
    </script>
</html>