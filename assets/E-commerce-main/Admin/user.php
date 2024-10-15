<?php
require('require/top.php');
?>
<div class="wrwr">
    <div class="path" id="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="user.php">Liste des admins</a>
    </div>
    <div class="rowbtn">
        <div class="b">
            <input type="text" placeholder="Search by Name" id="sfield" onkeyup="search('sfield','p_name')" />
        </div>
    </div>
    <div class="catbox-row">
        <div class="catbox">
            <div class="heading">
                <div class="slno">ID</div>
                <div class="p_image">Email</div>
                <div class="p_image">Login</div>
                <div class="p_status">Date d'inscription</div>
                <div class="p_action">Action</div>
            </div>
            <div class="bspace" id="sellersecroww">
                <?php
                $query = "SELECT * FROM wp_users WHERE user_status = 0 ORDER BY ID DESC";
                $res = mysqli_query($con, $query);
                $i = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                    $idd = $row['ID'];
                    if ($row['user_status'] == 1) {
                        $st = "Active";
                        $cb = "<button class='deactive' onclick='user_acdc($idd, 1)'>
                                <i class='fa fa-eye-slash' aria-hidden='true'></i> Supprimer
                              </button>";
                    } else {
                        $st = "Deactive";
                        $cb = "<button class='active' onclick='user_acdc($idd, 1)'>
                                <i class='fa fa-eye' aria-hidden='true'></i> Supprimer
                              </button>";
                    }
                ?>
                    <div class="p_row">
                        <div class="slno"><?php echo $i; ?></div>
                        <div class="p_image">
                            <?php
                            echo $row['user_email'];
                            echo "&nbsp;";
                            if ($row['user_registered']) {
                            ?>
                               
                            <?php
                            } else {
                            ?>
                               
                            <?php
                            }
                            ?>
                        </div>
                        <div class="p_image">
                            <?php
                            echo $row['display_name'];
                            echo "&nbsp;";
                            if ($row['user_status'] == 1) {
                            ?>
                               
                            <?php
                            } else {
                            ?>
                                
                            <?php
                            }
                            ?>
                        </div>
                        <div class="p_status">
                            <span>
                                <?php
                                echo htmlspecialchars($row['user_registered']);
                                ?>
                            </span>
                        </div>
                        <div class="p_action">
                            <?php echo $cb; ?>
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
      
    </div>
</div>
<?php
require('require/foot.php');
?>
