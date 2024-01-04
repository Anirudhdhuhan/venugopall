<footer>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 hidden-xs ">
                    <div class="col-md-4 col-sm-4 col-xs-4 mt-2">
                        <ul>
                            <a href="/"><li class="list">Home</li></a>
                            <a href="/video_gallery"><li class="list">Videos</li></a>
                            <a href="/news"><li class="list">News Feeds</li></a>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 mt-2 ">
                        <ul>
                            <a href="/mission"><li class="list">Mission & Vision</li></a>
                            <a href="/key-issue/1"><li class="list">Key Issues</li></a>
                            <a href="/contact_us"><li class="list">Contact Us</li></a>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 mt-2">
                        <!-- <ul>
                            <a href="/contact_us"><li class="list">Contact Us</li></a>
                            <a href="/terms"><li class="list">Terms and Conditions</li></a>
                            <a href="/privacy_policy"><li class="list">Privacy Policy</li></a>
                        </ul> -->
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 hidden-lg hidden-md hidden-sm">
                	<div class="col-md-4 col-sm-3 col-xs-6 mt-1">
                        <ul>
                            <a href="/"><li class="list">Home</li></a>
                            <a href="/video_gallery"><li class="list">Videos</li></a>
                            <a href="/news"><li class="list">News Feeds</li></a>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-3 col-xs-6 mt-1">
                        <ul>
                            <a href="/mission"><li class="list">Mission & Vision</li></a>
                            <a href="/key-issue/1"><li class="list">Key Issues</li></a>
                            <a href="/contact_us"><li class="list">Contact Us</li></a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 col-sm-6 col-xs-12 box">	                    
                        <p class="address">SC Department<br>
                            Telangana Pradesh Congress Committee
                            1st floor, Gandhi Bhavan
                            Nampally, Hyderabad<br>
							Mobile :  +91 9000000359 <br>
							Email : office@preetham.info

                            
						</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #289FDB; padding-top: 5px;">
        <div class="container">
            <div class="row">
                <div class="col-md-9 copyright">
                    <p class="copyright" style="margin-top: 0px;">© &nbsp;2020 Preetham Nagarigari. All Rights Reserved.</p>

                </div>
                <div class="col-md-3 col-xs-7 ">
                    <div class="t">
                        <p class="copyright">
                            <a href="https://www.molitics.in" class="colo-w pull-righ" blank_>
                                <p class="pull-right hidden-xs" style="margin-top: -7px;">Powered By Molitics</p>
                                <p class="pull-right hidden-sm hidden-md hidden-lg" style="margin-top: -7px;">Powered By Molitics</p>
                            </a>
                        </p>
                    </div>					
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
    function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        alert("link: " + copyText.value+" copied to clipboard.");
    }
    $('.copy_link').click(function (e) {
            var link=$(this).data('url');
            // alert(link);
            $('#myInput').attr('value',link);
            myFunction();

    });
</script>
