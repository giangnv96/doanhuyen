<?php
/**
 * Created by PhpStorm.
 * User: Tmoz
 * Date: 27/05/2018
 * Time: 3:24 CH
 */
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('2', $_SESSION['quyen'])) {
    ?>
<?php 
if (!empty($_GET['id'])) {
    $que = "select * from dky_sinhhoat where id =".$_GET['id'];
    $rows = $db -> query($que);
    $val = $rows -> fetch();
}
if (!empty($_POST['submit'])) {
$thang = $_POST['thang'];
$nam_hoc = $_POST['nam_hoc'];
$dia_diem = $_POST['dia_diem'];
$thanh_phan = $_POST['thanh_phan'];
$noi_dung = $_POST['noi_dung'];
$thoi_gian = $_POST['thoi_gian'];
if (!empty($_REQUEST['id'])) {
$query = "UPDATE `dky_sinhhoat` SET `thang`=$thang,`nam_hoc`='$nam_hoc',`dia_diem`='$dia_diem',`thanh_phan`='$thanh_phan',`noi_dung`='$noi_dung',`thoi_gian`='$thoi_gian' WHERE id=".$_REQUEST['id'];   
}
else
{
$query = "INSERT INTO `dky_sinhhoat`(`id_lop`, `thang`, `nam_hoc`, `dia_diem`, `thanh_phan`, `noi_dung`, `thoi_gian`) VALUES (".$_SESSION['lop']['id'].", $thang, '$nam_hoc', '$dia_diem', '$thanh_phan', '$noi_dung', '$thoi_gian')";
}
$save = $db->exec($query);
header('location:index.php?page=ds_dkshl');
}

 ?>
    <div class="container">
        <div class="title">
            <h3 class="text-center">Thêm mới đăng ký lịch sinh hoạt lớp</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="title">
                    <h4>Thông tin chi tiết</h4>
                </div>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo @$val['id'] ?>">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for=""> Chọn lớp:</label>
                                <?php $queryLop = "SELECT * FROM `lop` where id = ". $_SESSION['lop']['id'];
                                $row_lop = $db->query($queryLop);
                                ?>
                                <select name="lop" class="form-control" id="" disabled="">
                                    <?php foreach ($row_lop as $value) { ?>
                                        <option value="<?php echo $value['id'] ?>">
                                            <?php echo $value['malop'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for=""> Tháng:</label>
                                <select name="thang" class="form-control" id="" required="">
                                    <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <option value="<?php echo $i ?>">
                                            Tháng <?php echo $i ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for=""> Năm học:</label>
                                <select name="nam_hoc" class="form-control" id="" required="">
                                    <?php for ($i = 2000; $i <= 2030; $i++) { ?>
                                        <option value="<?php echo $i.'-'.($i+1); ?>">
                                            <?php echo $i.'-'.($i+1); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4"><label for="">Địa điểm</label></div>
                            <div class="col-sm-8">
                                <textarea name="dia_diem" id="" class="form-control" cols="30"
                                          rows="10" required=""><?php echo @$val['dia_diem'] ?></textarea>
                                <br>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><label for="">Thành phần:</label></div>
                            <div class="col-sm-8">
                                <textarea name="thanh_phan" id="" class="form-control" cols="30"
                                          rows="10" required=""><?php echo @$val['thanh_phan'] ?></textarea>
                                <br>
                            </div>


                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><label for="">Nội dung</label></div>
                            <div class="col-sm-8"><textarea name="noi_dung" id="" class="form-control" cols="30"
                                                            rows="10" required=""><?php echo @$val['noi_dung'] ?></textarea></div>
                            <br>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><label for="">Thời gian</label></div>
                            <div class="col-sm-8">
                                <input name="thoi_gian" type="date" class="form-control" required="" value="<?php echo @$val['thoi_gian'] ?>">
                            </div>
                            <br/>
                        </div>
                        <input type="submit" value="Lưu thông tin" class="btn btn-primary pull-right" name="submit">
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } else {
    header("location:index.php");
} ?>
