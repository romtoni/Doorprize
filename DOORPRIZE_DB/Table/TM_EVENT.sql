CREATE TABLE IF NOT EXISTS `tm_event` (
`id_event` int(11) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `home` varchar(100) NOT NULL,
  `prioritas` varchar(1) NOT NULL,
  `tgl_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_create` varchar(20) NOT NULL DEFAULT 'SYSTEM'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `tm_event`
 ADD PRIMARY KEY (`id_event`);
 
 ALTER TABLE `tm_event`
MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;