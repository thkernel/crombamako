@if (!$results)
    <div class="container main-container">
        <div class="card">
            <div class="card-body text-center">
                <p>
                    <h5>Pas de résultat pour cette recherche!</h5>
                </p>
            </div>
        </div>
    </div>
@else

    <div class="container main-container">
        <div class="card">
           
            <div class="card-body">
                <div class="row">
                    @foreach($results as $result) %>
                        <div class="col-md-3">
                            <div class="user-card" >
                                <div class="user-card-body">
                                    <%= link_to  show_doctor_profile_path(doctor.user_id) do  %>
                                        <div class="user-thumb">
                                            <%= user_avatar(user(doctor.user_id), "Avatar", "")%>
                                        </div>
                                    <% end %>
                                    
                                    <div class="user-name title-bold title-black">
                                        <%= link_to "#{doctor.first_name.humanize} #{doctor.last_name.upcase}", show_doctor_profile_path(doctor.user_id) %>
                                    </div>
                                    <div class="user-location title-normal title-black-light">
                                        <%= doctor.speciality %>
                                    </div>
                                    <div class="user-location title-normal title-black-light">
                                        <%= "#{locality(doctor.locality_id).city if doctor.locality_id.present? }" %> <br />
                                        <%= "Vues: #{doctor.views }" %>

                                    </div>
                                    <div class="send-flirt">
                                        <%= link_to "PRENDRE RENDEZ-VOUS", show_doctor_profile_path(doctor.user_id) , class: "btn btn-primary"  %>
                                    </div>
                                    
                                </div> 
                                <div class="user-card-footer">
                                </div>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                    
                 </div></div>
                </div>
            </div>
        </div>
    </div>

   @endif