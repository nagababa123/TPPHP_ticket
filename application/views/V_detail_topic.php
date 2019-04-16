<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">  Topic : <?php echo $topic["titre"]; ?></h1>

    </div>


    <!-- Content Row -->
    <div class="row">
        <?php echo $topic["texte"]; ?>

        <br/>
        <?php foreach ($list_attachment as $attachment) { ?>
            <img src="<?php echo base_url("assets/img/" . $attachment["url"]); ?>" />
        <?php } ?>
            

    </div>
</div>
