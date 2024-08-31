{{ include('layouts/header.php', {title:'Articles'})}}
<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        {% for article in articles %}
            <div class="card border-light bg-light mb-4">  
                <div class="card-body">
                    <h1>{{ article.titre }}</h1>
                    <p>{{ article.contenu }}</p>
                    <p>Publié le : {{ article.date_publication }}</p>
                    <h2>Commentaires</h2>
                    {% for commentaire in article.commentaires %}
                        <div class="comment">
                            <p>{{ commentaire.contenu }}</p>
                            <p>Publié le : {{ commentaire.date_publication }}</p>
                            {% if session.privilege_id == 1 %}
                            <div class="d-flex justify-content-between">
                                <a href="{{ base }}/commentaire/edit?id={{ commentaire.id }}" class="btn btn-outline-primary">Modifier</a>
                                <form action="{{ base }}/commentaire/delete" method="post">
                                    <input type="hidden" name="id" value="{{ commentaire.id }}">
                                    <button class="btn btn-outline-danger">Supprimer</button>
                                </form> 
                            </div>
                            {% endif %}
                        </div>
                        <hr>
                    {% endfor %}
                    <a href="{{ base }}/commentaire/create?id_article={{ article.id }}" class="btn btn-outline-success">Ajouter un commentaire</a>
                </div>
            </div>
        {% endfor %}
    </div>
</div>
{{ include('layouts/footer.php')}}
