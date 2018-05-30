@extends ('layouts.master') @section ('title') Page 1 @endsection @section ('content')
<!-- Courses Area Start -->
<div class="courses-area pt-150 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title">
                    <img src="img/icon/section.png" alt="section-title">
                    <h2>Vous pouvez acceder </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-course">
                    <div class="course-content">
                        <h3 class="text-center">
                            <a href="{{ route('admin.listecourses') }}">Consulter les Cours</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-course">
                        <div class="course-content">
                            <h3 class="text-center">
                                <a href="course-details.html">Nouveaux Cours</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-course">
                            <div class="course-content">
                                <h3 class="text-center">
                                    <a href="course-details.html">Ajouter Notes</a>
                                </h3>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
<!-- Courses Area End -->
@endsection