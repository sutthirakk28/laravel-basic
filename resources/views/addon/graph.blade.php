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
                        <i class="icon-th-list"></i>
                    </span>
                    <h5>Full Width <code>class=Span12</code></h5>
                </div>
                <div class="widget-content">
                    <canvas id="mixed-chart" width="800" height="180"></canvas>							
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-th-list"></i>
                    </span>
                    <h5>Half Width <code>class=Span6</code></h5>
                </div>
                <div class="widget-content">
                    <canvas id="line-chart" width="800" height="450"></canvas> 		    					
                </div>
            </div>
        </div>
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-signal"></i>
                    </span>
                    <h5>doughnut-chart <code>สรุปจำนวนแยกตามฝ่าย</code></h5>
                </div>
                <div class="widget-content">
                    <canvas id="doughnut-chart" width="800" height="450"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-th-list"></i>
                    </span>
                    <h5>bar-chart-horizontal <code>สรุปช่วงอายุของพนักงาน</code></h5>
                </div>
                <div class="widget-content">
                    <canvas id="bar-chart-horizontal" width="800" height="180"></canvas>						
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span8">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-th-list"></i>
                    </span>
                    <h5>Two third width  <code>class=Span7</code></h5>
                </div>
                <div class="widget-content">
                    <canvas id="bubble-chart" width="800" height="300"></canvas>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-th-list"></i>
                    </span>
                    <h5>One third width <code>class=Span4</code></h5>
                </div>
                <div class="widget-content">
                    <canvas id="radar-chart" width="800" height="650"></canvas>
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
  
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
new Chart(document.getElementById("mixed-chart"), {
    type: 'bar',
    data: {
      labels: ["1900", "1950", "1999", "2050"],
      datasets: [{
          label: "Europe",
          type: "line",
          borderColor: "#8e5ea2",
          data: [408,547,675,734],
          fill: false
        }, {
          label: "Africa",
          type: "line",
          borderColor: "#3e95cd",
          data: [133,221,783,2478],
          fill: false
        }, {
          label: "Europe",
          type: "bar",
          backgroundColor: "rgba(0,0,0,0.2)",
          data: [408,547,675,734],
        }, {
          label: "Africa",
          type: "bar",
          backgroundColor: "rgba(0,0,0,0.2)",
          backgroundColorHover: "#3e95cd",
          data: [133,221,783,2478]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Population growth (millions): Europe & Africa'
      },
      legend: { display: false }
    }
});

new Chart(document.getElementById("bubble-chart"), {
    type: 'bubble',
    data: {
      labels: "Africa",
      datasets: [
        {
          label: ["China"],
          backgroundColor: "rgba(255,221,50,0.2)",
          borderColor: "rgba(255,221,50,1)",
          data: [{
            x: 21269017,
            y: 5.245,
            r: 15
          }]
        }, {
          label: ["Denmark"],
          backgroundColor: "rgba(60,186,159,0.2)",
          borderColor: "rgba(60,186,159,1)",
          data: [{
            x: 258702,
            y: 7.526,
            r: 101
          }]
        }, {
          label: ["Germany"],
          backgroundColor: "rgba(0,0,0,0.2)",
          borderColor: "#000",
          data: [{
            x: 3979083,
            y: 6.994,
            r: 15
          }]
        }, {
          label: ["Japan"],
          backgroundColor: "rgba(193,46,12,0.2)",
          borderColor: "rgba(193,46,12,1)",
          data: [{
            x: 4931877,
            y: 5.921,
            r: 15
          }]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }, scales: {
        yAxes: [{ 
          scaleLabel: {
            display: true,
            labelString: "Happiness"
          }
        }],
        xAxes: [{ 
          scaleLabel: {
            display: true,
            labelString: "GDP (PPP)"
          }
        }]
      }
    }
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
          label: "Population (millions)",
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

new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
    datasets: [{ 
        data: [86,114,106,106,107,111,133,221,783,2478],
        label: "Africa",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [282,350,411,502,635,809,947,1402,3700,5267],
        label: "Asia",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [168,170,178,190,203,276,408,547,675,734],
        label: "Europe",
        borderColor: "#3cba9f",
        fill: false
      }, { 
        data: [40,20,10,16,24,38,74,167,508,784],
        label: "Latin America",
        borderColor: "#e8c3b9",
        fill: false
      }, { 
        data: [6,3,2,2,7,26,82,172,312,433],
        label: "North America",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    }
  }
});

new Chart(document.getElementById("radar-chart"), {
    type: 'radar',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "1950",
          fill: true,
          backgroundColor: "rgba(179,181,198,0.2)",
          borderColor: "rgba(179,181,198,1)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(179,181,198,1)",
          data: [8.77,55.61,21.69,6.62,6.82]
        }, {
          label: "2050",
          fill: true,
          backgroundColor: "rgba(255,99,132,0.2)",
          borderColor: "rgba(255,99,132,1)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(255,99,132,1)",
          pointBorderColor: "#fff",
          data: [25.48,54.16,7.61,8.06,4.45]
        }, {
          label: "1992",
          fill: true,
          backgroundColor: "rgba(255,99,132,0.2)",
          borderColor: "#8e5ea2",
          pointBorderColor: "#fff",
          pointBackgroundColor: "#8e5ea2",
          pointBorderColor: "#fff",
          data: [30.48,14.16,30,40,0]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Distribution in % of world population'
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
</script>
@endsection