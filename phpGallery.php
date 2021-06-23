<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
    function getImage(){
        $size = 0;
        $storedImage = preg_grep('/^([^.])/', scandir('./assets/img'));
        $count = 0;
        foreach($storedImage as $imageName){
            $imageId = substr($imageName, 0, 2);
            if ($imageId == $_SESSION['id'] && $_SESSION['id'] != 'demo') {
                $size = $size + filesize('./assets/img/' . $imageName);
                $count++;
            ?>
                <div class="card col-md-6 col-sm-12 col-lg-4 p-2 border-0 bg-transparent" width="100%">
                    <a class="border border-1 border-white" href="preview.php?name=<?= $imageName ?>">
                        <img  src="./assets/img/<?= $imageName ?>" class="card-img-top" alt="<?= $imageName ?>">
                    </a>
                </div>
            <?php
            } elseif ($_SESSION['id'] == 'demo') {
                $size = $size + filesize('./assets/img/' . $imageName);
                ?>
                <div class="card col-md-6 col-sm-12 col-lg-4 p-2 border-0 bg-transparent" width="100%">
                    <a class="border border-1 border-white" href="preview.php?name=<?= $imageName ?>">
                        <img src="./assets/img/<?= $imageName ?>" class="card-img-top" name="$imageName" alt="<?= $imageName ?>">
                    </a> 
                </div>
                <?php
                $count++;
            }
        }
        if ($count == 0) {
            ?>
            <h3>Vous n'avez aucune photo</h3>
            <?php
        }
        $_SESSION['size'] = $size;
    }
} else {
    header('location: index.php');
}

?>