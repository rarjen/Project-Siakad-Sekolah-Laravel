<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Sistem Informasi Akademik Sekolah</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="shrotcut icon" href="https://ik.imagekit.io/6v306xm58/KRUSIA.png?updatedAt=1690732404201">
</head>

<body class="hold-transition login-page" style="background-image: url('{{ asset("img/background-login.jpg") }}'); background-size: cover; background-attachment: fixed;">
  <div class="login-box">
    <div class="login-logo">
      <img src="https://ik.imagekit.io/6v306xm58/logo.png?updatedAt=1690732409580" alt="Logo" width="150" height="150">
      <h1 style="font-family: cursive; font-size: 26px; color: #ffff; text-align: center;">SMPIT Insan Madani</h1>
      {{-- <img src="https://ik.imagekit.io/6v306xm58/logo.png?updatedAt=1690732409580" width="100%" alt=""> --}}
    </div>

    <div class="login-logo" style="color: white;">
      @yield('page')
    </div>

    <div class="card">
      @yield('content')
    </div>

    <footer style="color: white;">
      {{-- <marquee>
          <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script> &diams; <a href="http://smkn1jenpo.sch.id/" style="color: white;">SMK Negeri 1 Jenangan Ponorogo</a>. </strong>
      </marquee> --}}
    </footer>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
  <!-- page script -->
  <script>
    $(document).ready(function() {
      $('#role').change(function() {
        var kel = $('#role option:selected').val();
        if (kel == "Guru") {
          $("#noId").addClass("mb-3");
          $("#noId").html(`
              <input id="nomer" type="text" maxlength="5" onkeypress="return inputAngka(event)" placeholder="No Id Card" class="form-control @error('nomer') is-invalid @enderror" name="nomer" autocomplete="nomer">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
              `);
          $("#pesan").html(`
              @error('nomer')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            `);
        } else if (kel == "Siswa") {
          $("#noId").addClass("mb-3");
          $("#noId").html(`
              <input id="nomer" type="text" placeholder="No Induk Siswa" class="form-control" name="nomer" autocomplete="nomer">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            `);
          $("#pesan").html(`
              @error('nomer')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            `);
        } else {
          $('#noId').removeClass("mb-3");
          $('#noId').html('');
        }
      });
    });

    function inputAngka(e) {
      var charCode = (e.which) ? e.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
      return true;
    }
  </script>
  @yield('script')

  @error('id_card')
  <script>
    toastr.error("Maaf User ini tidak terdaftar sebagai Guru!");
  </script>
  @enderror
  @error('guru')
  <script>
    toastr.error("Maaf Guru ini sudah terdaftar sebagai User!");
  </script>
  @enderror
  @error('no_induk')
  <script>
    toastr.error("Maaf User ini tidak terdaftar sebagai Siswa!");
  </script>
  @enderror
  @error('siswa')
  <script>
    toastr.error("Maaf Siswa ini sudah terdaftar sebagai User!");
  </script>
  @enderror
  @if (session('status'))
  <script>
    toastr.success("{{ Session('success') }}");
  </script>
  @endif
  @if (Session::has('error'))
  <script>
    toastr.error("{{ Session('error') }}");
  </script>
  @endif

</body>

</html>