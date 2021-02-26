@foreach($doctors as $doctor)
    <tr>
    <td>{{$doctor->first_name}}</td>
    <td>{{$doctor->last_name}}</td>
    <td>{{$doctor->speciality->name}}</td>
    <td>{{$doctor->town->name}}</td>
    <td>{{$doctor->neighborhood->name}}</td>
    
    

    
    <td>
	    <div class="action-buttons">
			@can('update', App\Models\DoctorProfile::class)

             <a  href="{{ route('doctors.edit', $doctor->id) }}"><i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>Modifier
             </a>
            @endcan


            @can('delete', App\Models\DoctorProfile::class)
                <a href="#" data-toggle="modal" data-target="#doctor-{{$doctor->id}}-modal">
                    <i class="fa fa-trash" aria-hidden="true" title="Supprimer" ></i>
                    Supprimer
                </a>
            @endcan

            @can('delete', App\Models\DoctorProfile::class)
                @if (isDoctorEnable($doctor))
                    <a href="#" data-toggle="modal" data-target="#disable-doctor-{{$doctor->id}}-modal">
                        <i class="fa fa-pause-circle-o" aria-hidden="true" title="Désactiver" ></i>
                        Désactiver
                    </a>
                @else
                    <a href="#" data-toggle="modal" data-target="#disable-doctor-{{$doctor->id}}-modal">
                        <i class="fa fa-play-circle-o" aria-hidden="true" title="Activer" ></i>
                        Activer
                    </a>
                @endif
            @endcan

            <div id="doctor-{{$doctor->id}}-modal" class="c-modal modal fade" data-backdrop="static">
                <!-- Modal -->
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header pd-y-20 pd-x-25">
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Suppression</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <ul class="errors"></ul>
                          Etes-vous sûr de vouloir supprimer ce enregistrement?
                          <p>
                          ID: <b> {{ $doctor->fullname}} </b>
                          </p>
                        </div>
                        <div class="modal-footer">
                            
                            <a href="#" class="btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" data-dismiss= "modal" >Fermer</a>

                            

                            <form action="{{ route('doctors.destroy', $doctor->id)}}" method="post">
                                            @csrf @method('DELETE')
                                            <a href="route('doctors.destroy', $doctor->id)"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();" class="btn btn-danger tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                Oui
                                            </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Disable doctor -->
            <div id="disable-doctor-{{$doctor->id}}-modal" class="c-modal modal fade" data-backdrop="static">
                <!-- Modal -->
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header pd-y-20 pd-x-25">
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Activer/Désactiver</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <ul class="errors"></ul>
                          Etes-vous sûr de vouloir {{ isDoctorEnable($doctor) ? "désactiver" : "activer"}} ce enregistrement?
                          <p>
                          ID: <b> {{ $doctor->fullname}} </b>
                          </p>
                        </div>
                        <div class="modal-footer">
                            
                            <a href="#" class="btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" data-dismiss= "modal" >Fermer</a>

                            

                            <form action="{{ route('doctors.change_status', $doctor->id)}}" method="post">
                                            @csrf @method('PUT')
                                            <a href="route('doctors.change_status', $doctor->id)"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();" class="btn btn-danger tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                Oui
                                            </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




    </div>
</td>
    
    </tr>
@endforeach

