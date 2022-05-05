CREATE DATABASE `db_app_activ`

USE `db_app_activ`

CREATE TABLE `tbl_user`(
    `id_user` int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nombre_user` varchar(15) NOT NULL,
    `correo_user` varchar(30) NOT NULL,
    `contra_user` char(8) NULL
);

CREATE TABLE `tbl_activ`(
    `id_activ` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nombre_activ` varchar(15) NULL,
    `desc_activ` varchar(200) NULL,
    `lugar_activ` varchar (100) NULL,
    `nombre_user` varchar(15) NOT NULL
);

CREATE TABLE `tbl_activ_like`(
    `id_actv_like` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `id_user` varchar(15) NOT NULL,
    `id_activ` int(4) NOT NULL
);


ALTER TABLE `tbl_activ`
      ADD CONSTRAINT `id_user_fk` FOREIGN KEY (`id_activ`)
        REFERENCES `tbl_user` (`id_user`);

ALTER TABLE `tbl_activ_like`
      ADD CONSTRAINT `id_user_fk2` FOREIGN KEY (`id_activ`)
        REFERENCES `tbl_user` (`id_user`);

ALTER TABLE `tbl_activ_like`
      ADD CONSTRAINT `Constraint_id_activ_fk` FOREIGN KEY (`id_activ`)
        REFERENCES `tbl_activ` (`id_activ`);