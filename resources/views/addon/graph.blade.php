@extends('layouts.tpm')

@section('css')
<style type="text/css">
[class^="icon-"], [class*=" icon-"] {    
    background-image: url("../../public/images/img/glyphicons-halflings.png");
}
.icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
  background-image: url("../../public/images/img/glyphicons-halflings-white.png")
}
.fc-button-next .fc-button-content {
  background: url("../../public/images/img/rarrow.png") no-repeat scroll 15px 13px transparent;
  width: 10px;
}
.fc-button-prev .fc-button-content {
  background: url("../../public/images/img/larrow.png") no-repeat scroll 15px 13px transparent;
  width: 10px;
}
#container,#container2 {
	min-width: auto;
	max-width: auto;
	margin: 0 auto;
  height: auto;
}
#container3{
  height: auto;
}
.widget-box {
  margin-top: 1px;
  margin-bottom: 1px;
}
</style>
@endsection

@section('content-header')
<div id="content-header">
  <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-signal"></i> แผนภูมิ &amp; กราฟ</a></div>
</div> 
@endsection
@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-signal"></i>
                    </span>
                    <h5>wordcloud <code>เหตุผลการลาแบบกลุ่มคำ</code></h5>
                </div>
                <div class="widget-content">
                  <div id="container"></div>							
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-th-list"></i>
                    </span>
                    <h5>bar chart <code>สรุปการลาแยกตามประเภท และรายบุคคล</code></h5>
                </div>
                <div class="widget-content">
                <div id="container2" ></div> 						
                </div>
            </div>
        </div>
    </div> 
    <hr>
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-signal"></i>
                    </span>
                    <h5>pie-chart <code>สรุปจำนวนพนักงานแยกตามเพศ</code></h5>
                </div>
                <div class="widget-content">
                  <canvas id="pie-chart" width="800" height="400"></canvas>  	    					
                </div>
            </div>
        </div>
        <div class="span6">
            <div class="widget-box">
              <div class="widget-title">
                  <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#tab1">สรุปจำนวนพนักงานแยกตามฝ่าย</a></li>
                      <li><a data-toggle="tab" href="#tab2">สรุปจำนวนพนักงานแยกตามแผนก</a></li>
                  </ul>
              </div>
              <div class="widget-content tab-content">
                  <div id="tab1" class="tab-pane active">
                    <canvas id="doughnut-chart" width="800" height="400"></canvas>              
                  </div>
                  <div id="tab2" class="tab-pane">
                  <div id="container3"></div>                 
                  </div>
              </div>                            
          </div>
        </div>
    </div>
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-signal"></i>
                    </span>
                    <h5>bar-chart-horizontal <code>สรุปช่วงอายุของพนักงาน</code></h5>
                </div>
                <div class="widget-content">
                    <canvas id="bar-chart-horizontal" width="800" height="150"></canvas>						
                </div>
            </div>
        </div>
    </div>
          
</div>
@php 
  $colors = ["#3e95cd", "#8e5ea2", "#3cba9f","#e8c3b9","#c45850","#468847","#ffac49","#0e6ee8","#fd7a06","#fb06fd","#fd0654","#d4ea25","#9E9E9E"];
@endphp
<!-- bar-chart-horizontal -->
  @php 
    $arr_age = array(); 
    $age18 = $age25 = $age35 = $age45 = $age55 = $age65 = 0; 
  @endphp

  @foreach($thorizontal as $thorizontals)    
    @if($thorizontals['age'] <= 24)
      @php $age18 += 1; @endphp
    @elseif($thorizontals['age'] <= 34)
      @php $age25 += 1; @endphp
    @elseif($thorizontals['age'] <= 44)
      @php $age35 += 1; @endphp
    @elseif($thorizontals['age'] <= 54)
      @php $age45 += 1; @endphp
    @elseif($thorizontals['age'] <= 64)
      @php $age55 += 1; @endphp
    @else
      @php $age65 += 1; @endphp
    @endif
  @endforeach
  @php $arr_age[] = $age18.','.$age25.','.$age35.','.$age45.','.$age55.','.$age65; @endphp
  
  <!-- wordcloud -->
  @foreach($wordcloud as $wordclouds) 
    @php  $w_cloud = $wordclouds['text'];  @endphp  
  @endforeach 
  
  <!-- wordcloud -->
@php $id_pers = ''; $output=array(); $output1=array(); @endphp
  @foreach($barchart2 as $barname)        
    @if($barname['id_per'] != $id_pers)
        @php $id_pers = $barname['id_per']; @endphp @php $c = 0;  @endphp
        @php $emtry=$emtry1=$emtry2=$emtry3=$emtry4=0; @endphp
      @foreach($barchart2 as $bartype)
        @if($bartype['id_per'] == $barname['id_per'])
            @for($i=0;$i<=4;$i++)            
               @if($bartype['type_leave'] == 0) 
                @php $emtry = $bartype['counts'] @endphp
              @elseif($bartype['type_leave'] == 1)
                @php $emtry1 = $bartype['counts'] @endphp
              @elseif($bartype['type_leave'] == 2)
                @php $emtry2 = $bartype['counts'] @endphp
              @elseif($bartype['type_leave'] == 3)
                @php $emtry3 = $bartype['counts'] @endphp
              @elseif($bartype['type_leave'] == 4)
                @php $emtry4 = $bartype['counts'] @endphp
              @endif              
            @endfor
        @endif
      @endforeach     
      @php $output[] = $barname['surname'].'-'.$emtry.','.$emtry1.','.$emtry2.','.$emtry3.','.$emtry4; $output1[] = $barname['id_per']; @endphp
    @endif
  @endforeach

@endsection

@section('js')
<script src="{{ asset('js/main/chart/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('js/main/chart/hightchart.js/highcharts.js') }}"></script>
<script src="{{ asset('js/main/chart/hightchart.js/wordcloud.js') }}"></script>
<script type="text/javascript">
// Build the chart wordcloud
var text = '{{$w_cloud}}';
var lines = text.split(/[,. ]+/g),
  data = Highcharts.reduce(lines, function (arr, word) {
    var obj = Highcharts.find(arr, function (obj) {
      return obj.name === word;
    });
    if (obj) {
      obj.weight += 1;
    } else {
      obj = {
        name: word,
        weight: 1
      };
      arr.push(obj);
    }
    return arr;
  }, []);

Highcharts.chart('container', {
  series: [{
    type: 'wordcloud',
    data: data,
    name: 'Occurrences'
  }],
  title: {
    text: 'รายงานเหตุผลการลาแบบ กลุ่มคำ'
  }
});

Highcharts.chart('container2', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'สรุปการลาแยกตามรายบุคคล'
  },
  xAxis: {
    categories: ['ลาบวช-ทำหมัน', 'ลาคลอด', 'ลาป่วย', 'ลากิจ', 'พักร้อน']
  },
  yAxis: {
    min: 0,
    title: {
      text: 'จำนวนการลา'
    }
  },
  legend: {
    reversed: true
  },
  plotOptions: {
    series: {
      stacking: 'normal'
    }
  },
  series: [
      @foreach($output as $outputs)
        {
          @php $e = explode("-", $outputs); @endphp
          name: '{{$e[0]}}',
          data: [
            {{$e[1]}}
          ]
        },        
      @endforeach
  
  ]
});

Highcharts.setOptions({
  colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
      radialGradient: {
        cx: 0.5,
        cy: 0.3,
        r: 0.7
      },
      stops: [
        [0, color],
        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
      ]
    };
  })
});


Highcharts.chart('container3', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'รายงานจำนวนพนักงานแยกตามแผนก'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        },
        connectorColor: 'silver'
      }
    }
  },
  series: [{
    name: 'Share',
    data: [
      @foreach($piechart2 as $piechart2s)        
        { name: '{{$piechart2s['name_pos']}}', y: {{$piechart2s['person']}} },    
      @endforeach      
    ]
  }]
});

new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: [
        @foreach($pos as $poss)
          '{{ $poss['name_dep'] }}',
        @endforeach
      ],
      datasets: [
        {
          label: "จำนวน (คน)",
          backgroundColor: [
            @foreach($colors as $color)
              '{{ $color}}',
            @endforeach
          ],
          data: [
            @foreach($pos as $poss)
              '{{ $poss['count_person'] }}',
            @endforeach
          ]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'รายงานจำนวนพนักงานแยกตามฝ่าย'
      }
    }
});

new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["ช่วงอายุ 15-24", "ช่วงอายุ 25-34", "ช่วงอายุ 35-44", "ช่วงอายุ 45-54", "ช่วงอายุ 55-64", "ช่วงอายุ 65+"],
      datasets: [
        {
          label: "จำนวน (คน)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#f9be3e"],
          data: [
            @foreach($arr_age as $arr_ages)
              {{ $arr_ages }}
            @endforeach
          ]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'รายงานช่วงอายุของพนักงาน'
      }
    }
});
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["ผู้หญิง", "ผู้ชาย"],
      datasets: [{
        label: "จำนวน (คน)",
        backgroundColor: ["#8e5ea2", "#3e95cd"],
        data: [
          @foreach($piechart as $piecharts)
            '{{ $piecharts['woman'] }}','{{ $piecharts['man'] }}'
          @endforeach
        ]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'รายงานจำนวนพนักงานแยกตามเพศ'
      }
    }
});


</script>
@endsection