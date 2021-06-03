
<form action="{{ route('contact_forms.store') }}" method="POST">
 @csrf
  <div class="form-group"> 

    <label for="full_name">Nom et Prénom</label>
    <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Nom et Prénom">

    </div>
    <div class="row"> 
      <div class="col-md-6"> 
        <div class="form-group"> 

          <label for="phone">Téléphone</label>
          <input type="text" id="phone" name="phone" class="form-control" placeholder="Téléphone">

        </div>
      </div>

      <div class="col-md-6"> 
        <div class="form-group"> 

          <label for="email">Email</label>
          <input type="text" id="email" name="email" class="form-control" placeholder="Email">

        </div>
      </div>
    </div>

  <div class="form-group"> 
    <label for="subject">Objet</label>
    <input type="text" id="subject" name="subject" class="form-control" placeholder="Objet">
  </div>
    
    <div class="form-group"> 
      <label for="message">Message</label>
      <textarea  name="message" id="editor" class="form-control" placeholder="Votre message ici" style="height:200px"></textarea>
    </div>

    <div class="form-group"> 
      <input type="submit" value="Envoyer" class="btn btn-primary">
    </div>
  </form>
