<!-- Banner Area Start -->
@if(Auth::check())
<div class="banner-area-wrapper">
    <div class="banner-area text-center">	
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner-content-wrapper">
                        <div class="banner-content">
                            <h2>{{$message}}</h2> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endif
<!-- Banner Area End -->