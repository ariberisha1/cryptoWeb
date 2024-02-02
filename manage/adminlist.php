<?php

$user = new Users;
$info = $user->fetchAllByRole('admin');

$nr = 0;


if(isset($_GET['deleteuserbyid'])){
    if($_GET['deleteuserbyid'] == $_SESSION['user_id']){
        utility::setmessage('error', 'Nuk mundesh me fshi veten!', '/manage/index.php');
        exit();
    }
    $user->deleteuser($_GET['deleteuserbyid'],'admin');
}
?>


<div class="page-head">
    <table align="center" width="73%">
        <td>
            <font class="title-head">Lista e Adminave
        </td>
    </table>
</div>
<br>
<br>
<br>
<div id="page" style="width: 80%;">
    <div class="newsbox">
        <table align="center" width="95%">
            <tr>
                <td>
                    <h3 style="margin: 1px; margin-bottom: 6px;"><i class="fas fa-user-edit"></i>&nbsp;Lista e Adminave <i class="fas fa-angle-down"></i></h3>
                    <div style="padding:2px;">
                        <font>
                            K&euml;tu mund&euml; t&euml; shikoni adminat, ku mund ti modifikoni ata!<br>
                        </font>
                    </div>
            </tr>
            </td>
        </table>
        <table align="center" width="100%">

            <br>
            <table width="100%" id="myTable" cellspacing="0" cellpadding="5" class="data_list">
                <thead>
                    <tr>
                        <th width="35px" style="font-size:13px;">Id</th>
                        <th style="text-align:left;">Emri</th>
                        <th style="text-align:left;">Mbiemri</th>
                        <th style="text-align:left;">Email</th>
                        <th width="120px" style="text-align: left;"></th>
                    </tr>
                </thead>
                <?php foreach ($info as $user) : ?>
                    <tr>
                        <td style="text-align:center;"><b><?php echo ++$nr; ?></b></td>
                        <td style="text-align:left;"><b><?php echo $user['name'] ?></b></td>
                        <td style="text-align:left;"><b><?php echo $user['surname'] ?></b></td>
                        <td style="text-align:left;"><b><?php echo $user['email'] ?></b></td>
                        <td> <button type="submit" onclick="window.location.href='/manage/userlist.php?type=admin&deleteuserbyid=<?php echo $user['id'] ?>'" class="btndefaultred"><i class="fas fa-trash"></i> Delete </button></td>
                    </tr>
                <?php endforeach;
                if ($nr == 0) {
                    echo '<tr><td style="text-align:center" colspan="11">Nuk ka asnje admin ne list.</td></tr>';
                } ?>