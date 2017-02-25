/**
 * Database schema required by yii2-admin.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 2.5
 */

drop table if exists `menu`;

create table `menu`
(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(128),
    `parent` int(11),
    `route` varchar(256),
    `order` int(11),
    `data`   blob,
    foreign key (`parent`) references `menu`(`id`)  ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
