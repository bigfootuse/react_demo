<!--dashboard end -->
<!-- Tap on Top -->
<div class="tap-top">
    <div>
        <i class="fa fa-angle-double-up"></i>
    </div>
</div>
<!-- latest jquery-->
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<!--Jarallax JS-->
<script src="{{asset('assets/js/jarallax.min.js')}}"></script>
<!--OWL Carousel JS -->
<script src="{{asset('assets/js/owl.carousel.js')}}"></script>
<!--Scroll Reveal JS-->
<script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
<script src="{{asset('assets/js/modernizr-custom.js')}}"></script>
<!-- popper js-->
<script src="{{asset('assets/js/popper.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap.js')}}" type="text/javascript"></script>
<!-- Counter js-->
<script src="{{asset('assets/js/jquery.waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery.counterup.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/sweetalert.min.js')}}" type="text/javascript"></script>
<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/af-2.2.2/b-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>

@yield('script')
<script type="text/javascript">
    // /* _____________________________________

    //      Count down
    //      _____________________________________ */

    //      var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();
    // // Update the count down every 1 second
    // var countdownfunction = setInterval(function() {

    //     // Get todays date and time
    //     var now = new Date().getTime();

    //     // Find the distance between now an the count down date
    //     var distance = countDownDate - now;

    //     // Time calculations for days, hours, minutes and seconds
    //     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //     var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    //     // Output the result in an element with id="timer"
    //     document.getElementById("timer").innerHTML = "<span>" + days + "<span class='timer-cal'>d</span></span> :" + "<span>" + hours + "<span class='timer-cal'>h</span></span> :"
    //     + "<span>" + minutes + "<span class='timer-cal'>m</span></span> :" + "<span>" + seconds + "<span class='timer-cal'>s</span></span> ";
    //     document.getElementById("timer-modal").innerHTML = "<span>" + days + "<span class='timer-cal'>d</span></span> :" + "<span>" + hours + "<span class='timer-cal'>h</span></span> :"
    //     + "<span>" + minutes + "<span class='timer-cal'>m</span></span> :" + "<span>" + seconds + "<span class='timer-cal'>s</span></span> ";

    //     // If the count down is over, write some text
    //     if (distance < 0) {
    //       clearInterval(countdownfunction);
    //       document.getElementById("timer").innerHTML = "EXPIRED";
    //     }
    //   }, 1000);

    // function openNav() {
    //   document.getElementById("mySidenav").style.width = "250px";
    //   document.getElementById("main").style.display = "none";
    //   document.getElementById("close-sidebar").style.display = "inline-block";
    //   document.getElementById("dashboard-body").style.marginLeft = "250px";
    // }

    // function closeNav() {
    //   document.getElementById("mySidenav").style.width = "0";
    //   document.getElementById("main").style.display= "inline-block";
    //   document.getElementById("close-sidebar").style.display = "none";
    //   document.getElementById("dashboard-body").style.marginLeft= "0";
    // }

    $(document).ready(function() {


        // Copy Link js starts
        (function() {
            // click events
            document.body.addEventListener('click', copy, true);
            // event handler
            function copy(e) {
                // find target element
                var
                        t = e.target,
                        c = t.dataset.copytarget,
                        inp = (c ? document.querySelector(c) : null);
                // is element selectable?
                if (inp) {
                    // select text
                    inp.select();
                    try {
                        // copy text
                        document.execCommand('copy');
                        inp.blur();

                        // copied animation
                        t.classList.add('copied');
                        setTimeout(function() { t.classList.remove('copied'); }, 1500);
                    }
                    catch (err) {
                        alert('please press Ctrl/Cmd+C to copy');
                    }
                }
            }
        })();
        // Copy Link js ends



        //menu left toggle

        $('.toggle-nav').click(function() {
            // alert('done');
            $this = $(this);
            $nav = $('.nice-nav');
            //$nav.fadeToggle("fast", function() {
            //  $nav.slideLeft('250');
            //  });

            $nav.toggleClass('open');

        });
        $('.body-part').click(function(){
            $nav.addClass('open');
        });
        //  $nav.addClass('open');

        //drop down menu
        $submenu = $('.child-menu-ul');
        $('.child-menu .toggle-right').on('click', function(e) {

            $(".toggle-right").removeClass("rotate");


            e.preventDefault();
            $this = $(this);
            $parent = $this.parent().next();
            // $parent.addClass('active');
            $tar = $('.child-menu-ul');
            if (!$parent.hasClass('active')) {
                $tar.removeClass('active').slideUp('fast');
                $parent.addClass('active').slideDown('fast');
                $(this).addClass("rotate");


            } else {
                $parent.removeClass('active').slideUp('fast');
                $(".toggle-right").removeClass("rotate");
            }

        });

    });

    $(document).ready(function() {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });

</script>
@yield('script_bottom')
<script>
    $(document).ready(function() {
        $('#data-table').DataTable();
        $('#data-table-1').DataTable();
        //menu left toggle
    });

</script>
<script type="text/javascript">
    // $(document).ready (function(){
    //     $(".alert-success").fadeTo(2000, 500).slideUp(2000, function(){
    //     $(".alert-success").slideUp(2000);
    //     });
    //  });
    // $(document).ready (function(){
    //     $(".text-danger").fadeTo(2000, 500).slideUp(2000, function(){
    //     $(".text-danger").slideUp(2000);
    //     });
    //  });
    // $(document).ready (function(){
    //     $(".alert-danger").fadeTo(2000, 500).slideUp(2000, function(){
    //     $(".alert-danger").slideUp(2000);
    //     });
    //  });
</script>
</body>
</html>