@extends('app.app')

@section('head')

@endsection

@section('script')
  <script type="text/javascript">
    var latitude;
    var longitude;
    var timestamp;
    var timezonestring;
    var country;
    var city;
    var tanggal;
    var month;
    var year;
    $.getJSON('http://ipinfo.io', function(data){
      tanggal = moment().format("MMMM YYYY");
      timestamp = moment().unix();
      latitude = data.loc.split(',')[0];
      longitude = data.loc.split(',')[1];
      timezonestring = moment.tz.guess();
      if(timezonestring == "Asia/Bangkok"){
        timezonestring = "Asia/Jakarta";
      }

      country = data.country;
      city = data.city;

      month = moment().format("MM");
      year = moment().format("YYYY");

      $("#tanggal").html(tanggal);
      $.getJSON('http://api.aladhan.com/calendar?latitude='+latitude+'&longitude='+longitude+'&timezonestring='+timezonestring+'&method=2&month='+month+'&year='+year, function(hasil){
        var html = '';
        console.log('http://api.aladhan.com/calendar?latitude='+latitude+'&longitude='+longitude+'&timezonestring='+timezonestring+'&method=2&month='+month+'&year='+year);
        // console.log(hasil);
        $.each(hasil.data, function(index, value){
          html = html+
          "<tr>"+
            "<td>"+(index + 1)+"</td>"+
            "<td>"+value.date.readable+"</td>"+
            "<td>"+value.timings.Fajr+"</td>"+
            "<td>"+value.timings.Dhuhr+"</td>"+
            "<td>"+value.timings.Asr+"</td>"+
            "<td>"+value.timings.Maghrib+"</td>"+
            "<td>"+value.timings.Isha+"</td>"+
          "</tr>";
        });

        $("#tableMonthly tbody").html(html);
        // var fajrdiff = moment(hasil.data.date.readable + " " + hasil.data.timings.Fajr, "DD MMM YYYY HH:mm").fromNow();
        // var dhuhrdiff = moment(hasil.data.date.readable + " " + hasil.data.timings.Dhuhr, "DD MMM YYYY HH:mm").fromNow();
        // var asrdiff = moment(hasil.data.date.readable + " " + hasil.data.timings.Asr, "DD MMM YYYY HH:mm").fromNow();
        // var maghribdiff = moment(hasil.data.date.readable + " " + hasil.data.timings.Maghrib, "DD MMM YYYY HH:mm").fromNow();
        // var ishadiff = moment(hasil.data.date.readable + " " + hasil.data.timings.Isha, "DD MMM YYYY HH:mm").fromNow();
        //
        // $("#fajrdiff").html(fajrdiff);
        // $("#dhuhrdiff").html(dhuhrdiff);
        // $("#asrdiff").html(asrdiff);
        // $("#maghribdiff").html(maghribdiff);
        // $("#ishadiff").html(ishadiff);
        //
        // // $("#tempat").html(city + ", " + country);
        // $("#waktuFajr").html(hasil.data.timings.Fajr);
        // $("#waktuDhuhr").html(hasil.data.timings.Dhuhr);
        // $("#waktuAsr").html(hasil.data.timings.Asr);
        // $("#waktuMaghrib").html(hasil.data.timings.Maghrib);
        // $("#waktuIsha").html(hasil.data.timings.Isha);
      });
    });
  </script>
@endsection

@section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center blue-grey-text darken-3">Waktu Shalat</h1>
      <div class="row center">
        <h5 class="header col s12 light" id="tanggal"></h5>
      </div>
      <div class="row center">
        <h5 class="header col s12 light" id="tempat"></h5>
      </div>
      <div class="row center">
        <a href="{{ url('/') }}" id="download-button" class="btn-large waves-effect">Versi Harian</a>
      </div>
      <br><br>
    </div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row center-align">
        <table id="tableMonthly">
          <thead>
            <tr>
              <th data-field="no">#</th>
              <th data-field="tanggal">Tanggal</th>
              <th data-field="fajr">Fajr (فجر)</th>
              <th data-field="dhuhr">Zhuhr (ظهر)</th>
              <th data-field="asr">Asr (عصر)</th>
              <th data-field="maghrib">Maghrib (مغرب)</th>
              <th data-field="isha">Isha (عشاء)</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
