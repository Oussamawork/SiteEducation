@extends ('layouts.master') 

@section ('title') 
    Page 1 
@endsection 

@section ('content')
<!-- Courses Area Start -->
<div class="courses-area pt-150 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title">
                    <img src="{{ asset('img/icon/section.png') }}" alt="section-title">
                    <h2>Vous pouvez acceder </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-course">
                    <div class="course-content">
                        <h3 class="text-center">
                            <a href="{{ route('admin.listedocuments') }}">Consulter Documents</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-course">
                        <div class="course-content">
                            <h3 class="text-center">
                            <a href="{{ route('admin.ajoutdocument')}}">Nouveaux Documents</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-course">
                            <div class="course-content">
                                <h3 class="text-center">
                                    <a href="{{ route('admin.addStudy') }}" >Ajouter Filière \ Module</a>
                                </h3>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
<!-- Courses Area End -->
@endsection