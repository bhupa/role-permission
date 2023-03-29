<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{asset('bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('bower_components/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('bower_components/admin-lte/dist/css/adminlte.min.css?v=3.2.0')}}">
    <script nonce="ff1ed5a1-129a-4ee6-8ae0-85987817a69c">
        (function(w, d) {
            ! function(di, dj, dk, dl) {
                di[dk] = di[dk] || {};
                di[dk].executed = [];
                di.zaraz = {
                    deferred: []
                    , listeners: []
                };
                di.zaraz.q = [];
                di.zaraz._f = function(dm) {
                    return function() {
                        var dn = Array.prototype.slice.call(arguments);
                        di.zaraz.q.push({
                            m: dm
                            , a: dn
                        })
                    }
                };
                for (const dp of ["track", "set", "debug"]) di.zaraz[dp] = di.zaraz._f(dp);
                di.zaraz.init = () => {
                    var dq = dj.getElementsByTagName(dl)[0]
                        , dr = dj.createElement(dl)
                        , ds = dj.getElementsByTagName("title")[0];
                    ds && (di[dk].t = dj.getElementsByTagName("title")[0].text);
                    di[dk].x = Math.random();
                    di[dk].w = di.screen.width;
                    di[dk].h = di.screen.height;
                    di[dk].j = di.innerHeight;
                    di[dk].e = di.innerWidth;
                    di[dk].l = di.location.href;
                    di[dk].r = dj.referrer;
                    di[dk].k = di.screen.colorDepth;
                    di[dk].n = dj.characterSet;
                    di[dk].o = (new Date).getTimezoneOffset();
                    if (di.dataLayer)
                        for (const dw of Object.entries(Object.entries(dataLayer).reduce(((dx, dy) => ({
                                ...dx[1]
                                , ...dy[1]
                            }))))) zaraz.set(dw[0], dw[1], {
                            scope: "page"
                        });
                    di[dk].q = [];
                    for (; di.zaraz.q.length;) {
                        const dz = di.zaraz.q.shift();
                        di[dk].q.push(dz)
                    }
                    dr.defer = !0;
                    for (const dA of [localStorage, sessionStorage]) Object.keys(dA || {}).filter((dC => dC.startsWith("_zaraz_"))).forEach((dB => {
                        try {
                            di[dk]["z_" + dB.slice(7)] = JSON.parse(dA.getItem(dB))
                        } catch {
                            di[dk]["z_" + dB.slice(7)] = dA.getItem(dB)
                        }
                    }));
                    dr.referrerPolicy = "origin";
                    dr.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(di[dk])));
                    dq.parentNode.insertBefore(dr, dq)
                };
                ["complete", "interactive"].includes(dj.readyState) ? zaraz.init() : di.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);

    </script>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Login</b></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{url('/login')}}" method="post">
                @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            {{-- <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div> --}}
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>
                {{-- <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
            </div>

        </div>
    </div>


    <script src="../../plugins/jquery/jquery.min.js"></script>

    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
