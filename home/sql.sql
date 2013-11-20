




CREATE TABLE `users` (

`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(100) NOT NULL,
`user` varchar(50) NOT NULL,
`password` varchar(50) NOT NULL,
`email` varchar(50) NOT NULL,
`datCad` date NOT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `user` (`user`)
) ENGINE=INNODB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;





CREATE TABLE  `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_album` varchar(100) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `dateinclusion` date DEFAULT NULL,
  `photo_capa` varchar(300) DEFAULT NULL,
  `directory` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)

) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;









CREATE TABLE `photos` (
  `id` int NOT NULL auto_increment,
  `album` int ,
  `name_photo` varchar(300) ,
  `type` varchar(20) ,
  `dateinclusion` date ,
  `legend` varchar(300),
  PRIMARY KEY  (`id`),
  CONSTRAINT fk_albumPhoto FOREIGN KEY(album) references album(id) ON DELETE CASCADE
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;  

CREATE TABLE `session` (
  `id` int NOT NULL auto_increment,
  `user` varchar(50) ,
   iduser int,
  `date` date ,
   hora time,
   PRIMARY KEY  (`id`)
  ) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;  












