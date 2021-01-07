<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-09-29 08:14:55 --> Query error: Table 'sim_magang.nilai' doesn't exist - Invalid query: SELECT pegawai_id, nama, SUM(nilai) as nilai, MONTH(tanggal) as date_only, tanggal,
				COUNT(pegawai_id) as jumlah_nasabah FROM nilai n join sim_magang.peserta_magang pm on 
				n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on 
				pm.nomor_register=pmp.nomor_register where pmp.`aktif`='1' AND pmp.id_pembimbing_magang='312' AND 
				n.nilai < 3 GROUP BY pegawai_id ORDER BY jumlah_nasabah DESC LIMIT 5
ERROR - 2020-09-29 08:14:55 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\magang.bankjateng.co.id\application\models\Rating_model.php 118
ERROR - 2020-09-29 08:15:11 --> Query error: Table 'sim_magang.nilai' doesn't exist - Invalid query: SELECT pegawai_id, nama, SUM(nilai) as nilai, MONTH(tanggal) as date_only, tanggal,
				COUNT(pegawai_id) as jumlah_nasabah FROM nilai n join sim_magang.peserta_magang pm on 
				n.pegawai_id=pm.kode_register join sim_magang.pembimbing_magang_peserta pmp on 
				pm.nomor_register=pmp.nomor_register where pmp.`aktif`='1' AND pmp.id_pembimbing_magang='312' AND 
				n.nilai < 3 GROUP BY pegawai_id ORDER BY jumlah_nasabah DESC LIMIT 5
ERROR - 2020-09-29 08:36:48 --> Query error: Table 'sim_magang.setup_deadline_approval_harian' doesn't exist - Invalid query: SELECT *
FROM `setup_deadline_approval_harian`
