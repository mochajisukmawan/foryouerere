<?php
  $dataJson=json_encode($data);
  $dataPerUnitJson=json_encode($data_perUnit);
  $dataPerWilayahJson=json_encode($data_perWilayah);
  $wilayahCountJson=json_encode($wilayah_count);
  $jabatanCountJson=json_encode($jabatan_count);
  $dataUnitKerjaJson=json_encode($data_unitKerja);
  $dataPerJabatanJson=json_encode($data_jabatan);

  $dataLengthJson=json_encode(count($data));
  $dataLengthPerUnitJson=json_encode(count($data_perUnit));
  $dataLengthPerWilayahJson=json_encode(count($data_perWilayah));
  $dataLengthPerJabatanJson=json_encode(count($data_jabatan));

  // print_r($data);
  $bulan=array('01','02','03','04','05','06','07','08','09','10','11','12');

  $valueByPerUnitKerjaKey=array();
  foreach ($data_perUnit as $key) {
    $valueByPerUnitKerjaKey[$key['unit_kerja_id']]=$key['jumlah'];
  }
  //$dataPerUnitJson=json_encode($valueByPerUnitKerjaKey);
?>

<script type="text/javascript">
  function showTable(str) {

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("content_perUnit").innerHTML=this.responseText;
      }
    }
    var month=document.getElementById("monthInput").value;
    var year=document.getElementById("yearInput").value;

    // document.getElementById("txtHint").innerHTML=str;
    xmlhttp.open("GET","<?php echo base_url(); ?>zdwh/ajaxZdwhPeserta/"+month+"/"+year,true);
    xmlhttp.send();

    //document.getElementById("content_perUnit").scrollIntoView();
    //showTableWilayah();
    //test();
  }
  function showTableWilayah() {

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("content_perWilayah").innerHTML=this.responseText;
      }
    }
    var month=document.getElementById("monthInput").value;
    var year=document.getElementById("yearInput").value;

    // document.getElementById("txtHint").innerHTML=str;
    xmlhttp.open("GET","<?php echo base_url(); ?>zdwh/ajaxZdwhWilayah/"+month+"/"+year,true);
    xmlhttp.send();

    //document.getElementById("content_perUnit").scrollIntoView();

  }
  function test() {
    //showTable('');
    //Jumlah peserta
    var arr=<?php echo $dataJson;?>;
    var length=<?php echo $dataLengthJson;?>;

    //Jumlah peserta per unit
    var arrUnit=<?php echo $dataPerUnitJson;?>;
    var lengthUnit=<?php echo $dataLengthPerUnitJson;?>;

    //Jumlah peserta per Wilayah
    var arrWilayah=<?php echo $dataPerWilayahJson;?>;
    var wilayah_count=<?php echo $wilayahCountJson;?>;
    var lengthWilayah=<?php echo $dataLengthPerWilayahJson;?>;

    //Jumlah peserta per jabatan
    var arrJabatan=<?php echo $dataPerJabatanJson;?>;
    var jabatan_count=<?php echo $jabatanCountJson;?>;
    var lengthJabatan=<?php echo $dataLengthPerJabatanJson;?>;

    var year=document.getElementById("yearInput").value;
    var month=document.getElementById("monthInput").value;

    var i;
    var find=-1;
    var findUnit=-1;
    var findWilayah=-1;
    var findWilayahCount=-1;
    var findJabatan=-1;
    var findJabatanCount=-1;
    for( i=0;i<length;i++){

        if(arr[i]['bulan']==month && arr[i]['tahun'].includes(year)){
            find=i;

            break;
        }
    }
    for( i=0;i<lengthUnit;i++){

        if(arrUnit[i]['bulan']==month && arrUnit[i]['tahun'].includes(year)){
            findUnit=i;

            break;
        }
    }

    for( i=0;i<lengthWilayah;i++){

        if(arrWilayah[i]['bulan']==month && arrWilayah[i]['tahun'].includes(year)){
            findWilayah=i;

            break;
        }
    }
    for( i=0;i<wilayah_count.length;i++){

        if(wilayah_count[i]['bulan']==month && wilayah_count[i]['tahun'].includes(year)){
            findWilayahCount=i;

            break;
        }
    }

    for( i=0;i<lengthJabatan;i++){

        if(arrJabatan[i]['bulan']==month && arrJabatan[i]['tahun'].includes(year)){
            findJabatan=i;

            break;
        }
    }
    for( i=0;i<jabatan_count.length;i++){

        if(jabatan_count[i]['bulan']==month && jabatan_count[i]['tahun'].includes(year)){
            findJabatanCount=i;

            break;
        }
    }

    var jumlah=[0,0,0];
    var jumlahPerUnit = new Array();
    var jumlahPerWilayah = new Array();
    var jumlahPerJabatan = new Array();
    var unitArray = new Array();
    var wilayahArray = new Array();
    var jabatanArray = new Array();
    if(find!=-1){
      jumlah[0]=arr[find]['gender_l'];
      jumlah[1]=arr[find]['gender_p'];
      jumlah[2]=arr[find]['jumlah'];
    }
    if(findUnit!=-1){
      var ind;
      var endRange=findUnit+175;

      //+175 karena ada 175 kantor
      for( ind=findUnit;ind<endRange;ind++){
        jumlahPerUnit.push(arrUnit[ind]['jumlah']);
        unitArray.push(arrUnit[ind]['unit_kerja_id']);
      }

    }
    if(findWilayah!=-1 && findWilayahCount !=-1){
      var ind;
      var endRange=findWilayah+parseInt(wilayah_count[findWilayahCount]['jumlah_wilayah']);
      //alert(wilayah_count[findWilayahCount]['jumlah_wilayah']);
      // alert(endRange);
      //+33 karena ada 33 wilayah
      for( ind=findWilayah;ind<endRange;ind++){
        jumlahPerWilayah.push(arrWilayah[ind]['jumlah']);
        wilayahArray.push(arrWilayah[ind]['wilayah']);

      }

    }

    if(findJabatan!=-1 && findJabatanCount !=-1){
      var ind;
      var endRange=findJabatan+parseInt(jabatan_count[findJabatanCount]['jumlah_jabatan']);


      //+33 karena ada 33 wilayah
      for( ind=findJabatan;ind<endRange;ind++){
        jumlahPerJabatan.push(arrJabatan[ind]['jumlah']);

        jabatanArray.push(arrJabatan[ind]['jabatan']);

      }

    }
    // based on prepared DOM, initialize echarts instance
    var myChart = echarts.init(document.getElementById('content'));
    var myChart2 = echarts.init(document.getElementById('content2'));
    var myChart3 = echarts.init(document.getElementById('content3'));
    var myChart4 = echarts.init(document.getElementById('content4'));

    // specify chart configuration item and data
    //option untuk jumlah peserta dalam gender
    var option = {
        title: {
            text: 'Jumlah Peserta Magang'
        },
        tooltip: {},

        xAxis :[
            {
                type: 'category',
                data: ['L','P','Total'],
                axisTick: {
                    alignWithLabel: true
                }
            },

        ],
        yAxis:[{
          type: 'value'
        }
        ],
        series: [{
            name: 'Jumlah Peserta Magang',
            label: {
              normal: {
                show: true,
                textBorderColor: '#333',
                textBorderWidth: 1
              }
            },
            type: 'bar',
            barWidth: '20%',
            data : [
                jumlah[0],jumlah[1],jumlah[2]
            ]
        }]
    };
    //option untuk jumlah peserta per unit
    var option2 = {
        title: {
            text: 'Jumlah Peserta Magang Per Unit'
        },
        color:['blue'],
        tooltip: {},

        yAxis :[
            {
                type: 'category',
                data: unitArray,
                axisTick: {
                    alignWithLabel: true
                }
            },

        ],
        xAxis:[{
          type: 'value'
        }
        ],
        series: [{
            name: 'Jumlah Peserta Magang',
            label: {
              normal: {
                show: true,
                textBorderColor: '#333',
                textBorderWidth: 1
              }
            },
            type: 'bar',
            barWidth: '70%',
            data : jumlahPerUnit
        }]
    };
    //option untuk jumlah peserta per wilayah
    var option3 = {
        title: {
            text: 'Jumlah Peserta Magang Per Wilayah'
        },
        color:['blue'],
        tooltip: {},
        grid: {
          left: 100
        },
        yAxis :[
            {
                type: 'category',
                data: wilayahArray,
                axisTick: {
                    alignWithLabel: true
                }
            },

        ],
        xAxis:[{
          type: 'value'
        }
        ],
        series: [{
            name: 'Jumlah Peserta Magang',
            label: {
              normal: {
                show: true,
                textBorderColor: '#333',
                textBorderWidth: 1
              }
            },
            type: 'bar',
            barWidth: '70%',
            data : jumlahPerWilayah
        }]
    };
    var option4 = {
        title: {
            text: 'Jumlah Peserta Magang Per Jabatan'
        },
        tooltip: {},

        xAxis :[
            {
                type: 'category',
                data: jabatanArray,
                axisTick: {
                    alignWithLabel: true
                }
            },

        ],
        yAxis:[{
          type: 'value'
        }
        ],
        series: [{
            name: 'Jumlah Peserta Magang',
            label: {
              normal: {
                show: true,
                textBorderColor: '#333',
                textBorderWidth: 1
              }
            },
            type: 'bar',
            barWidth: '20%',
            data : jumlahPerJabatan

        }]
    };
    // use configuration item and data specified to show chart
    myChart.setOption(option);
    myChart2.setOption(option2);
    myChart3.setOption(option3);
    myChart4.setOption(option4);
  }
</script>
<div>

  <div class="row">
    <!-- <button onclick="showTable('hari');">TEST ME ?></button> -->
      <div class="col-lg-12">
          <h1 class="page-header">Tampil Pada Tahun: </h1>
      </div>
      <div class="form-group">
        <div class="row">
            <div class="col-md-4 mb-3">
              <label>Bulan</label>
                <select id="monthInput" class="form-control" name="month" required>

                    <!-- <option value="06">Juni</option> -->
                    <?php for($x=0;$x<12;$x++): ?>
                    <option value="<?=$bulan[$x]?>"><?=$bulan[$x]?></option>


                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
              <label>Tahun</label>
                <select id="yearInput" class="form-control" name="year" required>
                <?php for($x=2018;$x<=date('Y');$x++): ?>
                    <option value="<?php echo $x?>"><?php echo $x?></option>

                <?php endfor; ?>
                </select>
            </div>


        </div>




    </div>
      <!-- /.col-lg-12 -->
  </div>
  <div class="row">
          <button onclick="test();" class="btn btn-success " name="submit" value="submit">Tampil</button>
        </div>
  <!-- <h2><?= $title ?></h2> -->
  <div class="row">
    <!-- <button onclick="showTable('hari');">TEST ME ?></button> -->
      <div class="col-lg-12">
          <h1 class="page-header">Jumlah Peserta Magang Bulanan</h1>
      </div>
      <div class="row">
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <div class="row">
    <div class="hpanel horange">
        <div class="panel-body">
          <div class="col-lg-6">
            <div id="content"  style="width: 80%;height:400px;"></div>
          </div>
          <div class="col-lg-6">
            <div id="content4"  style="width: 80%;height:400px;"></div>
          </div>
        </div>
    </div>

  </div>
  <div class="row">
    <div class="hpanel horange">

        <div class="panel-body" >
            <div class="col-lg-6">
              <div id="content2"  style="width: 100%;height:3000%;"></div>
            </div>
            <div class="col-lg-6">
              <div id="content3"  style="width: 100%;height:1000%;"></div>
            </div>
        </div>
    </div>

  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="hpanel horange">
          <div class="panel-body">
              <div id="content_perUnit"></div>
          </div>
      </div>
    </div>
  </div>






</div>
<script src="<?php echo base_url(); ?>assets/echarts.js"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>assets/sb-admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/sb-admin/vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {

        $('#dataTables2').DataTable({
            responsive: true
        });

    });

</script>
