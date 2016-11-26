<!DOCTYPE html>

<?php
session_start();
if(empty($_SESSION['kosong']))
header("location:admlogin.php");

extract($_POST);
?>
            <?php include'meta.php'; ?>
            <?php include'header.php'; ?>
            <?php include'menu.php';?>
            		<?php include_once("./../php/analyticstracking.php") ?>
                    <!-- Main content -->
                    <section id="main-content">
                      <section class="wrapper">
                        <?php
                          if(isset($_GET['page']))
                          {
                             switch($_GET['page'])  {
                                //case 'calon': include'calon.php'; break;
                                case 'calon': include'listCalon.php'; break;
                                case 'pilihcalon': include 'menupemilihan.php'; break;
                                case 'tambahcalon': include 'tambah.php'; break;
                                case 'tambahriwayat': include 'tambahriwayatcalon.php'; break;
                                case 'tambahujipublik': include 'tambahujipublik.php'; break;
                                case 'set': include 'setting.php'; break;
                                case 'dokumen': include 'doc.php'; break;
                                case 'tambahdocument': include 'tambahdoc.php'; break;
                            }
                          }
                          else{
                            include 'dashboard.php';
                          }
                          ?>
                        </section>
                    </section>

                <!-- /.content-wrapper -->
                <?php include "footer.php" ?>
