<script src="<?php echo base_url(); ?>assets/echarts.js"></script>
<script>
$(document).ready(function(){
  var myChart = echarts.init(document.getElementById('trendPerBulan'));
  var myChart_gender = echarts.init(document.getElementById('gender'));
  var option = {
      title: {
          text: 'Jumlah Peserta Magang'
      },
      tooltip: {},
      legend: {
          data: ['Jumlah Peserta', 'Laki-Laki', 'Perempuan']
      },
      xAxis :[
          {
              type: 'category',
              data: [
                <?php
                  $zdwh=$this->db->get("zdwh_dharma_perbulan")->result();
                  foreach ($zdwh as $key) {
                    echo "'".date('M Y',strtotime($key->tahun.'-'.$key->bulan."-01"))."',";
                  }
                ?>
              ],
              axisTick: {
                  alignWithLabel: true
              }
          },

      ],
      yAxis:[{
        type: 'value'
      }
      ],
      series: [
        {
            name: 'Jumlah Peserta',
            type: 'bar',
            barGap: 0,
            data: [
              <?php
                foreach ($zdwh as $key) {
                  echo $key->jumlah.",";
                }
              ?>
              ]
        },
        {
            name: 'Laki-Laki',
            type: 'bar',
            data: [
              <?php
                foreach ($zdwh as $key) {
                  echo $key->gender_l.",";
                }
              ?>
            ]
        },
        {
            name: 'Perempuan',
            type: 'bar',
            data: [
              <?php
                foreach ($zdwh as $key) {
                  echo $key->gender_p.",";
                }
              ?>
            ]
        }
    ]
  };
  myChart.setOption(option);
});
</script>
<div class="row" id="chartpanel">
  <div class="col-lg-12">
    <div class="hpanel horange">
        <div class="panel-body">
            <div id="trendPerBulan" style="width: 100%;height:300px;"></div>
        </div>
        <div class="panel-body">
            <div id="gender" style="width: 100%;height:300px;"></div>
        </div>
    </div>
  </div>
</div>
