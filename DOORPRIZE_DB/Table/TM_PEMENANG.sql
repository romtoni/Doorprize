CREATE TABLE IF NOT EXISTS `tm_pemenang` (
`id_pemenang` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_hadiah` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_create` varchar(20) NOT NULL DEFAULT 'SYSTEM'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `tm_pemenang`
 ADD PRIMARY KEY (`id_pemenang`);

ALTER TABLE `tm_pemenang`
MODIFY `id_pemenang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
