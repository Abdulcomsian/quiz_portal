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
           
        </div>
        <div class="col-12 text-right backBtnDiv">
           <a href="./index.html" class="backBtn">Back</a>
        </div>
        <div class="formDiv">
            <form name="basicform" id="basicform" method="post" action="{{ route('user.store_number') }}">
                @csrf
                <div id="sf1" class="frm">
                    <fieldset>
                        <span class="text-danger error" style="margin-left:17px"></span>
                        <div class="form-group">
                          <label class="col-lg-12" for="uname"><strong>Select Number of question</strong></label>
                          <div class="col-lg-12">
                            <select name="number" id="number" class="form-control">
                                <option disabled selected>Select Number</option>
                                @if($chk < 1)
                                    <option value="{{ count($quizzes) }}" >{{ count($quizzes) }}</option>
                                @elseif($chk < 2)
                                    <option value="20" >20</option>
                                    <option value="{{ count($quizzes) }}" >{{ count($quizzes) }}</option>
                                @elseif($chk < 3)
                                    <option value="40" >40</option>
                                    <option value="{{ count($quizzes) }}" >{{ count($quizzes) }}</option>
                                @elseif($chk < 4)
                                    <option value="20" >20</option>
                                    <option value="40" >40</option>
                                    <option value="60" >60</option>
                                    <option value="{{ count($quizzes) }}" >{{ count($quizzes) }}</option>
                                @elseif($chk < 5)
                                    <option value="20" >20</option>
                                    <option value="40" >40</option>
                                    <option value="60" >60</option>
                                    <option value="80" >80</option>
                                    <option value="{{ count($quizzes) }}" >{{ count($quizzes) }}</option>
                                @elseif($chk < 2)
                                    <option value="20" >20</option>
                                    <option value="40" >40</option>
                                    <option value="60" >60</option>
                                    <option value="80" >80</option>
                                    <option value="100" >100</option>
                                    <option value="{{ count($quizzes) }}" >{{ count($quizzes) }}</option>

                                @endif
                                <option value="all" >All</option>
                            </select>
                            <div style="color:red;">{{$errors->first('number')}}</div> <br>
                          </div>
                        </div>
                        
                    </fieldset>
                    <div class="form-group" style="text-align:center;">
                        <button class="btn btn-success text-center" style="position: relative;" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection
@section('script')

@endsection
