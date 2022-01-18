
<?php
$titre="Ajouter amis";  
?>

<form action="index.php?action=ajoutamis" method="POST">
      <div class="form-group">
        <input type="hidden" name="id" value={{$id}}>
        <input type="submit" name="accepter" class="form-control" id="Accepter" value="Ajouter en amis" >
    </div>
</form>