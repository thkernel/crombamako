@extends("layouts.dashboard")

@section("content")

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card mg-t-30 mg-b-30">
                <div class="card-header align-items-center">
                    <div class="row">
                            <div class="col-md-12">
                              <div class="profile-section-title">
                                <div class="pull-left">
                                  <span>
                                      <i class="fa fa-home" aria-hidden="true"></i>
                                  </span>
                                  <span><h4>Mon organisation</h4></span>
                                </div>
                                <div class="pull-right">
                                  <span>
                                    <a href="{{ route('organizations.edit', $organization->id)}}">Mettre à jour </a>
                                  </span>
                                </div>
                              </div><!-- end section title -->
                            </div><!-- end col -->
                          </div><!-- end row -->
                </div>
                <div class="card-body">
                    <div class="profile">
                        <!-- Start section -->
                        <div class="profile-section-bacic-infos">
                          
                          <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-section-body">
                                        <table class="table table-striped">
                                            <tbody>
                                                @include("organizations/_index")
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end section -->
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection