{include file="header.tpl"}

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Artista: {$recital->artistas}</h5>
        <p class="card-text">Fecha:{$recital->fecha}</p> 
        <p class="card-text">Lugar:{$recital->lugar}</p> 

        <a href="home" class="btn btn-primary">Volver al inicio</a> 
      
    </div>
</div>

{include file="footer.tpl"}