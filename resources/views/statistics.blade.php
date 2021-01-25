<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('css/jquery.lineProgressbar.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link type="text/css" href="//cdn.rawgit.com/Modareb/files/master/fonts/neo.css" rel="stylesheet"/>
</head>
<body>

<div class="container">
    <div class="row">

        <!---------------------------------------------------------------- Header -------------------------------------------------------->
        <div class="col-md-12  my-md-5 text-center header">
            <div class="logo-container">
                <img src="images/main-Logo.png" class="w-100" alt="">
            </div>
        </div>
        <div class="col-12 text-center my-md-3 ">
            <h4 class="font-weight-bold">تقرير عن المهارات الخاصة بالمستخدمين فى إطار محاور وأهداف التمكين المالي لبرنامج مالي</h4>
        </div>

        <!---------------------------------------------------------------- charts -------------------------------------------------------->
        <div class="col-12 subHeader text-center my-md-5">
            <div class="title">
                <h4>ترتيب الأولويات ( الحاجيات والرغبات )</h4>
            </div>
        </div>

        <div class="col-12 mt-md-3">
            <div class="row">
                <div class="col-md-4 mb-4" style="position: relative;">
                    <div class="progress1 circle-progress-value text-center" style="width: auto; height: auto; background-color: inherit;">
                        <h3></h3>
                    </div>
                    <div class="wrapper mt-5">
                        <div class="text-content  px-3 d-flex justify-content-center ">
                            <div class="right mx-4 d-flex justify-content-center align-items-center">
                                <div class="win"></div>
                                <div class="muted small mx-2">{{$statistics->state1}}</div>
                                <div class="muted small">قادر</div>
                            </div>
                            <div class="left d-flex justify-content-center align-items-center">
                                <div class="lose mx-2"></div>
                                <div class="muted small mx-2">{{($total - $statistics->state1) }}</div>
                                <div class="muted small">غير قادر</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <div class="muted small">على ترتيب الأولويات بالشكل الصحيح</div>
                        </div>
                        <div class="text-center mt-4 ">
                            <div class="height">
                                <div class="h5 main-color bold">ترتيب الأولويات وتقديم </div>
                                <div class="h5 main-color bold">الحاجيات على الرغبات</div>
                            </div>
                            <div class="my-3 px-2 p">مؤشر على اعطاء الأولوية لشراء الحاجيات اللأساسية , ويعكس القدرة على التفريق بين الحاجيات والرغبات وإدراك مبدأ الندرة</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" style="position: relative;">
                    <div class="progress2 circle-progress-value text-center" style="width: auto; height: auto; background-color: inherit;">
                        <h3></h3>
                    </div>
                    <div class="wrapper mt-5">
                        <div class="text-content px-3 d-flex justify-content-center ">
                            <div class="right d-flex justify-content-center align-items-center">
                                <div class="win"></div>
                                <div class="muted small mx-2">{{$statistics->state2}}</div>
                                <div class="muted small">قادر</div>
                            </div>
                            <div class="left mr-4 d-flex justify-content-center align-items-center">
                                <div class="lose mx-2"></div>
                                <div class="muted small mx-2">{{($total - $statistics->state2)}}</div>
                                <div class="muted small">غير قادر</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <div class="muted small">القيام بالشراء وفق الترتيب الصحيح وتأجيل إشباع الرغبات</div>
                        </div>
                        <div class="text-center mt-4 ">
                            <div class="height">
                                <div class="h5 main-color bold">ترتيب قرارات الشراء</div>
                                <div class="h5 main-color bold"></div>
                            </div>
                            <div class="my-3 px-2 p">المؤشر يوضح مدى القدرة على ضبط النفس وتأجيل إشباع الرغبات, والقيام بشراء الحاجيات الأساسية اولاَ</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" style="position: relative;">
                    <div class="progress3 circle-progress-value text-center" style="width: auto; height: auto; background-color: inherit;">
                        <h3></h3>
                    </div>
                    <div class="wrapper mt-5">
                        <div class="text-content  px-3 d-flex justify-content-center ">
                            <div class="right d-flex justify-content-center align-items-center">
                                <div class="win"></div>
                                <div class="muted small mx-2">{{$statistics->state3}}</div>
                                <div class="muted small"></div>
                            </div>
                            <div class="left mr-4 d-flex justify-content-center align-items-center">
                                <div class="lose mx-2"></div>
                                <div class="muted small mx-2">{{($total -$statistics->state3 )}}</div>
                                <div class="muted small"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <div class="muted small" style="height: 23px;"></div>
                        </div>
                        <div class="text-center mt-4 ">
                            <div class="height" style="margin-top: -5px !important;">
                                <div class="h5 main-color bold">متوسط نسبة الإنفاق على</div>
                                <div class="h5 main-color bold">الحاجيات مقارنة بالإنفاق على الرغبات</div>
                            </div>
                            <div class="my-3 px-2 p">زيادة النسبة تعكس الكفاءة والإنفاق الرشيد</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 subHeader text-center mt-md-1 mb-md-4">
            <div class="title">
                <h4>التخطيط للشراء وتبعات قرارات الشراء</h4>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="row">
                <div class="col-md-4 mb-4" style="position: relative;">
                    <div class="progress4 circle-progress-value text-center" style="width: auto; height: auto; background-color: inherit;">
                        <h3></h3>
                    </div>
                    <div class="wrapper mt-5">
                        <div class="text-content  px-3 d-flex justify-content-center ">
                            <div class="right d-flex justify-content-center align-items-center ">
                                <div class="win"></div>
                                <div class="muted small mx-2">{{$statistics->state4}}</div>
                                <div class="muted  small">قادر</div>
                            </div>
                            <div class="left mr-4 d-flex justify-content-center align-items-center ">
                                <div class="lose mx-2"></div>
                                <div class="muted mx-2">{{($total - $statistics->state4)}}</div>
                                <div class="muted small">غير قادر</div>
                            </div>
                        </div>
                        <div class="text-center my-3 ">
                            <div class="muted small text-center">من اللاعبين قاموا بتوزيع الدخل على مسارات صرف المال</div>
                            <div class="muted small text-center ">بفاعلية ( ادخار إنفاق - عطاء )</div>
                        </div>
                        <div class="text-center mt-4 ">
                            <div class="height" style="margin-top: -15px;">
                                <div class="h5 main-color bold">المحافظة على المال</div>
                                <div class="h5 main-color bold"></div>
                            </div>
                            <div class="my-3 px-2 p">مؤشر على القدرة على إدارة الأموال بكفاءة، والموازنة بين الادخار والعطاء والإنفاق الرشيد</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" style="position: relative;">
                    <div class="progress5 circle-progress-value text-center" style="width: auto; height: auto; background-color: inherit;">
                        <h3></h3>
                    </div>
                    <div class="wrapper mt-5">
                        <div class="text-content  px-3 d-flex justify-content-center ">
                            <div class="right d-flex justify-content-center align-items-center ">
                                <div class="win"></div>
                                <div class="muted small mx-2">{{$statistics->state5}}</div>
                                <div class="muted small">قادر</div>
                            </div>
                            <div class="left mr-4 d-flex justify-content-center align-items-center ">
                                <div class="lose mx-2"></div>
                                <div class="muted small mx-2">{{($total - $statistics->state5)}}</div>
                                <div class="muted small">غير قادر</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <div class="muted small">على الالتزام بخطة الشراء</div>
                        </div>
                        <div class="text-center mt-4 ">
                            <div class="height">
                                <div class="h5 main-color bold">الالتزام بخطة الشراء </div>
                                <div class="h5 main-color bold"></div>
                            </div>
                            <div class="my-3 px-2 p">يعكس القدرة على اتخاذ قرارات شراء صحيحة والالتزام بخطة الشراء لتحقيق الأهداف المالية </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" style="position: relative;">
                    <div class="progress6 circle-progress-value text-center" style="width: auto; height: auto; background-color: inherit;">
                        <h3></h3>
                    </div>
                    <div class="wrapper mt-5">
                        <div class="text-content  px-3 d-flex justify-content-center ">
                            <div class="right d-flex justify-content-center align-items-center">
                                <div class="win"></div>
                                <div class="muted small mx-2">{{$statistics->state6}}</div>
                                <div class="muted small">قادر</div>
                            </div>
                            <div class="left mr-4 d-flex justify-content-center align-items-center">
                                <div class="lose mx-2"></div>
                                <div class="muted small mx-2">{{$total - $statistics->state6}}</div>
                                <div class="muted small">غير قادر</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <div class="muted small">على زيادة مصادر الدخل وتخفيض المصروفات وتحقيق أرباح </div>
                        </div>
                        <div class="text-center mt-4 ">
                            <div class="height">
                                <div class="h5 main-color bold">الأرباح والتكاليف</div>
                                <div class="h5 main-color bold"></div>
                            </div>
                            <div class="my-3 px-2 p">يقيس هذا المؤشر قدرة اللاعب على شراء المنتجات التى تزيد من الدخل وكذلك المنتجات التي تقلل النفقات ومن ثم تحقيق الأهداف المالية</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 subHeader text-center my-md-5">
            <div class="title">
                <h4>الادخار</h4>
            </div>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12"></div>
                <div class="col-lg-4 col-md-4 col-sm-12 mb-4" style="position: relative;">
                    <div class="progress7 circle-progress-value text-center" style="width: auto; height: auto; background-color: inherit;">
                        <h3></h3>
                    </div>
                    <div class="wrapper mt-5">
                        <div class="text-content  px-3 d-flex justify-content-center ">
                            <div class="right  d-flex justify-content-center align-items-center">
                                <div class="win"></div>
                                <div class="muted small mx-2">{{$statistics->state7}}</div>
                                <div class="muted small">قادر</div>
                            </div>
                            <div class="left mr-4 d-flex justify-content-center align-items-center ">
                                <div class="lose mx-2"></div>
                                <div class="muted mx-2">{{($total - $statistics->state7)}}</div>
                                <div class="muted small">غير قادر</div>
                            </div>
                        </div>
                        <div class="text-center mt-4 ">
                            <div class="height" style="margin-top: -20px !important;">
                                <div class="h5 main-color bold">متوسط نسبة الادخار</div>
                                <div class="h5 main-color bold"></div>
                            </div>
                            <div class="my-3 px-2 p" style="margin-top: -20px !important;">متوسط نسبة الادخار من إجمالى الدخل ويعد مؤشرا على اكتساب مهارة الادخار ومواجهة النفقات الطارئة والتوجه المستقبلي</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"></div>
            </div>
        </div>

        <div class="col-12 subHeader text-center my-md-5">
            <div class="title">
                <h4>التبرع والأعمال الخيرية ( العطاء )</h4>
            </div>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4 mb-2" style="position: relative;">
                    <div class="progress8 circle-progress-value text-center" style="width: auto; height: auto; background-color: inherit;">
                        <h3></h3>
                    </div>
                    <div class="wrapper mt-5">
                        <div class="text-content px-3 d-flex justify-content-center ">
                            <div class="right d-flex justify-content-center align-items-center">
                                <div class="win"></div>
                                <div class="muted small mx-2">{{$statistics->state8}}</div>
                                <div class="muted small"></div>
                            </div>
                            <div class="left mr-4 d-flex justify-content-center align-items-center">
                                <div class="lose mx-2"></div>
                                <div class="muted small mx-2">{{$total - $statistics->state8}}</div>
                                <div class="muted small"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <div class="muted small"></div>
                        </div>
                        <div class="text-center mt-4 ">
                            <div class="height">
                                <div class="h5 main-color bold">متوسط نسبة التبرع</div>
                                <div class="h5 main-color bold">مقارنة بالرصيد</div>
                            </div>
                            <div class="my-3 px-2 p">متوسط ما يتبرع به اللاعب في ضوء رصيده المتاح وقت التبرع</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4" style="position: relative;">
                </div>
                <div class="col-md-4 mb-4" style="position: relative;">
                    <div class="progress9 circle-progress-value text-center" style="width: auto; height: auto; background-color: inherit;">
                        <h3></h3>
                    </div>
                    <div class="wrapper mt-5">
                        <div class="text-content  px-3 d-flex justify-content-center ">
                            <div class="right d-flex justify-content-center align-items-center ">
                                <div class="win"></div>
                                <div class="muted small mx-2">{{$statistics->state9}}</div>
                                <div class="muted small" style="font-size: 9px !important; width: 90px; margin-top: 22px !important;">تمكنوا من العطاء مع الاتزام بالإدخار والإنفاق الرشيد</div>
                            </div>
                            <div class="left d-flex justify-content-center align-items-center">
                                <div class="lose mx-2"></div>
                                <div class="muted small mx-2">{{$total - $statistics->state9}}</div>
                                <div class="muted small" style="font-size: 9px !important;  width: 90px; margin-top: 22px !important;">قامو بالعطاء مع بعض القصور فى مسارات الصرف الاخرى</div>
                            </div>
                        </div>

                        <div class="text-center mt-4" style="margin-top: 35px !important; ">
                            <div class="height">
                                <div class="h5 main-color bold">العطاء مع الموازنة بين مسارات</div>
                                <div class="h5 main-color bold">الصرف الأخري</div>
                            </div>
                            <div class="my-3 px-2 p">مؤشر على اكتساب مهارة العطاء والقدرة على تخصيص جزء من الموارد للتبرع مع الإلتزام بالادخار وكذلك الإنفاق وفق الأولويات الصحيحة</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

        <div class="col-12 subHeader text-center my-md-5">
            <div class="title">
                <h4>معرفة مصادر الدخل</h4>
            </div>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12"></div>
                <div class="col-lg-4 col-md-4 col-sm-12 mb-4" style="position: relative;">
                    <div class="progress10 circle-progress-value text-center" style="width: auto; height: auto; background-color: inherit;">
                        <h3></h3>
                    </div>
                    <div class="wrapper mt-5">
                        <div class="d-flex justify-content-center my-3">
                            <div class="muted small">من اللاعبين استطاعوا القيام بالإستثمار الأمثل ( الأعلى ربحاَ )</div>
                        </div>
                        <div class="text-content  px-3 d-flex justify-content-center ">
                            <div class="right  d-flex justify-content-center align-items-center">
                                <div class="win"></div>
                                <div class="muted small mx-2">{{$statistics->state10}}</div>
                                <div class="muted small" style="font-size: 9px !important; width: 90px;">بتأسيس مشروع تجاري</div>
                            </div>
                            <div class="left  d-flex justify-content-center align-items-center ">
                                <div class="lose mx-2"></div>
                                <div class="muted small mx-2">{{$total - $statistics->state10}}</div>
                                <div class="muted small" style="font-size: 9px !important; width: 90px;">قامو بالاستثمار الامثل</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <div class="muted small"></div>
                        </div>
                        <div class="text-center mt-4 ">
                            <div class="height">
                                <div class="h5 main-color bold">الاستثمار والمشروعات</div>
                                <div class="h5 main-color bold"></div>
                            </div>
                            <div class="mb-3 px-2 p">يوضح اختيار الاستثمار الأعلى ربحاَ ويدل على إدراك الاستثمار كمصدر من مصادر الدخل ويعكس التوجه المستقبلي</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"></div>
            </div>
        </div>

    </div>
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
<script src="{{ asset('js/jquery.lineProgressbar.js') }}"></script>
<script src="{{ asset('js/circle-progress.js') }}"></script>
<script src="{{ asset('js/jquery.circle-progress.js') }}"></script>
<script>
    jQuery(function($) {

        $var1 = {{($statistics->state1/$total)*100}};
        $var1 = Math.round($var1);
        $('.progress1').circleProgress({
            max: 100,
            value: $var1,
        });
        $('.progress1 .circle-progress-text').html(`<tspan dy='2' dx='-4' class='circle-progress-text-value'>${$var1}%</tspan><tspan dy='15' dx='-30' class='circle-progress-text-max'>${100 - $var1}%</tspan>`);

        $var2 = {{($statistics->state2/$total)*100}};
        $var2 = Math.round($var2);
        $('.progress2').circleProgress({
            max: 100,
            value: $var2,
        });
        $('.progress2 .circle-progress-text').html(`<tspan dy='2' dx='-4' class='circle-progress-text-value'>${$var2}%</tspan><tspan dy='15' dx='-30' class='circle-progress-text-max'>${100 - $var2}%</tspan>`);

        $var3 = {{($statistics->state3/$total)*100}};
        $var3 = Math.round($var3);
        $('.progress3').circleProgress({
            max: 100,
            value: $var3,
        });
        $('.progress3 .circle-progress-text').html(`<tspan dy='2' dx='-4' class='circle-progress-text-value'>${$var3}%</tspan><tspan dy='15' dx='-30' class='circle-progress-text-max'>${100 - $var3}%</tspan>`);

        $var4 = {{($statistics->state4/$total)*100}};
        $var4 = Math.round($var4);
        $('.progress4').circleProgress({
            max: 100,
            value: $var4,
        });
        $('.progress4 .circle-progress-text').html(`<tspan dy='2' dx='-4' class='circle-progress-text-value'>${$var4}%</tspan><tspan dy='15' dx='-30' class='circle-progress-text-max'>${100 - $var4}%</tspan>`);

        $var5 = {{($statistics->state5/$total)*100}};
        $var5 = Math.round($var5);
        $('.progress5').circleProgress({
            max: 100,
            value: $var5,
        });
        $('.progress5 .circle-progress-text').html(`<tspan dy='2' dx='-4' class='circle-progress-text-value'>${$var5}%</tspan><tspan dy='15' dx='-30' class='circle-progress-text-max'>${100 - $var5}%</tspan>`);

        $var6 = {{($statistics->state6/$total)*100}};
        $var6 = Math.round($var6);
        $('.progress6').circleProgress({
            max: 100,
            value: $var6,
        });
        $('.progress6 .circle-progress-text').html(`<tspan dy='2' dx='-4' class='circle-progress-text-value'>${$var6}%</tspan><tspan dy='15' dx='-30' class='circle-progress-text-max'>${100 - $var6}%</tspan>`);

        $var7 = {{($statistics->state7/$total)*100}};
        $var7 = Math.round($var7);
        $('.progress7').circleProgress({
            max: 100,
            value: $var7,
        });
        $('.progress7 .circle-progress-text').html(`<tspan dy='2' dx='-4' class='circle-progress-text-value'>${$var7}%</tspan><tspan dy='15' dx='-30' class='circle-progress-text-max'>${100 - $var7}%</tspan>`);


        $var8 = {{($statistics->state8/$total)*100}};
        $var8 = Math.round($var8);
        $('.progress8').circleProgress({
            max: 100,
            value: $var8,
        });
        $('.progress8 .circle-progress-text').html(`<tspan dy='2' dx='-4' class='circle-progress-text-value'>${$var8}%</tspan><tspan dy='15' dx='-30' class='circle-progress-text-max'>${100 - $var8}%</tspan>`);

        $var9 = {{($statistics->state9/$total)*100}};
        $var9 = Math.round($var9);
        $('.progress9').circleProgress({
            max: 100,
            value: $var9,
        });
        $('.progress9 .circle-progress-text').html(`<tspan dy='2' dx='-4' class='circle-progress-text-value'>${$var9}%</tspan><tspan dy='15' dx='-30' class='circle-progress-text-max'>${100 - $var9}%</tspan>`);

        $var10 = {{($statistics->state10/$total)*100}};
        $var10 = Math.round($var10);
        $('.progress10').circleProgress({
            max: 100,
            value: $var10,
        });
        $('.progress10 .circle-progress-text').html(`<tspan dy='2' dx='-4' class='circle-progress-text-value'>${$var10}%</tspan><tspan dy='15' dx='-30' class='circle-progress-text-max'>${100 - $var10}%</tspan>`);



    });
</script>
</body>

</html>
