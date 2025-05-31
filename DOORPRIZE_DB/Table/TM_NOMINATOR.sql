CREATE TABLE IF NOT EXISTS `tm_nominator` (
`id_nominator` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_event` int(11) NOT NULL,
  `tgl_create` datetime NOT NULL,
  `user_create` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `tm_nominator`
 ADD PRIMARY KEY (`id_nominator`);
 
 ALTER TABLE `tm_nominator`
MODIFY `id_nominator` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;