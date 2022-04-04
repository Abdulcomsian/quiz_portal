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
                        <span class="totalQuestion">20</span>
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
            <form name="basicform" id="basicform" method="post" action="yourpage.html">
                <div id="sf1" class="frm">
                    <fieldset>
                        @foreach($quizzes as $key=>$quiz)
                        <div class="form-group">
                          <label class="col-lg-12 control-label commonLabel" for="uname">{{ $quiz->question }}</label>
                          <div class="col-lg-12">
                            <div class="commonDiv">
                                <input type="radio" id="option_{{$key + 1}}" name="option_{{$key + 1}}" value="{{$quiz->option_1}}">
                                <label for="{{$quiz->option_1}}">{{$quiz->option_1}}</label>
                                <span class="quizImg">
                                  <img src="../../assets/img/960x0.jpeg" alt="" class="img-fluid">
                                </span>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        <div class="form-group">
                          <div class="col-lg-12 text-center">
                            <!-- open1 is given in the class that is binded with the click event -->
                            <button class="btn clearBtn" type="button">Clear</button> 
                            <button class="btn finishBtn" type="button">Finish</button> 
                            <button class="btn open1" type="button">Next</button> 
                          </div>
                        </div>

                    </fieldset>
                </div>
                <div id="sf2" class="frm">
                    <fieldset>
                        <div class="form-group">
                          <label class="col-lg-12 control-label" for="uemail">Which Indian Army Command is deployed in Indian Occupied Jammu and Kashmir ? </label>
                            <div class="col-lg-12">
                              <div class="commonDiv">
                                  <input type="radio" id="western_command" name="fav_language" value="western_command">
                                  <label for="western_command">Western Command</label>
                                  <span class="quizImg">
                                    <img src="../../assets/img/960x0.jpeg" alt="" class="img-fluid">
                                  </span>
                              </div>
                              <div class="commonDiv">
                                  <input type="radio" id="Northern_command" name="fav_language" value="Northern_command">
                                  <label for="Northern_command">Northern Command</label>
                                  <span class="quizImg">
                                    <img src="../../assets/img/960x0.jpeg" alt="" class="img-fluid">
                                  </span>
                              </div>
                              <div class="commonDiv">
                                  <input type="radio" id="central_command" name="fav_language" value="central_command">
                                  <label for="central_command">Central Command</label>
                                  <span class="quizImg">
                                    <img src="../../assets/img/960x0.jpeg" alt="" class="img-fluid">
                                  </span>
                              </div>
                              <div class="commonDiv">
                                  <input type="radio" id="southern_command" name="fav_language" value="southern_command">
                                  <label for="southern_command">Southern Command</label>
                                  <span class="quizImg">
                                    <img src="../../assets/img/960x0.jpeg" alt="" class="img-fluid">
                                  </span>
                              </div>
                            </div>
                          </div>
                        <div class="form-group">
                          <div class="col-lg-12 text-center">
                            <button class="btn clearBtn" type="button">Clear</button> 
                            <button class="btn finishBtn" type="button">Finish</button>
                          </div>
                        </div>
                    </fieldset>
                </div>
                <!-- <div id="sf3" class="frm">
                    <fieldset>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="upass1">Password: </label>
                          <div class="col-lg-6">
                            <input type="password" placeholder="Your Password" id="upass1" name="upass1" class="form-control" autocomplete="off">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="upass1">Confirm Password: </label>
                          <div class="col-lg-6">
                            <input type="password" placeholder="Confirm Password" id="upass2" name="upass2" class="form-control" autocomplete="off">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                           
                            <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                        
                            <button class="btn btn-primary open3" type="button">Submit </button> 
                            <img src="spinner.gif" alt="" id="loader" style="display: none">
                          </div>
                        </div>
                    </fieldset>
                </div> -->
            </form>
        </div>
        <div class="quizFinish">
            <div class="col-12 text-center">
                <img src="../../assets/img/tickIcon.png" alt="" class="img-fluid">
                <h2>Your Quiz has Finished !</h2>
                <p>Your total Score is 50 out of 100.</p>
            </div>
        </div>
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
    jQuery().ready(function() {
      // Binding next button on first step
      $(".open1").click(function() {
            $(".frm").hide("fast");
            $("#sf2").show("slow");
            $(".questionText .changeText").html("2")
       });
       // Binding next button on second step
       $(".open2").click(function() {
          if (v.form()) {
            $(".frm").hide("fast");
            $("#sf3").show("slow");
          }
        });
         // Binding back button on second step
        $(".back2").click(function() {
          $(".frm").hide("fast");
          $("#sf1").show("slow");
        });
         // Binding back button on third step
         $(".back3").click(function() {
          $(".frm").hide("fast");
          $("#sf2").show("slow");
        });
        $(".open3").click(function() {
          if (v.form()) {
            // optional
            // used delay form submission for a seccond and show a loader image
            $("#loader").show();
             setTimeout(function(){
               $("#basicform").html('<h2>Thanks for your time.</h2>');
             }, 1000);
            // Remove this if you are not using ajax method for submitting values
            return false;
          }
        });
    });
    $(".clearBtn").click(function(){
        $('input').prop('checked', false);
    })
    $(".finishBtn").click(function(){
        $(".formDiv").css("display", "none");
        $(".quizFinish").css("display", "flex");
        $(".topTimerDiv").css("display", "none");
        $(".backBtnDiv").css("display", "block");
    })
    </script>
</html>