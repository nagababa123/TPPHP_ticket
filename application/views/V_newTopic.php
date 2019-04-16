<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Ajouter un nouveau Topic à  <?php echo $theme["Intitule"]; ?></h1>

    </div>

    <form action="<?php echo site_url();?>/C_topic/new_topic/<?php echo $theme["idTheme"]; ?>" method="post">
        <div class="form-group">
            <label for="TitreTopic">Titre de Topic</label>
            <input type="text" class="form-control" name="titretopic"  aria-describedby="emailHelp" >

        </div>
        <div class="form-group">
            <label for="Detailtopic">Detail de Topic</label>
            <textarea type="text" class="form-control" name="detailtopic" ></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Valider</button>
    </form>

</div>
