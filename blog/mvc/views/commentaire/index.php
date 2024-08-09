{{ include('layouts/header.php', {title:'Commentaires'})}}


    <h2>Commentaires</h2>
    <div class="row">
        {% for commentaire in commentaires %}
        <div class="col-md-4">
            <div class="card text-white bg-info mb-4">
                <div class="card-body">
                    <p class="card-text">{{ commentaire.contenu }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{base}}/commentaire/edit?id={{ commentaire.id }}" class="btn btn-primary">Modifier</a>
                        <form action="{{base}}/commentaire/delete" method="post">
                            <input type="hidden" name="id" value="{{ commentaire.id }}">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {% endfor %}
    </div>
    <a href="{{base}}/commentaire/create" class="btn btn-outline-success">New Commentaire</a>

  
{{ include('layouts/footer.php')}}
