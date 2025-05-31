CREATE TABLE IF NOT EXISTS `tm_halaman` (
`id_halaman` int(11) NOT NULL,
  `kode_halaman` varchar(100) NOT NULL,
  `id_hadiah` int(11) NOT NULL,
  `total_pemenang` int(11) NOT NULL COMMENT 'Jumlah pemenang sekali muncul',
  `tgl_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_create` varchar(20) NOT NULL DEFAULT 'SYSTEM'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `tm_halaman`
 ADD PRIMARY KEY (`id_halaman`);
 
 ALTER TABLE `tm_halaman`
MODIFY `id_halaman` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;