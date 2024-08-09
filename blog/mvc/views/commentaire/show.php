{{ include('layouts/header.php', {title:'Commentaire'})}}
<div class="row">
    <div class="card border-light bg-light mb-4">  
        <div class="card-body">
            <h2>Commentaire</h2>
            <p>{{ commentaire.contenu }}</p>
            <p>Publié le : {{ commentaire.date_publication }}</p>
            <div class="d-flex justify-content-between">
                <a href="{{base}}/commentaire" class="btn btn-outline-primary">Enregistrer</a>
                <form action="{{base}}/commentaire/delete" method="post">
                    <input type="hidden" name="id" value="{{ commentaire.id }}">
                    <button class="btn btn-outline-danger">Delete</button>
                </form> 
            </div> 
        </div>
    </div>
</div>
{{ include('layouts/footer.php')}}
