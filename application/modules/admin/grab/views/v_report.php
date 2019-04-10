<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->
<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <title>Laporan - Neoxdev Indonesia</title>
    <style type="text/css">
        @page 
        {
            size: auto;   /* auto is the current printer page size */
            margin: 0mm 5mm;  /* this affects the margin in the printer settings */
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }
        
        .krs_box {
            border: 1px solid #000;
        }
        
        .krs_box * {
            text-align: center;
            padding: 0 1px;
        }
        
        .krs_box td,
        .krs_box th {
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
        }
        
        .krs_box th {
            font-size: 12px;
        }
        
        .tl {
            text-align: left;
            padding-left: 0px
        }
		
		.td {
            text-align: left;
            padding-left: 10px
        }
        
        .tc {
            text-align: center;
        }
        
        .tr {
            text-align: right;
        }
        
        .tj {
            text-align: justify;
        }
        
        .fb {
            font-weight: bold;
        }
        
        .line {
            border-bottom: 1px dashed #000;
            clear: both;
        }

    </style>
    <script type="text/javascript" src="chrome-extension://aadgmnobpdmgmigaicncghmmoeflnamj/ng-inspector.js"></script>
</head>

<body cz-shortcut-listen="true">
    <br><br><br>
    <div style="margin:0 auto;width:800px;">
        <br><br>
        <table align="center" width="800" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td width="200"><img src="<?php echo base_url() ?>assets/img/logo_neox.svg" width="120"></td>
                    <td width="350" style="font-weight:bold;text-align:center;">
                        <!--<div style="font-size:11px;">SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN KOMPUTER</div>-->
                        <!-- <div style="font-size:16px;font-family:Times New Roman,Times,serif">LAPORAN</div> -->
                        <div style="font-size:15px;">LAPORAN PRESENSI</div>
                    </td>
                    <td style="font-size:11px;text-align:right;" valign="top">
                        <div style="font-weight: bold;">ALAMAT</div>
                        <div>Jl. Candi Sambisari, Kadirojo, Purwomartani Kalasan, Sleman
                            <br>Telp. 0274-2851-004, HP : 0857-2596-4431</div>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
    	<!-- content -->
			<?php if(isset($content)) $this->load->view($content); ?>
    	<!-- /content -->
        <br><br>
<!--         <div align="center">
            Yogyakarta,   7  Maret  2018<br> DAAK<br>
            <img src="http://krs.amikom.ac.id/images/ttd-kabag-baak.png" width="150"><br> ( Armadyah Amborowati, S.Kom, M.Eng )
        </div> -->
        <br><br>
    </div>
    <div style="text-align:center;" class="tc"><a href="javascript:void()" onclick="print()">{CETAK}</a></div>
    <br><br>
</body>

</html>
