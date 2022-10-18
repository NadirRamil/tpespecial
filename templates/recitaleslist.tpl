{include file="header.tpl"}

<!-- tabla de recitales -->
<table class="table">
  <thead>
      <tr>
      <th scope="col">Artista</th>
        <th scope="col">Fecha</th>
        <th scope="col">Lugar</th>
        {if !isset($smarty.session.USER_ID)}
          {else}
        <th scope="col">Borrar</th>
        <th scope="col">Editar</th>
          {/if}
    </tr>
  </thead>
  <tbody>
    {foreach from=$recitales item=$recital}
        <tr>
        <th scope="row"><a href="viewrecital/{$recital->id_recital}" class="mylists" >{$recital->artistas}</a></th>
        <td>{$recital->fecha}</td>
        <td>{$recital->lugar}</td>
        {if !isset($smarty.session.USER_ID)} 
          {else}
          <td><a class="btn btn-outline-danger" href="deleterecital/{$recital->id_recital}">Borrar</a> </td>
          <td><a class="btn btn-outline-success" href="editrecitalesform/{$recital->id_recital}">Editar</a></td>
        {/if}

        </tr>
    {/foreach}
  </tbody>
</table>
<div>
{if !isset($smarty.session.USER_ID)} 
  {else}
  {include file="addrecital.tpl"}
{/if}
</div>
{include file="footer.tpl"}
