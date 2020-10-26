@include('layouts.include.head')

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
@include('layouts.include.sidebar')

      @yield('content')

@include('layouts.include.footer')    