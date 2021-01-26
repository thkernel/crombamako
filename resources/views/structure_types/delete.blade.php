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
  ID: <b> <%= @permission.id %></b>
  </p>
  </div>
  <div class="modal-footer">
    <%= link_to "Non", "#", class: "btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1", data: { dismiss: "modal" } %>
    <%= link_to "Oui", permission_path(@permission), method: :delete, remote: true, class: "btn btn-danger tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" %>
  </div>
  </div>
</div>