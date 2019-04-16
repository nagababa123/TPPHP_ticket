<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Liste des Topic de : <?php echo $theme["Intitule"]; ?></h1>

    </div>
    <?php foreach ($list_topic as $topic) {
        ?>
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo site_url("C_topic/detail_topic/" . $topic["idTopic"]); ?>" ><?php echo $topic["titre"]; ?></a></h6>
        </div>
    <?php }
    ?>
    </br> </br>
    <?php
    if (isset($_SESSION["loginok"])) {
        ?>

        <a href="<?php echo site_url("C_topic/ajoute_detail_topic/" . $theme["idTheme"]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">create Topic</a>
        <?php }
    ?>

    <!-- Content Row -->
    <div class="row">


    </div>
</div>
