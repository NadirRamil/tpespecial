{include file="header.tpl"}

<ul class="list-group">
<div><h2>Los recitales de {$artista->nombre}</h2></div>
    {foreach from=$recitales item=$recital}
    <li class="list-group-item list-group-item-warning">Lugar: {$recital->lugar} - Fecha: {$recital->fecha}</li>
    {/foreach}
 
    <a href="artistas" class="btn btn-outline-success" >Volver a los artistas</a>
 
</ul>



{include file="footer.tpl"}