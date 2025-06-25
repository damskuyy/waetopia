<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>{{ $title }}</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="be/plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="be/plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="be/plugins/nprogress/nprogress.css" rel="stylesheet" />
  
  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="be/css/style.css" />

  <!-- FAVICON -->
  <link href="be/images/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="be/plugins/nprogress/nprogress.js"></script>
</head>

<body class="bg-light-gray" id="body">
  <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex flex-column justify-content-between">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-5 col-md-10">
          <div class="card card-default mb-0">
            <div class="card-header pb-0">
              <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                <a class="w-auto pl-0" href="/index.html">
                  <img src="be/images/logo-panjang.png" alt="Mono">
                  {{-- <span class="brand-name text-dark">MONO</span> --}}
                </a>
              </div>
            </div>
            <div class="card-body px-5 pb-5 pt-0">
              <h4 class="text-dark text-center mb-5">Sign Up</h4>
              <form action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="text" class="form-control input-lg" id="name" name="name" aria-describedby="nameHelp" placeholder="Name" value="{{ old('name') }}" required>
                    @error('name')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-md-12 mb-4">
                    <input type="text" class="form-control input-lg" id="nama_lengkap" name="nama_lengkap" aria-describedby="nameHelp" placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}" required>
                    @error('nama_lengkap')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-md-12 mb-4">
                    <input type="email" class="form-control input-lg" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-md-12 mb-4">
                    <input type="number" class="form-control input-lg" id="no_hp" name="no_hp" aria-describedby="emailHelp" placeholder="No Handphone" value="{{ old('no_hp') }}" required>
                    @error('no_hp')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-md-12 mb-4">
                    <input type="text" class="form-control input-lg" id="alamat" name="alamat" aria-describedby="emailHelp" placeholder="alamat" value="{{ old('alamat') }}" required>
                    @error('alamat')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-md-12">
                    <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password" required>
                    @error('password')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group col-md-12">
                    <input type="password" class="form-control input-lg" id="cpassword" name="password_confirmation" placeholder="Confirm Password" required>
                  </div>
                  <div class="col-md-12">
                    <div class="d-flex justify-content-between mb-3">
                      <div class="custom-control custom-checkbox mr-3 mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck2" required>
                        <label class="custom-control-label" for="customCheck2">I Agree to the terms and conditions.</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-pill mb-4">Sign Up</button>
                    <p>Already have an account?
                      <a class="text-blue" href="{{ route('masuk') }}">Sign in</a>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
