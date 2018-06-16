

<?php
ob_start();
?>
<?php
if ($_SESSION['login_us'] == 'ok' && !empty($_SESSION['quyen']) && in_array('4', $_SESSION['quyen'])) {

if (!empty($_POST['submit'])) {
$id_lop = $_POST['id_lop'];
$nguoi_tao = $_POST['nguoi_tao'];
$ngay_tao = $_POST['ngay_tao'];
$si_so = $_POST['si_so'];
$di_hoc = $_POST['di_hoc'];
$di_muon = $_POST['di_muon'];
$hoc_ho = $_POST['hoc_ho'];
$tiet_bd = $_POST['tiet_bd'];
$tiet_kt = $_POST['tiet_kt'];
$noi_dung = $_POST['noi_dung'];

$query="INSERT INTO `bc_loptruong`(`id_lop`, `nguoi_tao`, `ngay_tao`, `si_so`, `di_hoc`, `di_muon`, `hoc_ho`, `tiet_bd`, `tiet_kt`, `noi_dung` , `created`) VALUES ($id_lop, '$nguoi_tao', '$ngay_tao' , $si_so , $di_hoc , $di_muon , $hoc_ho , '$tiet_bd' , '$tiet_kt' , '$noi_dung' , now())";
echo $query;
$insert = $db -> exec($query);
header("location:index.php?page=bcLT&stt=1");
}
?>
<script>
    <?php 
     if (!empty($_GET['stt'])&&$_GET['stt']==1) {
    ?>
    alert("Tạo báo cáo thành công");
    window.location.href = "index.php?page=bcLT";
    <?php
     }
     ?>
</script>
<br>
        <div class="title">
            <h3>
                Thêm mới báo cáo hàng ngày
            </h3>
        </div>
            <div class="title">
                <h4>Thông tin chi tiết</h4>
                <form action="" method="post">
                    <input type="hidden" name="id_lop" value="<?php echo @$_SESSION['loptruong']['id_lop'] ?>">
                    <input type="hidden" name="nguoi_tao" value="<?php echo @$_SESSION['loptruong']['hoten'] ?>">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?php $today = getdate(); ?>
                                <label for="">Ngày:</label>
                                <input type="date" name="ngay_tao" value="<?php echo date("Y-m-d", $today[0]) ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                        <div>
                            <p class="blue"><b>Thông tin sĩ số lớp</b></p>
                            <div class="form-group">
                                <div class="col-sm-4">Sỹ số lớp:</div>
                                <div class="col-sm-8"><input name="si_so" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" required=""
                                                             value="<?php echo @$val['si_so'] ?>"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">Số sinh viên đi học:</div>
                                <div class="col-sm-8"><input name="di_hoc" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" required=""
                                                             value="<?php echo @$val['si_so'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">Số sinh viên đi muộn:</div>
                                <div class="col-sm-8"><input name="di_muon" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" required=""
                                                             value="<?php echo @$val['si_so'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">Số sinh viên học hộ:</div>
                                <div class="col-sm-8"><input name="hoc_ho" type="number" min="0" placeholder="VD: 40"
                                                             class="form-control" required=""
                                                             value="<?php echo @$val['si_so'] ?>"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">Tiết bắt đầu:
                                    <input type="text" name="tiet_bd" class="form-control" required="">
                                </div>
                                <div class="col-sm-6">
                                    Tiết kết thúc:
                                    <input type="text" name="tiet_kt" class="form-control" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">Nội dung chi tiết:</div>
                                <div class="col-sm-8">
                                        <textarea name="noi_dung" rows="4" class="form-control"
                                                  placeholder="Thông tin sinh viên vi phạm kỷ luật" required=""
                                                  value=""><?php echo @$val['noi_dung'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-primary" name="submit" value="Lưu thông tin">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } else {
    header("location:index.php");
} ?>