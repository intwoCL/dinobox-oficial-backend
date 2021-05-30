@extends('web.cliente.skeleton')
@push('stylesheet')
  <style>
    @keyframes move_wave {
      0% {
          transform: translateX(0) translateZ(0) scaleY(1)
      }
      50% {
          transform: translateX(-25%) translateZ(0) scaleY(0.55)
      }
      100% {
          transform: translateX(-50%) translateZ(0) scaleY(1)
      }
    }
    .waveWrapper {
      overflow: hidden;
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      top: 0;
      margin: auto;
    }
    .waveWrapperInner {
      position: absolute;
      width: 100%;
      overflow: hidden;
      height: 100%;
      filter: blur(.4px);
      -webkit-filter: blur(.5px);
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      /* background-image: linear-gradient(to top, #f3f3f3 1%, #696868 40%); */
      background-image: url("{{ asset(current_sistema()->present()->getImagenFondo()) }}");
    }
    .bgTop {
      z-index: -3;
      opacity: 0.5;
    }
    .bgMiddle {
      z-index: -1;
      opacity: 0.75;
    }
    .bgBottom {
      z-index: -4;
    }
    .wave {
      position: absolute;
      left: 0;
      width: 200%;
      height: 100%;
      background-repeat: repeat no-repeat;
      background-position: 0 bottom;
      transform-origin: center bottom;
    }
    .waveTop {
      background-size: 50% 100px;
    }
    .waveAnimation .waveTop {
    animation: move-wave 3s;
      -webkit-animation: move-wave 3s;
      -webkit-animation-delay: 1s;
      animation-delay: 1s;
    }
    .waveMiddle {
      background-size: 50% 120px;
    }
    .waveAnimation .waveMiddle {
      animation: move_wave 10s linear infinite;
    }
    .waveBottom {
      background-size: 50% 100px;
    }
    .waveAnimation .waveBottom {
      animation: move_wave 15s linear infinite;
    }
  </style>
@endpush
@section('app')

<div class="waveWrapper waveAnimation">
  <div class="waveWrapperInner bgTop">
    <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
  </div>
  <div class="waveWrapperInner bgMiddle">
    <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
  </div>
  <div class="waveWrapperInner bgBottom">
    <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
  </div>
</div>

@yield('content')
@endsection
