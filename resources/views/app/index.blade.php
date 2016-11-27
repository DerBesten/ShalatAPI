@extends('app.app')

@section('head')

@endsection

@section('script')
  <script type="text/javascript">
  moment.locale('id');
    var latitude;
    var longitude;
    var timestamp;
    var timezonestring;
    var country;
    var city;
    var tanggal;
    $.getJSON('http://ipinfo.io', function(data){
      console.log(data);
      tanggal = moment().format("dddd, Do MMMM YYYY");
      timestamp = moment().unix();
      latitude = data.loc.split(',')[0];
      longitude = data.loc.split(',')[1];
      timezonestring = moment.tz.guess();

      country = data.country;
      city = data.city;

      $("#tanggal").html(tanggal);
      $.getJSON('http://api.aladhan.com/timings/'+timestamp+'?latitude='+latitude+'&longitude='+longitude+'&timezonestring='+timezonestring, function(hasil){
        console.log(hasil);
        var fajrdiff = moment(hasil.data.date.readable + " " + hasil.data.timings.Fajr, "DD MMM YYYY HH:mm").fromNow();
        var dhuhrdiff = moment(hasil.data.date.readable + " " + hasil.data.timings.Dhuhr, "DD MMM YYYY HH:mm").fromNow();
        var asrdiff = moment(hasil.data.date.readable + " " + hasil.data.timings.Asr, "DD MMM YYYY HH:mm").fromNow();
        var maghribdiff = moment(hasil.data.date.readable + " " + hasil.data.timings.Maghrib, "DD MMM YYYY HH:mm").fromNow();
        var ishadiff = moment(hasil.data.date.readable + " " + hasil.data.timings.Isha, "DD MMM YYYY HH:mm").fromNow();

        $("#fajrdiff").html(fajrdiff);
        $("#dhuhrdiff").html(dhuhrdiff);
        $("#asrdiff").html(asrdiff);
        $("#maghribdiff").html(maghribdiff);
        $("#ishadiff").html(ishadiff);

        // $("#tempat").html(city + ", " + country);
        $("#waktuFajr").html(hasil.data.timings.Fajr);
        $("#waktuDhuhr").html(hasil.data.timings.Dhuhr);
        $("#waktuAsr").html(hasil.data.timings.Asr);
        $("#waktuMaghrib").html(hasil.data.timings.Maghrib);
        $("#waktuIsha").html(hasil.data.timings.Isha);
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
        <a href="{{ url('monthly') }}" id="download-button" class="btn-large waves-effect">Versi Bulanan</a>
      </div>
      <br><br>

    </div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row center-align">
        <div class="col s6 m4">
          <div class="card">
            <div class="card-image">
                <img src="image/fajar.jpg">
                <span class="card-title center">Fajr (فجر)<!-- </span> -->
              <p id="waktuFajr"></p></span>
            </div>
            <!-- <div class="card-content">
              
            </div> -->
            <div class="card-action">
              <span class="black-text" id="fajrdiff"></span>
            </div>
          </div>  
        </div>
        <div class="col s6 m4">
            <div class="card">
              <div class="card-image">
                <img src="image/siang.jpg">
                <span class="card-title center">Zhuhr (ظهر)
                <p id="waktuDhuhr"></p></span>
              </div>
              <!-- <div class="card-content">
                
              </div> -->
              <div class="card-action">
                <span class="black-text" id="dhuhrdiff"></span>
              </div>
            </div>
          </div>
        <div class="col s6 m4">
            <div class="card">
              <div class="card-image">
                <img src="image/sore.jpg">
                <span class="card-title center">Asr (عصر)
                <p id="waktuAsr"></p></span>
              </div><!-- 
              <div class="card-content">
                
              </div> -->
              <div class="card-action">
                <span class="black-text" id="asrdiff"></span>
              </div>
            </div>
          </div>
        <div class="col s6 m4">
            <div class="card">
              <div class="card-image">
                <img src="image/index.jpg">
                <span class="card-title center">Maghrib (مغرب)
                <p id="waktuMaghrib"></p></span>
              </div>
              <!-- <div class="card-content">
                
              </div> -->
              <div class="card-action">
                <span class="black-text" id="maghribdiff"></span>
              </div>
            </div>
          </div>
        <div class="col s6 m4">
            <div class="card">
              <div class="card-image">
                <img src="image/malam.jpg">
                <span class="card-title center-align">Isha (عشاء)
                <p id="waktuIsha"></p></span>
              </div>
                <!-- <div class="card-content">
                  
                </div> -->
              <div class="card-action">
                <span class="black-text" id="ishadiff"></span>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
