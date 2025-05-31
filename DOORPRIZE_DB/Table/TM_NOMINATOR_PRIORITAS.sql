CREATE TABLE IF NOT EXISTS `tm_nominator_prioritas` (
  `id_nominator` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_event` int NOT NULL,
  `tgl_create` datetime NOT NULL,
  `user_create` varchar(20) NOT NULL,
  PRIMARY KEY (`id_nominator`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;