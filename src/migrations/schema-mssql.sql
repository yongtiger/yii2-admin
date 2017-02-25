/**
 * Database schema required by yii2-admin.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 2.5
 */

drop table if exists [menu];

create table [menu]
(
    [id] int IDENTITY PRIMARY KEY,
    [name] varchar(128),
    [parent] int(11),
    [route] varchar(256),
    [order] int(11),
    [data]   text,
    foreign key (parent) references [menu]([id])  ON DELETE SET NULL ON UPDATE CASCADE
);
