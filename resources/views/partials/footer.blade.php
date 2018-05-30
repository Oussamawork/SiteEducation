    <footer class="footer-area">
        <div class="main-footer"></div>
        @if( !Auth::check())
        <div class="footer-bottom text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-widget pr-60">
                            <div class="footer-logo pb-25">
                                <a href="index.html">
                                    <img src="img/logo/footer-logo.png" alt="eduhome">
                                </a>
                            </div>
                            <p>Hi ! For full access to courses you'll need to take a minute to create a new account for yourself
                                on this web site.. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="footer-bottom text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p>Designed By
                            <a href="https://devitems.com/" target="_blank">HasTech</a>2018. Programmed by Louhaibi Oussama </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
