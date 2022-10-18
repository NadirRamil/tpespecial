{include file="header.tpl"}
<div class="col-md-4">
    <h2>{$titulo}</h2>
    <form class ="form-alta" action="editartista/{$artista->artista_id}" method="POST">
    <a href="artistas" class="btn btn-primary">Volver a los artistas</a> 
        <div class="formulario"><p>Nombre: </p><input value="{$artista->nombre}" type="text" name="nombre" id="nombre" required></div>
        <div class="formulario"><p>Nacionalidad: </p><input value="{$artista->nacionalidad}" type="text" name="nacionalidad" id="nacionalidad" required></div>
        
        <div class="formulario"><button class="btn btn-primary"> Editar </button></div>
    </form>
</div>
{include file="footer.tpl"}