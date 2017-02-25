/**
 * Database schema required by yii2-admin.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 2.5
 */

drop table if exists "menu";

create table "menu"
(
    "id" NUMBER(10) NOT NULL PRIMARY KEY,
    "name" varchar(128),
    "parent" number(10),
    "route" varchar(256),
    "order" number(10),
    "data"   BYTEA,
    foreign key (parent) references "menu"("id")  ON DELETE SET NULL ON UPDATE CASCADE
);
