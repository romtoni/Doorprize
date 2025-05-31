CREATE TABLE IF NOT EXISTS `tm_hadiah` (
`id_hadiah` int(11) NOT NULL,
  `nama_hadiah` varchar(100) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `max_jml` int(11) NOT NULL,
  `prioritas` varchar(1) NOT NULL,
  `id_event` int(11) NOT NULL,
  `tgl_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_create` varchar(20) NOT NULL DEFAULT 'SYSTEM'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `tm_hadiah`
 ADD PRIMARY KEY (`id_hadiah`);
 
 ALTER TABLE `tm_hadiah`
MODIFY `id_hadiah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;