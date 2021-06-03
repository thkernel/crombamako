@foreach($document_requests as $document_request)
    <tr>
        <td>{{$document_request->created_at}}</td>
        <td>{{$document_request->document_type->name}}</td>

        <td>{{$document_request->doctor->doctor_order->reference}} </td>


        <td>{{$document_request->doctor->full_name}}</td>
        <td>{{$document_request->status}}</td>
    
   
    
        <td>
          <div class="action-buttons">
			     @if (!current_user()->isDoctor())
            @if ($document_request->status != "Validée")
              <a href="#" data-toggle="modal" data-target="#validate-document-request-{{$document_request->id}}-modal">
                <i class="fa fa-check" aria-hidden="true" title="Valider" ></i>
                Valider
              </a>

            @else

               <a href="#" data-toggle="modal" data-target="#cancel-document-request-{{$document_request->id}}-modal">
                <i class="fa fa-ban" aria-hidden="true" title="Valider" ></i>
                Annuler
              </a>
            @endif
          @endif



            <a  href="{{ route('document_requests.edit', $document_request->id) }}">
              <i class="fa fa-pencil" aria-hidden="true" title="Modifier"></i>
              Modifier
            </a>

            <a  href="{{ route('download_document_request_pdf_path', $document_request->id) }}">
              <i class="fa fa-file-pdf-o" aria-hidden="true" title="Télécharger"></i>
              Télécharger
            </a>



            



            <div id="validate-document-request-{{$document_request->id}}-modal" class="c-modal modal fade" data-backdrop="static">
              <!-- Modal -->
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Validation</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <ul class="errors"></ul>
                    Etes-vous sûr de vouloir valider cette demande?
                    <p>
                    ID: <b> {{ $document_request->id}} </b>
                    </p>
                  </div>
                  <div class="modal-footer">
            
                    <a href="#" class="btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" data-dismiss= "modal" >Fermer
                    </a>

            

                    <form action="{{ route('document_requests.validate',$document_request->id)}}" method="post">
                          @csrf @method('PUT')
                          <a href="route('document_requests.validate', $document_request->id)"
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


<div id="cancel-document-request-{{$document_request->id}}-modal" class="c-modal modal fade" data-backdrop="static">
<!-- Modal -->
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header pd-y-20 pd-x-25">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Annulation</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <ul class="errors"></ul>
          Etes-vous sûr de vouloir annuler cette demande?
          <p>
          ID: <b> {{ $document_request->id}} </b>
          </p>
        </div>
        <div class="modal-footer">
            
            <a href="#" class="btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" data-dismiss= "modal" >Fermer</a>

            

            <form action="{{ route('document_requests.cancel', $document_request->id)}}" method="post">
                            @csrf @method('PUT')
                            <a href="route('document_requests.cancel', $document_request->id)"
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
</td>
    
    </tr>
@endforeach