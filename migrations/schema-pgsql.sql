/**
 * Database schema required by yii2-admin.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 2.5
 */

drop table if exists "menu";

create table "menu"
(
    "id" serial NOT NULL PRIMARY KEY,
    "name" varchar(128),
    "parent" integer,
    "route" varchar(256),
    "order" integer,
    "data"   bytea,
    foreign key ("parent") references "menu"("id")  ON DELETE SET NULL ON UPDATE CASCADE
);
