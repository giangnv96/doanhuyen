<?php
if($_SESSION['login_us']=='ok'&&!empty($_SESSION['quyen'])&&in_array('1', $_SESSION['quyen']))
{
if($_SERVER["REQUEST_METHOD"]=="POST")
{

$error = array();
if(!empty($_POST['tendangnhap'])){
$tendn=$_POST['tendangnhap'];
$kt="select * from users where username='$tendn'";
$kt1=$db->query($kt);
$kt2=$kt1->fetch();
}
if(isset($kt2) && $kt2>0)
{
$error[]='trungten';
}
if(!empty($_POST['matkhau']))
{
$matkhau=md5($_POST['matkhau']);
}
if(!empty($_POST['hoten']))
{
$hoten=$_POST['hoten'];
}
if(!empty($_POST['diachi']))
{
$diachi=$_POST['diachi'];
}
if(!empty($_POST['email']))
{
$email=$_POST['email'];
}
if(!empty($_POST['sdt']))
{
$sdt=$_POST['sdt'];
}
if(!empty($_POST['quyen']))
{
$quyen=implode(',',$_POST['quyen']);
}
if (isset($error)) {
$query = "insert into users(username, password, hoten ,diachi , email, sdt, ngaytao, quyen) values('$tendn', '$matkhau', '$hoten', '$diachi', '$email', '$sdt', now(), '$quyen')";
$count=$db->exec($query);
if($count>0)
{
// header("location:?page=login");
echo "<script>"
. "if(confirm('Đăng ký thành viên thành công')==true)"
. "{"
. "window.location='index.php?page=nguoidung'"
. "}</script>";
}
else
{
echo "<script>alert('Tạo tài khoản thất bại')</script>";
}
}
else
{
echo "<script>alert('Đăng ký thất bại')</script>";
}
}
}
else
{header("location:index.php");}
 ?>

<div class="span9">
    <form action="" method="post">
        <fieldset>
            <div class="control-group">
                <label class="control-label tieude">Tên đăng nhập:</label>
                <div class="controls">
                    <input type="text" class="form-control" name="tendangnhap" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label tieude">Mật khẩu:</label>
                <div class="controls">
                    <input type="password" class="form-control" name="matkhau" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label tieude">Họ và tên:</label>
                <div class="controls">
                    <input type="text" class="form-control" name="hoten" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label tieude">Địa chỉ:</label>
                <div class="controls">
                    <input type="text" class="form-control" name="diachi" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label tieude">Email:</label>
                <div class="controls">
                    <input type="email" class="form-control" name="email" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label tieude">Số điện thoại</label>
                <div class="controls">
                    <input type="text" class="form-control" name="sdt" required="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label tieude">Quyền:</label>
                <input type="checkbox" name="quyen[]" value="1">Admin
                <input type="checkbox" name="quyen[]" value="2">Giao viên
                <input type="checkbox" name="quyen[]" value="3">Thanh tra
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
        </form>
    </div>