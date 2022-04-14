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
                    <img src="../../assets/images/icons/leftLogo.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="bannerDiv">
                        <h2>HIZBULLAH THREAT CELL</h2>
                        <p>وَ اَعِدُّوْا لَهُمْ مَّا اسْتَطَعْتُمْ مِّنْ قُوَّةٍ وَّ مِنْ رِّبَاطِ الْخَیْلِ تُرْهِبُوْنَ بِهٖ عَدُوَّ اللّٰهِ وَ عَدُوَّكُمْ وَ اٰخَرِیْنَ مِنْ دُوْنِهِمْۚ</p>
                        <p class="terjuma">اور ان کے لیے جتنی طاقت ہو تیار رکھو اور گھوڑوں کے بندھن جن سے تم خدا کے دشمن اور دشمنوں کو دہشت زدہ کرو۔</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <img src="../../assets/images/icons/rightLogo.png" alt="" class="img-fluid">
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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('user/over_view')}}">Overview <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('user/wc')}}">WC</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('user/remain-commands')}}">Remaining Comds</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{url('user/lesson')}}">LESSON</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Indian Army Section -->
    <section id="breadCrum">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="">
                        <span>Home / </span>
                        <span>Course / </span>
                        <span>{{$course->name}}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="contentDiv" class="resourceContent">
        <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row">
                @if(isset($lessons))
                @foreach($lessons as $lesson)
                <div class="col-md-6">
                    <h2 class="home-title ">{{$lesson->category_id }}</h2>
                    <div class="pdfLink">
                        <ul>
                            <li>
                                <!-- <a href="">www.india.gov.in</a> -->
                                {{$lesson->document}}
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                @endif
                
            </div>
        </div>
    </section>

    <!-- Indian Army Section Ended-->
</body>
@endsection
@section('script')

<script>
    $('.contentSlider').slick();
    $('.mainBanner').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: false,
        speed: 300,
    });
</script>
@endsection