<?php
 require('require/top.php');
 ?>

<div class="wrwr">
    <div class="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Acceuil</a>
        <span>/</span>
        <a href="categories.php">Formation</a>
    </div>
    <div class="rowbtn">
        <div class="b">
            <button class="add" onclick="showadctfa()">
                <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Ajouter une formation
            </button>
            <input type="text" placeholder="Rechercher une formation" id="sfield" onkeyup="search('sfield','catname')" />
        </div>
    </div>
    <div class="catbox-row">
        <div class="catbox">
            <div class="heading">
                <div class="sl">ID</div>
                <div class="catnameh">Formation</div>
                <!--<div class="nos">Date d'inscription</div>-->
                <div class="status">
                    <span class="active_span">Statut</span>
                </div>
                <div class="action">Action</div>
            </div>
            <div class="bspace" id='catrows'>
                <?php
            $query="select * from categories order by id desc";
            $res=mysqli_query($con,$query);
            $i=1;
            while($row=mysqli_fetch_assoc($res)){
            $st='';
            $cb='';
            $idd=$row['id'];
            if($row['status']==1){
            $st="Actif";
              $cb="<button class='inactif' onclick='cat_acdc($idd, 0)'>
              <i class='fa fa-eye-slash' aria-hidden='true'></i>inactif
            </button>";
            }else{
            $st="inactif";
            $cb="
            <button class='active' onclick='cat_acdc($idd, 1)'>
            <i class='fa fa-eye' aria-hidden='true'></i>Actif
          </button>
            ";
            }
        ?>
                <div class="detailrow" >
                    
                    <div class="sl"><?php echo $i; ?></div>
                    <div class="catname"><?php echo $row['category']; ?></div>
                    <?php 
                    $nm=$row['id'];
                    $q="select * from subcategories where cat_id='$nm'";
                    $r=mysqli_query($con,$q);
                    $nor=mysqli_num_rows($r);
                  ?>
                   <!-- <div class="nos"><?php echo $nor; ?></div>-->
                    <div class="status">
                        <span class="active_span">
                            <?php echo $st; ?>
                        </span>
                    </div>
                    <div class="action">
                        <button class="edit" onclick="editcat(<?php echo $row['id']; ?>)">
                            <i class="fa fa-pen" aria-hidden="true"></i>Modifier
                        </button> 
                        <!--php echo $cb; -->
                        <button class="delete" onclick="catdelete(<?php echo $row['id']; ?>)">
                            <i class="fa fa-trash" aria-hidden="true"></i>supprimer
                        </button>
                    </div>
                </div>
                <?php
     $i++;
  }
?>
            </div>
        </div>
    </div>
    <div class="row" style="
              display: block;
              margin-bottom: 2rem;
              font-size: 1.2rem;
              color: #6a7187;
            ">
        @ Developed by Ayondip Jana
    </div>
</div>

<?php
 require('require/foot.php');
?>