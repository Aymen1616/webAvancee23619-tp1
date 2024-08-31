{{ include('layouts/header.php', {title:'Envoyer un e-mail'})}}
<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="card border-light bg-light mb-4">  
            <div class="card-body">
                <h2>Envoyer un e-mail</h2>
                <form method="post" action="{{ base }}/contact/send">
                <div class="form-group">
                    <label>À
                        <input type="email" name="email" required>
                    </label>
                </div>
                <div class="form-group">
                    <label>Sujet
                        <input type="text" name="subject" required>
                    </label>
                </div>
                <div class="form-group">
                    <label>Message
                        <textarea class="form-control" name="message" rows="3"cols="50" required></textarea>
                    </label>
                </div> 
                    <input type="submit" class="btn btn-primary btn-block" value="Envoyer">
                </form>

            </div>
        </div>
    </div>
</div>
{{ include('layouts/footer.php')}}
