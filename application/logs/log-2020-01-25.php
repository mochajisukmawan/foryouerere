<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-01-25 06:16:28 --> 404 Page Not Found: Faviconico/index
ERROR - 2020-01-25 16:02:44 --> 404 Page Not Found: Faviconico/index
ERROR - 2020-01-25 16:05:18 --> 404 Page Not Found: Assets/file
ERROR - 2020-01-25 16:59:58 --> 404 Page Not Found: Faviconico/index
ERROR - 2020-01-25 16:59:59 --> 404 Page Not Found: Faviconico/index
ERROR - 2020-01-25 17:08:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `tanggal_mulai` <= '2020-01-25' AND `tanggal_selesai` >= '2020-01-25'' at line 5 - Invalid query: SELECT *
FROM `pembimbing_magang_peserta`
JOIN `pembimbing_magang` ON `pembimbing_magang`.`id_pembimbing_magang` = `pembimbing_magang_peserta`.`id_pembimbing_magang`
JOIN `unit_kerja` ON `pembimbing_magang`.`unit_kerja_id` = `unit_kerja`.`kode_unit`
WHERE `nomor_register` = AND `tanggal_mulai` <= '2020-01-25' AND `tanggal_selesai` >= '2020-01-25'
ERROR - 2020-01-25 17:08:53 --> Severity: error --> Exception: Call to a member function row() on boolean /var/www/magang.bankjateng.co.id/application/models/Global_model.php 384
ERROR - 2020-01-25 17:08:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND `tanggal_mulai` <= '2020-01-25' AND `tanggal_selesai` >= '2020-01-25'' at line 5 - Invalid query: SELECT *
FROM `pembimbing_magang_peserta`
JOIN `pembimbing_magang` ON `pembimbing_magang`.`id_pembimbing_magang` = `pembimbing_magang_peserta`.`id_pembimbing_magang`
JOIN `unit_kerja` ON `pembimbing_magang`.`unit_kerja_id` = `unit_kerja`.`kode_unit`
WHERE `nomor_register` = AND `tanggal_mulai` <= '2020-01-25' AND `tanggal_selesai` >= '2020-01-25'
ERROR - 2020-01-25 17:08:58 --> Severity: error --> Exception: Call to a member function row() on boolean /var/www/magang.bankjateng.co.id/application/models/Global_model.php 384
