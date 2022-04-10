<?php
    require('./include/connection.php');
    if(isset($_POST['data'])){
        $a = $_POST['data'];
    }
    if(isset($_POST['data_a'])){
        $aa = $_POST['data_a'];
    }
    if(empty($a)){
        $a = "sssssssssssssssssssssssssss";
    }
    if(empty($aa)){
        $aa = "sssssssssssssssssssssssssss";
    }
    $sql = "select * from job_information where (job_title like '%$a%' or salary like '%$a%' or job_type like '%$a%') or address like '%$aa%'";
    foreach($conn->query($sql) as $row){
        ?>
        <div class="item_job search_job_a">
                            <a href="detail_job.php?hr_id=<?php echo $row['account_id'];?>&job_id=<?php echo $row['job_id']?>">
                                <div class="details " style="display: flex;">
                                <div class="left">
                                <img src="<?php echo $row['logo'];?>" class="img_search" alt="">
                                </div>
                                <div class="right">
                                <h4 class="mt0 pt0"><?php echo $row['job_title']?></h4>
                                <span class="text-thm4">$ <?php echo $row['salary']?></span>

                                <i class="fa-solid fa-location-dot"></i>
                                </span><a href="#"><?php echo $row['address']?></a>
                                <h5 style="display: inline;" class="job_chedule text-thm2 mt0"><?php echo $row['job_type']?></h5>
                                </div>
                                </div>
                    </a>
        </div>
        <?php
    }
?>